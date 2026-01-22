<?php

namespace  Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\OpeningTimes;

class HomeController extends Controller
{
    public function index(): void
    {
        $thisWeekStart = date('Y-m-d', strtotime('monday this week'));
        $nextWeekStart = date('Y-m-d', strtotime('monday next week'));

        $thisWeek = OpeningTimes::getForWeek($this->db, $thisWeekStart);
        $nextWeek = OpeningTimes::getForWeek($this->db, $nextWeekStart);

        $this->render('home', [
            'thisWeek'   => $thisWeek,
            'nextWeek'   => $nextWeek,
            'isStaff'    => isset($_SESSION['staff_id']),
            'isVolunteer'    => isset($_SESSION['volunteer_id']),
            'thisWeekStart'  => $thisWeekStart,
            'nextWeekStart'  => $nextWeekStart
        ]);
    }
}
