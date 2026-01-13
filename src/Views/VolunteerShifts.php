<main>
    <h2>My Shifts</h2>

    <?php if (empty($data)): ?>
        <p>You have not booked any shifts yet.</p>
    <?php else: ?>
    <table class="shifts-table">
        <tr>
            <th>Date</th><th>Role</th><th>Time</th>
        </tr>
        <?php foreach ($data['shifts'] as $s): ?>
        <tr>
            <td><?= date('D M Y', strtotime($s['shift_date'])) ?></td>
            <td><?= htmlspecialchars($s['label']) ?></td>
            <td><?= substr($s['start_time'],0,5) ?> – <?= substr($s['end_time'],0,5) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

</main>