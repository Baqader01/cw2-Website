<?php
// include the database connection
require __DIR__ . '/dbconnect.php';

// we can safely run a query because $conn is defined
$sql = "SELECT day_name, open_time, close_time, is_closed
        FROM opening_hours
        ORDER BY opening_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The Community Table – a community hub tackling food insecurity and social isolation in East London.">
  <meta name="author" content="Mysarah Baqader">
  <title>The Community Table</title>
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

  <main id="main-content">
    <section id="our-story">
      <h2>Our Story</h2>
      <p><strong>The Community Table</strong> was established in 2018 by local organiser <strong>Maya Patel</strong> and chef <strong>David Green</strong> as a neighbourhood initiative to tackle food insecurity and social isolation in the heart of East London. What began as a small food bank and soup kitchen in a church hall has evolved into a vibrant community hub where people cook, share, and learn together.</p>
      <p>Today, The Community Table runs a zero-waste café, weekly community meals, and cooking workshops that celebrate seasonal, affordable, and culturally diverse food. All proceeds go back into supporting local families through meal donations, skills training, and volunteer opportunities.</p>
      <p>Recognised for its innovative approach to social sustainability, The Community Table received the <em>London Food Roots Award (2023)</em> and continues to partner with local growers and surplus suppliers to ensure that no good food goes to waste.</p>
    </section>

    <section class="carousel">
      <img src="assets/marketing/food_1.jpg" alt="Volunteer placing donated food into a box in a community storeroom">
      <img src="assets/marketing/food_2.jpg" alt="Two food donation boxes, including one labelled halal, filled with assorted groceries">
      <img src="assets/marketing/food_3.jpg" alt="Volunteer packing food items into a donation box for the community">
      <img src="assets/marketing/food_4.jpg" alt="Stack of food donation boxes prepared for community distribution">
      <img src="assets/marketing/tins_1.jpeg" alt="Canned goods and tins donated for community food support">
    </section>

    <section id="info">
      <h2>Visitor Information</h2>
      <p>We welcome everyone — no referrals or proof of need required. All meals are vegetarian-friendly, with vegan and gluten-free options available daily. The space is fully wheelchair accessible, with step-free entry and accessible bathrooms.</p>
      <?php include __DIR__ . "/opening_times.php";?>
    </section>

    <section id="volunteer">
      <h2>Volunteer With Us</h2>
      <figure>
        <img src="assets/volunteers/people_w_1.jpeg" alt="Portrait of a volunteer woman with crossed arms in a dimly lit setting.">
      </figure>
      <p>Our volunteers are at the heart of everything we do. Whether you’re helping prepare meals, welcoming visitors, or organising food donations, your time makes a real difference.</p>
      <a href="#contact" class="button">Become a Volunteer</a>
    </section>

    <section id="testimonials" class="testimonials">
      <h2>What People Say</h2>
      <div class="testimonial-grid">
        <blockquote>
          "Community Table isn’t just about food — it’s about dignity. When I first came here, I was struggling to feed my kids. Now I volunteer twice a week, and it feels like being part of a big, caring family."  
          <cite>— Amira, Local Resident & Volunteer</cite>
        </blockquote>

        <blockquote>
          "The meals are nourishing, but the real magic is the sense of belonging. Everyone is welcome, and you can feel that from the moment you walk in."
          <cite>— Sophie Lang, Manager at GreenGrocer Co-op </cite>
        </blockquote>

        <blockquote>
          "Our partnership with Community Table has shown how local businesses can make a real difference. Their zero-waste ethos aligns perfectly with our sustainability goals."
          <cite>— Priya, Community Member</cite>
        </blockquote>
      </div>

      <a href="assets/PDFs/Testimonials.pdf" class="button" download>
        Read all 7 testimonials (PDF)
      </a>
    </section>
  </main>

  <footer id="contact">
    <h2>Contact Us</h2>
    <address>
      <p>Email: <a href="mailto:hello@communitykitchen.org.uk">hello@communitykitchen.org.uk</a></p>
      <p>Follow us on Instagram: <a href="https://www.instagram.com/communitykitchenldn" target="_blank" rel="noopener">@communitykitchenldn</a></p>
    </address>
    <p>&copy; 2025 The Community Table. All rights reserved.</p>
  </footer>
</body>
</html>
