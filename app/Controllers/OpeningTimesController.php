<?php
require_once __DIR__ . '/../Models/OpeningTimes.php';

class OpeningTimesController
{
    public static function index(mysqli $conn): array
    {
        // Convert DB result into an array of rows for the view
        return OpeningTimes::getAll($conn);

    }
}
