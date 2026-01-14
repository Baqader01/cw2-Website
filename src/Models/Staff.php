<?php

namespace Communitytable\Foodbank\Models;
use mysqli;

class Staff
{
    // Find a staff user by email
    public static function findByEmail(mysqli $conn, string $email): ?array
    {
        $sql = "SELECT staff_id, name, email, password_hash, role
                FROM staff
                WHERE email = ?
                LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return null;
        }

        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            return null;
        }

        $row = mysqli_fetch_assoc($result);
        return $row ?: null;
    }
}
