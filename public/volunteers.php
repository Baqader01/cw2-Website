<?php
require __DIR__ . '/../lib/dbconnect.php';
require __DIR__ . '/../app/Controllers/VolunteersController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/cw2/assets/css/stylesheet.css">

</head>

<body>
    <header>
        <figure class="logo">
            <img src="../assets/logos/CommunityTable-logo.png" alt="The Community Table logo">
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
        <?php 
            $conn = db_connect();
            VolunteersController::index($conn); 
        ?>
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