<?php

namespace Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\OpeningTimes;

class OpeningTimesController extends Controller
{
    public function index(): void
    {
        $thisWeekStart = date('Y-m-d', strtotime('monday this week'));
        $nextWeekStart = date('Y-m-d', strtotime('monday next week'));

        $thisWeek = OpeningTimes::getForWeek($this->db, $thisWeekStart);
        $nextWeek = OpeningTimes::getForWeek($this->db, $nextWeekStart);

        $this->render('open/index', [
            'thisWeek'   => $thisWeek,
            'nextWeek'   => $nextWeek,
            'isStaff'    => isset($_SESSION['staff_id']),
            'thisWeekStart'  => $thisWeekStart,
            'nextWeekStart'  => $nextWeekStart
        ]);
    }

    public function edit(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /website/login');
            exit;
        }

        // current | next
        $week = $_GET['week'] ?? 'current';

        // Determine week start 
        if ($week === 'next') {
            $weekStart = date('Y-m-d', strtotime('monday next week'));
        } else {
            $weekStart = date('Y-m-d', strtotime('monday this week'));
        }

        // Fetch opening hours for that week
        $hours = OpeningTimes::getForWeek($this->db, $weekStart);

        $this->render('open/edit', [
            'hours'     => $hours,
            'week'      => $week,
            'weekStart' => $weekStart
        ]);
    }

    public function save(): void
    {
        if (!isset($_SESSION['staff_id'])) {
            header('Location: /website/login');
            exit;
        }

        // current | next
        $week = $_POST['week'] ?? 'current';

        // Determine week start (Monday)
        if ($week === 'next') {
            $weekStart = date('Y-m-d', strtotime('monday next week'));
        } else {
            $weekStart = date('Y-m-d', strtotime('monday this week'));
        }

        // Loop through submitted days
        foreach ($_POST['days'] as $dayName => $data) {

            $openTime  = $data['open_time'] ?? null;
            $closeTime = $data['close_time'] ?? null;
            $isClosed  = isset($data['is_closed']);

            OpeningTimes::create(
                $this->db,
                $weekStart,
                $dayName,
                $openTime,
                $closeTime,
                $isClosed
            );
        }

        // Redirect back to manage page
        header('Location: /website/opening?updated=1');
        exit;
    }
}