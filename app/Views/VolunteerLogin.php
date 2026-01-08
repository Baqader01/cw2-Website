<div class="volunteer-register">
    <h2>Volunteer Login</h2>
    <p>Please sign in to view and book shifts.</p>

    <?php
    $errors = $data['errors'] ?? [];
    $old    = $data['old'] ?? ['email' => ''];
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

    <form method="POST" action="">
        <label>
            Email
            <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>

        </label>
        <label>
            Password
            <input type="password" name="password" required>
        </label>

        <button type="submit" class="button">Sign In</button>
    </form>
</div>
