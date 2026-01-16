<?php

namespace Communitytable\Foodbank\Controllers;

use Communitytable\Foodbank\Core\Controller;
use Communitytable\Foodbank\Models\Staff;
use Communitytable\Foodbank\Models\Volunteers;

class AuthController extends Controller
{
    public function login(): void
    {
        $errors = [];
        $role = $_POST['role'] ?? 'volunteer';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address.';
            }

            if ($password === '') {
                $errors[] = 'Please enter your password.';
            }

            if (empty($errors)) {

                if ($role === 'staff') {
                    $user = Staff::findByEmail($this->db, $email);

                    if (!$user || !password_verify($password, $user['password_hash'])) {
                        $errors[] = 'Invalid email or password.';
                    } else {
                        $_SESSION['staff_id'] = (int)$user['staff_id'];
                        $_SESSION['staff_name'] = $user['name'];
                        $_SESSION['staff_role'] = $user['role'];
                        $_SESSION['expires_at'] = time() + (8 * 3600); // 8 hours

                        header('Location: /staff/shifts');
                        exit;
                    }

                } else {
                    $user = Volunteers::findByEmail($this->db, $email);

                    if (!$user || !password_verify($password, $user['password_hash'])) {
                        $errors[] = 'Invalid email or password.';
                    } else {
                        $_SESSION['volunteer_id'] = (int)$user['volunteer_id'];
                        $_SESSION['volunteer_name'] = $user['full_name'];
                        $_SESSION['expires_at'] = time() + 3600; // 1 hour

                        header('Location: /shifts');
                        exit;
                    }
                }
            }
        }

        // ONE render, always
        $this->render('auth/login', [
            'errors' => $errors,
            'role'   => $role
        ]);
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /cw2/public/login');
        exit;
    }
}