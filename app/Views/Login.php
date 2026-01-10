<main class="auth">

  <!-- ROLE SLIDER -->
  <div class="role-toggle">
    <button
      type="button"
      class="role-btn <?= $role === 'volunteer' ? 'active' : '' ?>"
      data-role="volunteer">
      Volunteer
    </button>

    <button
      type="button"
      class="role-btn <?= $role === 'staff' ? 'active' : '' ?>"
      data-role="staff">
      Staff
    </button>

    <div class="slider"></div>
  </div>

  <!-- ERRORS -->
  <?php if (!empty($data['errors'])): ?>
    <div class="error-box">
      <ul>
        <?php foreach ($data['errors'] as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- VOLUNTEER FORM -->
  <form method="POST" class="login-form <?= $role === 'volunteer' ? 'show' : '' ?>">
    <input type="hidden" name="role" value="volunteer">

    <h2>Volunteer Login</h2>

    <label>Email
      <input type="email" name="email" required>
    </label>

    <label>Password
      <input type="password" name="password" required>
    </label>

    <button class="button">Sign in</button>

    <p class="auth-link">
      New here?
      <a href="/cw2/public/register.php">Register as a volunteer</a>
    </p>
  </form>

  <!-- STAFF FORM -->
  <form method="POST" class="login-form <?= $role === 'staff' ? 'show' : '' ?>">
    <input type="hidden" name="role" value="staff">

    <h2>Staff Login</h2>

    <label>Username
      <input type="text" name="email" required>
    </label>

    <label>Password
      <input type="password" name="password" required>
    </label>

    <button class="button">Sign in</button>
  </form>

</main>
