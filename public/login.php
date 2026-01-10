<?php
session_start();

require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/VolunteerLoginController.php';
require __DIR__ . '/../app/Controllers/StaffAuthController.php';

$conn = db_connect();

$role = $_POST['role'] ?? 'volunteer';

$data = ($role === 'staff')
    ? StaffAuthController::index($conn)
    : VolunteerLoginController::index($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/cw2/assets/css/stylesheet.css">
    <script src="/cw2/assets/js/auth-toggle.js" defer></script>
</head>
<body>
    <?php

    require __DIR__ . '/../includes/header.php';
    require __DIR__ . '/../app/Views/Login.php';
    require __DIR__ . '/../includes/footer.php';
    ?>

</body>
</html>