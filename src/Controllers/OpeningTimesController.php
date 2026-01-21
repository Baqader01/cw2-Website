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

    public function manage(): void
    {
        $thisWeekStart = date('Y-m-d', strtotime('monday this week'));
        $nextWeekStart = date('Y-m-d', strtotime('monday next week'));

        $thisWeek = OpeningTimes::getForWeek($this->db, $thisWeekStart);
        $nextWeek = OpeningTimes::getForWeek($this->db, $nextWeekStart);

        $this->render('open/manage', [
            'thisWeek'   => $thisWeek,
            'nextWeek'   => $nextWeek,
            'isStaff'    => isset($_SESSION['staff_id']),
            'thisWeekStart'  => $thisWeekStart,
            'nextWeekStart'  => $nextWeekStart
        ]);
    }
}