<?php
// Simple query to get all opening hours in a fixed order
$sql = "SELECT day_name, open_time, close_time, is_closed
        FROM opening_hours
        ORDER BY opening_id ASC";

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
        echo '<tbody>';

        // Loop through each row from the database 
        while ($row = mysqli_fetch_assoc($result)) {
            // Decide what to show in the "Hours" column
            if ((int)$row['is_closed'] === 1) {
                // Closed days
                $hoursText = 'Closed';
            } else {
                // Format 24-hour MySQL times as 12-hour
                $openTime  = date('g a', strtotime($row['open_time']));
                $closeTime = date('g a', strtotime($row['close_time']));
                $hoursText = $openTime . ' – ' . $closeTime;
            }

            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['day_name']) . '</td>';
            echo '<td>' . htmlspecialchars($hoursText) . '</td>';
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
