<?php

namespace  Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\Shifts;

class ShiftController extends Controller
{
    public function index(): void
    {

        $shift = Shifts::getShift($this->db);

        $this->render('shift', [
            'shift' => $shift,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff' => isset($_SESSION['staff_id'])
        ]);

    }
}
