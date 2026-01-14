<?php

namespace  Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\Shifts;

class ShiftController extends Controller
{
    public function index(): void
    {

        $shifts = Shifts::getShift($this->db);

        $this->render('shifts', [
            'shifts' => $shifts,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff' => isset($_SESSION['staff_id'])
        ]);

    }
}
