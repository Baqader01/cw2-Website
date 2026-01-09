<main class="volunteer-register">
    <h2>Book a Shift</h2>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($shift)): ?>
        <?php
            $date = date('d M Y', strtotime($shift['shift_date']));
            $start = substr($shift['start_time'], 0, 5);
            $end   = substr($shift['end_time'], 0, 5);
        ?>

        <p>
            <strong><?= htmlspecialchars($shift['label']) ?></strong><br>
            <?= htmlspecialchars($date) ?>, <?= htmlspecialchars($start . ' – ' . $end) ?><br>
            <?= htmlspecialchars($booked . ' / ' . $max) ?> booked
        </p>

        <?php if (!empty($isFull) && $isFull): ?>
            <p>This shift is full.</p>
            <a class="button" href="/cw2/public/shifts.php">Back to shifts</a>
        <?php else: ?>
            <form method="POST" action="">
                <label>
                    Your name
                    <input type="text" name="name" value="<?= htmlspecialchars($old['name']) ?>" required>
                </label>

                <label>
                    Email
                    <input type="email" name="email" value="<?= htmlspecialchars($old['email']) ?>" required>
                </label>

                <button type="submit" class="button">Confirm booking</button>
                <a class="button" href="/cw2/public/shifts.php" style="margin-left: 10px;">Cancel</a>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</div>
