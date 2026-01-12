<?php
session_start();

require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/ShiftsController.php';

$conn = db_connect();


$notLoggedIn =
    !isset($_SESSION['volunteer_id']) &&
    !isset($_SESSION['staff_id']);

$expired =
    isset($_SESSION['expires_at']) &&
    $_SESSION['expires_at'] < time();

if ($notLoggedIn || $expired) {
    session_destroy();
    header('Location: /cw2/public/login.php');
    exit;
}

$data = ShiftsController::index($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cw2/assets/css/stylesheet.css">
</head>
<body>
    <?php
        require __DIR__ . '/../includes/header.php';
        require __DIR__ . '/../app/Views/shifts.php';
        require __DIR__ . '/../includes/footer.php';
    ?>
</body>
</html>