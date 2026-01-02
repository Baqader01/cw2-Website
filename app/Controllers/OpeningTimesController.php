<?php

require_once __DIR__ . '/../Models/OpeningTimes.php';

class OpeningTimesController
{
    public static function index($conn)
    {
        $openingTimes = OpeningTimes::getAll($conn);

        // Pass data to the view
        require __DIR__ . '/../Views/OpeningTimes.php';
    }
}
