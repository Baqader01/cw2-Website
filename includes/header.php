<header>
    <figure class="logo">
        <img src="../assets/logos/CommunityTable-logo.png" alt="The Community Table logo">
    </figure>

    <div class="title">
        <h1>The Community Table</h1>
        <p class="tagline">A table set for all</p>
        <nav aria-label="Main navigation">
        <ul>
            <?php if (isset($_SESSION['volunteer_id'])): ?>
                <li><a href="/cw2/public/index.php#our-story">Our Story</a></li>
                <li><a href="/cw2/public/shifts.php">Shifts</a></li>
                <li><a href="/cw2/public/volunteer_shifts.php">My Shifts</a></li>
                <li><a href="/cw2/public/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="/cw2/public/index.php#our-story">Our Story</a></li>
                <li><a href="/cw2/public/shifts.php">Shifts</a></li>
                <li><a href="/cw2/public/login.php">Login</a></li>
            <?php endif; ?> 

        </ul>
        </nav>
    </div>
</header>