<?php
session_start();

require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/VolunteerLoginController.php';

$conn = db_connect();

// Controller RETURNS data, not HTML, not redirects blindly
$data = VolunteerLoginController::index($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/cw2/assets/css/stylesheet.css">
</head>
<body>
    <?php

    require __DIR__ . '/../includes/header.php';
    require __DIR__ . '/../app/Views/VolunteerLogin.php';
    require __DIR__ . '/../includes/footer.php';
    ?>

</body>
</html>