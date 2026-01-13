<?php
require_once __DIR__ . '/../Models/Staff.php';

class StaffAuthController
{
    public static function index(mysqli $conn): array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $errors = $data['errors'] ?? [];
        $old = $data['old'] ?? ['email' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $old['email'] = $email;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address.';
            }

            if ($password === '') {
                $errors[] = 'Please enter your password.';
            }

            if (empty($errors)) {
                $staff = Staff::findByEmail($conn, $email);

                // Generic error message (don’t reveal whether email exists)
                if (!$staff || !password_verify($password, $staff['password_hash'])) {
                    $errors[] = 'Invalid email or password.';
                } else {
                    // Login success: store what you need in session
                    $_SESSION['staff_id'] = (int)$staff['staff_id'];
                    $_SESSION['staff_name'] = $staff['name'];
                    $_SESSION['staff_role'] = $staff['role'];

                    // Redirect BEFORE output
                    header('Location: /cw2/public/index.php');
                    exit;
                }
            }
        }

        return [
            'errors' => $errors,
            'old' => $old
        ];
    }

    public static function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Clear session
        $_SESSION = [];
        session_destroy();

        header('Location: /cw2/public/staff_login.php');
        exit;
    }

    public static function requireStaff(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['staff_id'])) {
            header('Location: /cw2/public/staff_login.php');
            exit;
        }
    }
}
