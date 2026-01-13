<?php
require_once __DIR__ . '/../Models/Volunteers.php';

class VolunteerRegisterController
{
    public static function index(mysqli $conn): array
    {
        $errors = $data['errors'] ?? [];
        $old = $data['old'] ??  [
            'full_name' => '',
            'email' => '',
            'phone' => '',
            'over18' => 0
        ];

        // If this is a POST, we validate and insert
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Grab and trim inputs 
            $full_name = trim($_POST['full_name'] ?? '');
            $email     = trim($_POST['email'] ?? '');
            $phone     = trim($_POST['phone'] ?? '');
            $password  = $_POST['password'] ?? '';
            $confirm   = $_POST['password_confirm'] ?? '';
            $over18    = isset($_POST['over18']) ? 1 : 0;

            // Keep old values so the user doesn’t retype everything on error
            $old['full_name'] = $full_name;
            $old['email']     = $email;
            $old['phone']     = $phone;
            $old['over18']    = $over18;

            // Validation
            if ($full_name === '' || strlen($full_name) < 2) {
                $errors[] = 'Please enter your full name.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address.';
            }

            if ($phone === '' || strlen($phone) < 7) {
                $errors[] = 'Please enter a valid phone number.';
            }

            if (strlen($password) < 8) {
                $errors[] = 'Password must be at least 8 characters.';
            }

            if ($password !== $confirm) {
                $errors[] = 'Passwords do not match.';
            }
            else if($password === '' || $confirm === ''){
                $errors[] = 'Please enter both passwords';
            }
            else{
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
            }

            if ($over18 !== 1) {
                $errors[] = 'You must confirm you are over 18.';
            }

            // If no errors, insert
            if (empty($errors)) {
                $data = [
                    'full_name' => $full_name,
                    'email' => $email,
                    'phone' => $phone,
                    'over18' => $over18,
                    'password_hash' => $password_hash,
                ];

                $ok = Volunteers::create($conn, $data);

                if ($ok) {
                    // redirect after successful POST
                    echo 'Location: /cw2/public/volunteers.php?registered=1';
                    exit;
                }

                // duplicate email
                $errors[] = $ok;
            }
        }

        return [
            'errors' => $errors,
            'old' => $old
        ];
    }
}
