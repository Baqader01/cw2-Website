<?php
require_once __DIR__ . '/../Models/OpeningTimes.php';

class OpeningTimesController
{
    public static function index(mysqli $conn): void
    {
        // Convert DB result into an array of rows for the view
        $result = OpeningTimes::getAll($conn);

        // Pass data to the view
        require __DIR__ . '/../Views/OpeningTimes.php';
    }
}
