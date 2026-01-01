<?php
require __DIR__ . '/dbconnect.php';

// Simple query to get all opening hours in a fixed order
$sql = "SELECT volunteer_id, full_name, email, phone, over18, created_at
  FROM volunteers
  ORDER BY volunteer_id ASC";

$result = mysqli_query($conn, $sql);
// If the query fails, show a basic error and stop this part
if (!$result) {
    echo "<p>Could not load volunteers at the moment.</p>";
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>

<body>
    <header>
        <figure class="logo">
            <img src="assets/logos/CommunityTable-logo.png" alt="The Community Table logo">
        </figure>

        <div class="title">
            <h1>The Community Table</h1>
            <p class="tagline">A table set for all</p>
            <nav aria-label="Main navigation">
                <ul>
                    <li><a href="#our-story">Our Story</a></li>
                    <li><a href="#info">Information</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="volunteer-list">
            <h2>Registered Volunteers</h2>
            <p>This page shows an overview of everyone who has registered to volunteer</p>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Over 18?</th>
                            <th>Registered At</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['volunteer_id']) ?></td>
                                <td><?= htmlspecialchars($row['full_name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td>
                                    <?= ($row['over18'] == 1) ? 'Yes' : 'No' ?>
                                </td>
                                <td>

                                    <?php
                                    // Format the timestamp into something readable (e.g. 06 Jan 2025 10:05)
                                    $dt = strtotime($row['created_at']);
                                    echo htmlspecialchars(date('d M Y H:i', $dt));
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile;
                        ?>
                    </tbody>
                </table>

            <?php else: ?>
                <p>No volunteers have registered yet.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <h2>Contact Us</h2>
        <address>
            <p>Email: <a href="mailto:hello@communitykitchen.org.uk">hello@communitykitchen.org.uk</a></p>
            <p>Follow us on Instagram:
                <a href="https://www.instagram.com/communitykitchenldn" target="_blank" rel="noopener">
                    @communitykitchenldn
                </a>
            </p>
        </address>
        <p>&copy; 2025 The Community Table. All rights reserved.</p>
    </footer>

</body>
</html>