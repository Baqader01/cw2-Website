<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>The Community Table – Opening Hours</title>
</head>
<body>
    <h1>Opening Hours</h1>

    <?php
    // Connect to DB
    $conn = new mysqli("database", "webdev", "W3bD£velopment", "foodbank");
    if ($conn->connect_error) {
        die("Connection failed: " . htmlspecialchars($conn->connect_error));
    }

    /**
     * Render one week's opening hours as a table.
     * $weekStart is a DateTime for Monday of that week.
     */
    function render_week_table(mysqli $conn, DateTime $weekStart, string $heading)
    {
        // Clone start and compute end (Sunday)
        $start = clone $weekStart;
        $end   = clone $weekStart;
        $end->modify('+6 days'); // Monday + 6 = Sunday

        // Fetch all opening_hours rows for that date range
        $sql = "SELECT open_date, open_time, close_time, is_closed
                FROM opening_hours
                WHERE open_date BETWEEN ? AND ?
                ORDER BY open_date ASC";

        $stmt = $conn->prepare($sql);
        $startStr = $start->format('Y-m-d');
        $endStr   = $end->format('Y-m-d');
        $stmt->bind_param('ss', $startStr, $endStr);
        $stmt->execute();
        $result = $stmt->get_result();

        // Put results into array keyed by date string
        $rowsByDate = [];
        while ($row = $result->fetch_assoc()) {
            $rowsByDate[$row['open_date']] = $row;
        }

        echo '<h2>' . htmlspecialchars($heading) . '</h2>';
        echo '<table border="1">';
        echo '<thead><tr><th>Day</th><th>Date</th><th>Opening Time</th><th>Closing Time</th></tr></thead>';
        echo '<tbody>';

        // Loop over the 7 days of the week
        $day = clone $start;
        for ($i = 0; $i < 7; $i++) {
            $dateStr = $day->format('Y-m-d');
            $dayName = $day->format('l');      // Monday, Tuesday, ...
            $displayDate = $day->format('d M Y'); // 03 Feb 2025

            if (isset($rowsByDate[$dateStr])) {
                $row = $rowsByDate[$dateStr];

                if ((int)$row['is_closed'] === 1) {
                    $open  = 'Closed';
                    $close = '';
                } else {
                    $open  = substr($row['open_time'],  0, 5); // HH:MM
                    $close = substr($row['close_time'], 0, 5);
                }
            } else {
                // No entry in DB means closed
                $open  = 'Closed';
                $close = '';
            }

            echo '<tr>';
            echo '<td>' . htmlspecialchars($dayName)      . '</td>';
            echo '<td>' . htmlspecialchars($displayDate) . '</td>';
            echo '<td>' . htmlspecialchars($open)        . '</td>';
            echo '<td>' . htmlspecialchars($close)       . '</td>';
            echo '</tr>';

            $day->modify('+1 day');
        }

        echo '</tbody></table>';
    }

    // Determine current week's Monday
    $today = new DateTime();              // server date
    $mondayThisWeek = clone $today;
    $mondayThisWeek->modify('monday this week');

    // Next week's Monday
    $mondayNextWeek = clone $mondayThisWeek;
    $mondayNextWeek->modify('+1 week');

    // Render current week and next week
    render_week_table($conn, $mondayThisWeek, 'Current Week');
    render_week_table($conn, $mondayNextWeek, 'Next Week');

    $conn->close();
    ?>

</body>
</html>
