<div class="opening-times">
    <h3>Opening Times</h3>

    <?php if (!empty($result)): ?>
        <table class="opening-table">
            <tbody>
                <?php foreach ($result as $row): ?>
                    <?php
                        // Decide what to show for hours
                        if ((int)$row['is_closed'] === 1) {
                            $hoursText = 'Closed';
                        } else {
                            $open  = date('g a', strtotime($row['open_time']));
                            $close = date('g a', strtotime($row['close_time']));
                            $hoursText = $open . ' – ' . $close;
                        }
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['day_name']) ?></td>
                        <td><?= htmlspecialchars($hoursText) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No opening hours have been configured yet.</p>
    <?php endif; ?>
</div>