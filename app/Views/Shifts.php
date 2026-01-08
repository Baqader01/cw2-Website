<div class="shifts">
    <h2>Available Shifts</h2>
    <p>Pick a shift to book. If it is full, the button disappears automatically.</p>

    <?php if (empty($result)): ?>
        <p>No shifts have been added yet.</p>
    <?php else: ?>
        <table class="shifts-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Label</th>
                    <th>Time</th>
                    <th>Booked</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $s): ?>
                    <?php
                        $date = date('d M Y', strtotime($s['shift_date']));
                        $start = substr($s['start_time'], 0, 5);
                        $end   = substr($s['end_time'], 0, 5);

                        $booked = (int)$s['booked_count'];
                        $max    = (int)$s['max_volunteers'];

                        $isFull = ($booked >= $max);
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($date) ?></td>
                        <td><?= htmlspecialchars($s['label']) ?></td>
                        <td><?= htmlspecialchars($start . ' – ' . $end) ?></td>
                        <td><?= htmlspecialchars($booked . ' / ' . $max) ?></td>
                        <td>
                            <?php if ($isFull): ?>
                                <span>Full</span>
                            <?php else: ?>
                                <a class="book-button" href="/cw2/public/book.php?shift_id=<?= (int)$s['shift_id'] ?>">
                                    Book
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
