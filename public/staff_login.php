<?php
require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/StaffAuthController.php';

$conn = db_connect();

// This will load the view 
ob_start();
StaffAuthController::login($conn);
$page = ob_get_clean();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cw2/assets/css/stylesheet.css">
    <title>Document</title>
</head>
<body>
    <?php
        // render layout
        require __DIR__ . '/../includes/header.php';
        echo $page;
        require __DIR__ . '/../includes/footer.php';
    ?>

</body>
</html>
