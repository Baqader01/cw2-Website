<main class="volunteer-register">
    <h2>Book a Shift</h2>

    <?php
    $errors = $data['errors'] ?? [];
    $shift  = $data['shift'] ?? null;
    $booked = $data['booked'] ?? 0;
    $max    = $data['max'] ?? 0;
    $isFull = $data['isFull'] ?? false;
    ?>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($data)): ?>
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
            <p>
                You are booking this shift as: <strong><?= htmlspecialchars($_SESSION['volunteer_name']) ?></strong>
            </p>

            <button type="submit" class="button">Confirm booking</button>
            <a class="button" href="/cw2/public/shifts.php" style="margin-left: 10px;">Cancel</a>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</main>
