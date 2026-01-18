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

    public function book(): void
    {
        if (!isset($_SESSION['volunteer_id'])) {
            header('Location: /login');
            exit;
        }

        $errors = []; 
        $shift_id = (int)($_GET['shift_id'] ?? 0);

        $shift = Shifts::find($this->db, $shift_id);
        if (!$shift) {
            $errors[] = 'Shift not found.';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {

            $weekStart = date('Y-m-d', strtotime('monday this week', strtotime($shift['shift_date'])));
            $weekEnd   = date('Y-m-d', strtotime('sunday this week', strtotime($shift['shift_date'])));

            $dailyCount = ShiftSignups::countForVolunteerShifts(
                $this->db,
                $_SESSION['volunteer_id'],
                $weekStart, $weekEnd
            );

            if ($dailyCount >= 2) {
                $errors[] = 'You may only book 2 shifts per day.';
            } else {
                $ok = ShiftSignups::create(
                    $this->db,
                    $shift_id,
                    $_SESSION['volunteer_id']
                );

                if ($ok === true) {
                    header('Location: /shifts?booked=1');
                    exit;
                }

                $errors[] = 'You are already booked on this shift.';
            }
        }

        $this->render('shifts/book', [
            'shift' => $shift,
            'errors' => $errors
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
}
