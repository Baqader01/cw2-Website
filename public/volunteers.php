<?php
require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/VolunteersController.php';
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
    <?php require __DIR__ . '/../includes/header.php'; ?>

    <main>
        <?php 
            $conn = db_connect();
            VolunteersController::index($conn); 
        ?>
    </main>

    <?php require __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>