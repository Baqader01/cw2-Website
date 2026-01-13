<main class="volunteer-list">
    <h2>Registered Volunteers</h2>
    <p>This page shows everyone who has registered to volunteer.</p>

    <?php if (!empty($data)): ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Over 18?</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['volunteer_id']) ?></td>
                        <td><?= htmlspecialchars($row['full_name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= ((int)$row['over18'] === 1) ? 'Yes' : 'No' ?></td>
                        <td><?= htmlspecialchars(date('d M Y H:i', strtotime($row['created_at']))) ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    <?php else: ?>
        <p>No volunteers have registered yet.</p>
    <?php endif; ?>
</main>
