<?php

namespace communitytable\foodbank\Controllers;

use communitytable\foodbank\Core\Controller;
use OpeningTimes;

class HomeController extends Controller
{
    public function index(): void
    {
        $openingTimes = OpeningTimes::getAll();

        $this->render('home', [
            'openingTimes' => $openingTimes,
            'isLoggedIn' => isset($_SESSION['volunteer_id']) || isset($_SESSION['staff_id'])
        ]);
    }
}
