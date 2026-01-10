<?php
require_once __DIR__ . '/../Models/Shifts.php';
require_once __DIR__ . '/../Models/ShiftSignups.php';

class BookShiftController
{
    public static function index(mysqli $conn): array
    {
        $errors = [];

        $shift_id = (int)($_GET['shift_id'] ?? 0);
        if ($shift_id <= 0) {
            $errors[] = "No shift selected.";
            $errors[] = "No shift selected.";
            return compact('errors');
        }

        $shift = Shifts::find($conn, $shift_id);
        if (!$shift) {
            $errors[] = "That shift does not exist.";
            $errors[] = "No shift selected.";
            return compact('errors');
        }   

        $booked = ShiftSignups::countForShift($conn, $shift_id);
        $max = (int)$shift['max_volunteers'];
        $isFull = ($booked >= $max);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['volunteer_id'])) {
                header('Location: /cw2/public/login.php');
                exit;
            }

            $volunteer_id = $_SESSION['volunteer_id'];

            $weekStart = date('Y-m-d', strtotime('monday this week'));
            $weekEnd   = date('Y-m-d', strtotime('sunday this week'));

            $weeklyCount = ShiftSignups::countForVolunteerShifts(
                $conn,
                $volunteer_id,
                $weekStart,
                $weekEnd
            );

            if ($weeklyCount >= 2) {
                $errors[] = "You may only book 2 shifts per week.";
                return compact('errors', 'shift', 'booked', 'max', 'isFull');
            }

            if (empty($errors)) {
                $result = ShiftSignups::create($conn, $shift_id, $volunteer_id);

                if ($result === true) {
                    header("Location: /cw2/public/shifts.php?booked=1");
                    exit;
                } else {
                    $errors[] = $result;
                }
            }
        }

        return [
            'errors' => $errors,
            'shift' => $shift,
            'booked' => $booked,
            'max' => $max,
            'isFull' => $isFull
        ];
    }
}
