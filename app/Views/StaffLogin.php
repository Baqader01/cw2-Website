<div class="staff-login">
    <h2>Staff Login</h2>
    <p>Sign in to manage shifts and volunteers.</p>

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
            <input type="email" name="email" value="<?= htmlspecialchars($old['email']) ?>" required>
        </label>

        <label>
            Password
            <input type="password" name="password" required>
        </label>

        <button type="submit" class="button">Login</button>
    </form>
</div>
