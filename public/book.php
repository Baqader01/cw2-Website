<?php
session_start();

require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/BookShiftController.php';

$conn = db_connect();
$data = BookShiftController::index($conn);

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
        require __DIR__ . '/../app/Views/BookShift.php';
        require __DIR__ . '/../includes/footer.php';
    ?>
</body>
</html>