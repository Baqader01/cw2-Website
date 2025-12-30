<?php
$servername = "database";          
$username   = "webdev";           
$password   = "W3bD£velopment";  
$dbname     = "foodbank";       

// Create the connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection worked
if ($conn->connect_error) {
    // If something goes wrong, stop the page and show the error
    die("Database connection failed: " . $conn->connect_error);
}
