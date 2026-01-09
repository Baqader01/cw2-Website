<main class="volunteer-register">

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
        <h2>Volunteer Registration</h2>
        <p>Fill in the form below to register as a volunteer.</p>

        <label>
            Full name
            <input type="text" name="full_name" value="<?= htmlspecialchars($old['full_name'] ?? '') ?>" required>
        </label>

        <label>
            Email
            <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
        </label>

        <label>
            Phone
            <input type="text" name="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
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
            <input type="checkbox" name="over18" <?= (!empty($old['over18'])) ? 'checked' : '' ?> required>
            I confirm I am over 18
        </label>

        <button type="submit" class="button">Register</button>
    </form>
</main>
