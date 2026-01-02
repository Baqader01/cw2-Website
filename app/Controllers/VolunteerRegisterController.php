<?php
require_once __DIR__ . '/../Models/Volunteers.php';

class VolunteerRegisterController
{
    public static function index(mysqli $conn)
    {
        $errors = [];
        $old = [
            'full_name' => '',
            'email' => '',
            'phone' => '',
            'over18' => 0
        ];

        // If the form was submitted, handle it
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Trim input (basic Week 7/8 level validation)
            $old['full_name'] = trim($_POST['full_name'] ?? '');
            $old['email']     = trim($_POST['email'] ?? '');
            $old['phone']     = trim($_POST['phone'] ?? '');
            $old['over18']    = isset($_POST['over18']) ? 1 : 0;

            $password         = $_POST['password'] ?? '';
            $password_confirm = $_POST['password_confirm'] ?? '';

            // Very basic validation (keep it simple)
            if ($old['full_name'] === '') $errors[] = "Please enter your name.";
            if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Please enter a valid email.";
            if ($password === '' || strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
            if ($password !== $password_confirm) $errors[] = "Passwords do not match.";
            if ($old['over18'] !== 1) $errors[] = "You must confirm you are over 18.";

            // If valid, insert into DB
            if (empty($errors)) {

                // Hash password properly (still standard PHP)
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $ok = Volunteers::create($conn, [
                    'full_name' => $old['full_name'],
                    'email' => $old['email'],
                    'phone' => $old['phone'],
                    'over18' => $old['over18'],
                    'password_hash' => $password_hash
                ]);

                if ($ok) {
                    // Redirect to volunteers list (or homepage)
                    header("Location: /cw2/public/volunteers.php");
                    exit;
                } else {
                    $errors[] = "Could not create account. Email might already be used.";
                }
            }
        }

        // Show the form
        require __DIR__ . '/../Views/register.php';
    }
}
