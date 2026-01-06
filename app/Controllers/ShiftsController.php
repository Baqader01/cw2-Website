<?php
require_once __DIR__ . '/../Models/Shifts.php';

class ShiftsController
{
    public static function index(mysqli $conn)
    {
        // Convert DB result into an array of rows for the view
        $result = Shifts::getSignups($conn);

        // Pass data to the view
        require __DIR__ . '/../Views/Shifts.php';
    }
}
