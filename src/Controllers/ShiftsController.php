<?php
namespace Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\Shifts;
use Communitytable\Foodbank\Models\ShiftSignups;

class ShiftsController extends Controller
{
    public function index(): void
    {
        $today = date('Y-m-d');
        $end   = date('Y-m-d', strtotime('+7 days'));

        $shiftsByDay = Shifts::getByDateRange(
            $this->db,
            $today,
            $end
        );

        $this->render('shifts/index', [
            'shiftsByDay' => $shiftsByDay,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff'     => isset($_SESSION['staff_id'])
        ]);
    }


    public function myShifts(): void
    {
        if (!isset($_SESSION['volunteer_id'])) {
            header('Location: /website/login.php');
            exit;
        }

        $shifts = ShiftSignups::getForVolunteer($this->db, $_SESSION['volunteer_id']);

        $this->render('shifts/volunteer', [
            'shifts' => $shifts,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff'     => isset($_SESSION['staff_id'])
        ]);
    }

    public function edit(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /login');
            exit;
        }

        $shift_id = (int)($_GET['shift_id'] ?? 0);
        $shift = Shifts::find($this->db, $shift_id);

        if (!$shift) {
            header('Location: /shifts?updated=1');
            exit;
        }

        $this->render('shifts/edit', [
            'shift' => $shift
        ]);
    }

    public function update(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /login');
            exit;
        }

        $data = [
            'label' => $_POST['label'] ?? '',
            'start_time' => $_POST['start_time'] ?? '',
            'end_time' => $_POST['end_time'] ?? '',
            'max_volunteers' => (int)($_POST['max_volunteers'] ?? 2),
        ];

        $shiftId = (int)($_POST['shift_id'] ?? 0);

        if ($shiftId <= 0) {
            header('Location:  /website/shifts?error=invalid_shift');
            exit;
        }

        Shifts::update($this->db, $shiftId, $data);

        header('Location: /website/shifts?updated=1');
        exit;

    }

    public function book(): void
    {
        // must be logged in as volunteer
        if (!isset($_SESSION['volunteer_id'])) {
            header('Location: /login');
            exit;
        }

        $errors = [];
        $shiftId = (int)($_GET['shift_id'] ?? 0);

        if ($shiftId <= 0) {
            $errors[] = 'No shift selected.';
            $this->render('shifts/book', compact('errors'));
            return;
        }

        $shift = Shifts::find($this->db, $shiftId);

        if (!$shift) {
            $errors[] = 'That shift does not exist.';
            $this->render('shifts/book', compact('errors'));
            return;
        }

        $booked = ShiftSignups::countForShift($this->db, $shiftId);
        $isFull = $booked >= (int)$shift['max_volunteers'];

        $this->render('shifts/book', [
            'shift'  => $shift,
            'booked' => $booked,
            'isFull' => $isFull,
            'errors' => $errors
        ]);
    }

  public function confirm(): void
    {
        if (!isset($_SESSION['volunteer_id'])) {
            header('Location: /login');
            exit;
        }

        $shiftId = (int)($_POST['shift_id'] ?? 0);
        $volunteerId = (int)$_SESSION['volunteer_id'];

        if ($shiftId <= 0) {
            header('Location: /shifts');
            exit;
        }

        $shift = Shifts::find($this->db, $shiftId);

        if (!$shift) {
            $this->render('shifts/book', [
                'errors' => ['That shift does not exist.']
            ]);
            return;
        }

        // Already booked?
        if (ShiftSignups::alreadyBooked($this->db, $shiftId, $volunteerId)) {
            $this->render('shifts/book', [
                'shift' => $shift,
                'errors' => ['You have already booked this shift.']
            ]);
            return;
        }

        // Daily limit
        $dailyCount = ShiftSignups::countForVolunteerOnDate(
            $this->db,
            $volunteerId,
            $shift['shift_date']
        );

        if ($dailyCount >= 2) {
            $this->render('shifts/book', [
                'shift' => $shift,
                'errors' => ['You may only book 2 shifts per day.']
            ]);
            return;
        }

        // Shift capacity
        $booked = ShiftSignups::countForShift($this->db, $shiftId);

        if ($booked >= (int)$shift['max_volunteers']) {
            $this->render('shifts/book', [
                'shift' => $shift,
                'errors' => ['This shift is already full.']
            ]);
            return;
        }

        // create booking
        ShiftSignups::create($this->db, $shiftId, $volunteerId);

        header('Location: /website/shifts/myShifts');
        exit;
    }

    public function delete(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /login');
            exit;
        }

        $shiftId = (int)($_POST['shift_id'] ?? 0);

        if ($shiftId <= 0) {
            header('Location: /website/shifts?error=invalid_shift');
            exit;
        }

        // prevent deleting booked shifts
        if (ShiftSignups::countForShift($this->db, $shiftId) > 0) {
            header('Location: /website/shifts?error=shift_has_bookings');
            exit;
        }

        Shifts::delete($this->db, $shiftId);

        header('Location: /website/shifts?deleted=1');
        exit;
    }

    public function create(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /login');
            exit;
        }

        $this->render('shifts/create');
    }

    public function store(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /login');
            exit;
        }

        $data = [
            'shift_date'           => $_POST['shift_date'] ?? '',
            'label'                => trim($_POST['label'] ?? ''),
            'start_time'           => $_POST['start_time'] ?? '',
            'end_time'             => $_POST['end_time'] ?? '',
            'required_volunteers'  => (int)($_POST['required_volunteers'] ?? 0),
            'max_volunteers'       => (int)($_POST['max_volunteers'] ?? 0),
        ];

        // Basic validation
        if (
            !$data['shift_date'] ||
            !$data['label'] ||
            !$data['start_time'] ||
            !$data['end_time'] ||
            $data['start_time'] >= $data['end_time']
        ) {
            $this->render('shifts/create', [
                'error' => 'Please fill in all fields correctly.',
                'data'  => $data
            ]);
            return;
        }

        Shifts::create($this->db, $data);

        header('Location: /website/shifts?created=1');
        exit;
    }
}
