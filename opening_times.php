<?php
// Simple query to get all opening hours in date order
$sql = "SELECT open_date, open_time, close_time, is_closed
        FROM opening_hours
        ORDER BY open_date ASC";

$result = mysqli_query($conn, $sql);

// If the query fails, show a basic error and stop this part
if (!$result) {
    echo "<p>Could not load opening hours at the moment.</p>";
    return;
}
?>

<div class="opening-times">
  <h3>Opening Times</h3>

  <?php
  // If we have at least one row, show a table
  if (mysqli_num_rows($result) > 0) {

      echo '<table class="opening-table">';
      echo '<thead><tr><th>Day</th><th>Date</th><th>Opening</th><th>Closing</th></tr></thead>';
      echo '<tbody>';

      // Loop through each row from the database
      while ($row = mysqli_fetch_assoc($result)) {

          // Turn the stored date into a PHP DateTime object
          $dateObj = new DateTime($row['open_date']);

          // Format the day (e.g. "Monday") and date (e.g. "03 Feb 2025")
          $dayName = $dateObj->format('l');
          $dateStr = $dateObj->format('d M Y');

          echo '<tr>';
          echo '<td>' . htmlspecialchars($dayName) . '</td>';
          echo '<td>' . htmlspecialchars($dateStr) . '</td>';

          // If this record is marked as closed, show a clear message
          if ((int)$row['is_closed'] === 1) {
              echo '<td colspan="2">Closed</td>';
          } else {
              // Cut times to HH:MM format to keep things tidy
              $open  = substr($row['open_time'],  0, 5);
              $close = substr($row['close_time'], 0, 5);

              echo '<td>' . htmlspecialchars($open)  . '</td>';
              echo '<td>' . htmlspecialchars($close) . '</td>';
          }

          echo '</tr>';
      }

      echo '</tbody>';
      echo '</table>';

  } else {
      // Friendly fallback if the table has no rows yet
      echo '<p>No opening hours have been configured yet.</p>';
  }
  ?>
</div>