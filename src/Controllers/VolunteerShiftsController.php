<?php
require_once __DIR__ . '/../Models/ShiftSignups.php';

class VolunteerShiftsController
{
    public static function index(mysqli $conn): array
    {
        if (!isset($_SESSION['volunteer_id'])) {
            header('Location: /cw2/public/login.php');
            exit;
        }

        $shifts = ShiftSignups::getForVolunteer(
            $conn,
            $_SESSION['volunteer_id']
        );

        return ['shifts' => $shifts];
    }
}

?>