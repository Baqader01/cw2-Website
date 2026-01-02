<div class="volunteer-register">
    <h2>Volunteer Registration</h2>
    <p>Fill in the form below to register as a volunteer.</p>

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
            Full name
            <input type="text" name="full_name" value="<?= htmlspecialchars($old['full_name']) ?>" required>
        </label>

        <label>
            Email
            <input type="email" name="email" value="<?= htmlspecialchars($old['email']) ?>" required>
        </label>

        <label>
            Phone
            <input type="text" name="phone" value="<?= htmlspecialchars($old['phone']) ?>">
        </label>

        <label>
            Password
            <input type="password" name="password" required>
        </label>

        <label>
            Confirm password
            <input type="password" name="password_confirm" required>
        </label>

        <label>
            <input type="checkbox" name="over18" <?= ($old['over18'] == 1) ? 'checked' : '' ?>>
            I confirm I am over 18
        </label>

        <button type="submit" class="button">Register</button>
    </form>
</div>
