<?php

namespace  Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\OpeningTimes;

class HomeController extends Controller
{
    public function index(): void
    {
        $conn = $this->db; // injected via base Controller

        $openingTimes = OpeningTimes::getAll($conn);

        $this->render('home', [
            'openingTimes' => $openingTimes,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff' => isset($_SESSION['staff_id'])
        ]);
    }
}
