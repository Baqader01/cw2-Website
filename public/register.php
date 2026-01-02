<?php
require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/VolunteerRegisterController.php';

$conn = db_connect();
VolunteerRegisterController::index($conn);
