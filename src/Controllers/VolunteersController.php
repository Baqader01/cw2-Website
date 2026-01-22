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
        ]);
    }
}   