<?php

namespace Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\Volunteers;

class VolunteersController extends Controller
{
    public function index(): void
    {
        $volunteers = Volunteers::getAll($this->db);

        $this->render('volunteers', [
            'volunteers' => $volunteers,
            'isVolunteer' => isset($_SESSION['volunteer_id']),
            'isStaff'     => isset($_SESSION['staff_id'])
        ]);
    }
}   