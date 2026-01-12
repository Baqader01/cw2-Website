<?php
require_once __DIR__ . '/../Models/Shifts.php';

class EditShiftController
{
    public static function index(mysqli $conn): array
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /cw2/public/login.php');
            exit;
        }

        $errors = [];

        $shift_id = (int)($_GET['shift_id'] ?? 0);
        if ($shift_id <= 0) {
            $errors[] = 'Invalid shift.';
            return compact('errors');
        }

        $shift = Shifts::find($conn, $shift_id);
        if (!$shift) {
            $errors[] = 'Shift not found.';
            return compact('errors');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'shift_date'     => $_POST['shift_date'] ?? '',
                'label'          => trim($_POST['label'] ?? ''),
                'start_time'     => $_POST['start_time'] ?? '',
                'end_time'       => $_POST['end_time'] ?? '',
                'max_volunteers' => (int)($_POST['max_volunteers'] ?? 0),
            ];

            if ($data['label'] === '') {
                $errors[] = 'Label is required.';
            }

            if ($data['max_volunteers'] < 1) {
                $errors[] = 'Max volunteers must be at least 1.';
            }

            if (empty($errors)) {
                if (Shifts::update($conn, $shift_id, $data)) {
                    header('Location: /cw2/public/shifts.php?updated=1');
                    exit;
                }

                $errors[] = 'Could not update shift.';
            }

            // overwrite view values on error
            $shift = array_merge($shift, $data);
        }

        return compact('errors', 'shift');
    }
}
