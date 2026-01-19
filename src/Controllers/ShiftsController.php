<?php
namespace Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\Shifts;
use Communitytable\Foodbank\Models\ShiftSignups;

class ShiftsController extends Controller
{
    public function index(): void
    {
        $shifts = Shifts::getShifts($this->db);

        $this->render('shifts/index', [
            'shifts' => $shifts,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff' => isset($_SESSION['staff_id'])
        ]);
    }

    public function myShifts(): void
    {
        if (!isset($_SESSION['volunteer_id'])) {
            header('Location: /cw2/public/login.php');
            exit;
        }

        $shifts = ShiftSignups::getForVolunteer($this->db, $_SESSION['volunteer_id']);

        $this->render('shifts/volunteer', [
            'shifts' => $shifts,
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
            header('Location: /staff/shifts');
            exit;
        }

        $this->render('staff/edit_shift', [
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

        Shifts::update($this->db, $_POST['shift_id'], $data);

        header('Location: /staff/shifts?updated=1');
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

        $result = ShiftSignups::create($this->db, $shiftId, $volunteerId);

        if ($result !== true) {
            $this->render('shifts/book', [
                'errors' => [$result]
            ]);
            return;
        }

        header('Location: /my-shifts');
        exit;
    }
}
