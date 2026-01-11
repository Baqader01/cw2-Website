<?php
session_start();

// Clear all session data
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to login
header('Location: /cw2/public/login.php');
exit;
