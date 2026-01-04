<h2>Available Shifts</h2>

<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Shift</th>
            <th>Time</th>
            <th>Required</th>
            <th>Max</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $shift): ?>
            <tr>
                <td><?= htmlspecialchars($shift['shift_date']) ?></td>
                <td><?= htmlspecialchars($shift['label']) ?></td>
                <td>
                    <?= substr($shift['start_time'], 0, 5) ?>
                    –
                    <?= substr($shift['end_time'], 0, 5) ?>
                </td>
                <td><?= $shift['required_volunteers'] ?></td>
                <td><?= $shift['max_volunteers'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
