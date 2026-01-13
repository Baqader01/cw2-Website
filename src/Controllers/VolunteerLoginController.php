<?php
require_once __DIR__ . '/../Models/Volunteers.php';

class VolunteerLoginController
{
    public static function index(mysqli $conn): array
    {
        $errors = $data['errors'] ?? [];
        $old = $data['old'] ?? ['email' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $old['email'] = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email.';
            }

            if ($password === '') {
                $errors[] = 'Please enter your password.';
            }

            if (empty($errors)) {
                $volunteer = Volunteers::findByEmail($conn, $email);

                if (!$volunteer || !password_verify($password, $volunteer['password_hash'])) {
                    $errors[] = 'Invalid email or password.';
                } else {
                    // LOGIN SUCCESS
                    $_SESSION['volunteer_id'] = $volunteer['volunteer_id'];
                    $_SESSION['volunteer_name'] = $volunteer['full_name'];
                    $_SESSION['expires_at'] = time() + 3600; // 1 hour

                    header('Location: /cw2/public/shifts.php');
                    exit;
                }
            }
        }
        return [
            'errors' => $errors,
            'old' => $old
        ];
    }
}
