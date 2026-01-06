<?php
require_once __DIR__ . '/../Models/Shifts.php';
require_once __DIR__ . '/../Models/ShiftSignups.php';

class BookShiftController
{
    public static function index(mysqli $conn): void
    {
        $errors = [];
        $old = ['name' => '', 'email' => ''];

        $shift_id = (int)($_GET['shift_id'] ?? 0);
        if ($shift_id <= 0) {
            $errors[] = "No shift selected.";
            require __DIR__ . '/../Views/BookShift.php';
            return;
        }

        $shift = Shifts::find($conn, $shift_id);
        if (!$shift) {
            $errors[] = "That shift does not exist.";
            require __DIR__ . '/../Views/BookShift.php';
            return;
        }   

        $booked = ShiftSignups::countForShift($conn, $shift_id);
        $max = (int)$shift['max_volunteers'];
        $isFull = ($booked >= $max);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name  = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');

            $old['name'] = $name;
            $old['email'] = $email;

            if ($isFull) {
                $errors[] = "Sorry — this shift is already full.";
            }

            if ($name === '' || strlen($name) < 2) {
                $errors[] = "Please enter your name.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Please enter a valid email address.";
            }

            if (empty($errors)) {
                $result = ShiftSignups::create($conn, $shift_id, $name, $email);

                if ($result === true) {
                    header("Location: /cw2/public/shifts.php?booked=1");
                    exit;
                } else {
                    $errors[] = $result;
                }
            }
        }

        require __DIR__ . '/../Views/BookShift.php';
    }
}
