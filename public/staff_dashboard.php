<?php
require __DIR__ . '/../app/Controllers/StaffAuthController.php';
StaffAuthController::requireStaff();
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="UTF-8">
  <title>Staff Dashboard</title>
  <link rel="stylesheet" href="/cw2/assets/css/stylesheet.css">
</head>
<body>
  <?php require __DIR__ . '/../includes/header.php'; ?>

  <main>
    <h2>Staff Dashboard</h2>
    <p>Welcome, <?= htmlspecialchars($_SESSION['staff_name'] ?? 'Staff') ?>.</p>

    <ul>
      <li><a href="/cw2/public/volunteers.php">View volunteers</a></li>
      <li><a href="/cw2/public/shifts.php">Manage shifts</a></li>
      <li><a href="/cw2/public/staff_logout.php">Logout</a></li>
    </ul>
  </main>

  <?php require __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
