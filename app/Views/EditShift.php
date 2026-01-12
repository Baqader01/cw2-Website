<main class="volunteer-register">
    <h2>Edit Shift</h2>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php 
        $shift = $data['shift']
    ?>
    <form method="POST">
        <label>
            Date
            <input type="date" name="shift_date"
                   value="<?= htmlspecialchars($shift['shift_date']) ?>" required>
        </label>

        <label>
            Label
            <input type="text" name="label"
                   value="<?= htmlspecialchars($shift['label']) ?>" required>
        </label>

        <label>
            Start time
            <input type="time" name="start_time"
                   value="<?= substr($shift['start_time'], 0, 5) ?>" required>
        </label>

        <label>
            End time
            <input type="time" name="end_time"
                   value="<?= substr($shift['end_time'], 0, 5) ?>" required>
        </label>

        <label>
            Max volunteers
            <input type="number" name="max_volunteers"
                   min="1"
                   value="<?= (int)$shift['max_volunteers'] ?>" required>
        </label>

        <button class="button">Save changes</button>
        <a class="button" href="/cw2/public/shifts.php">Cancel</a>
    </form>
</main>
