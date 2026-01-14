<?php

namespace Communitytable\Foodbank\Models;
use mysqli;

class Volunteers
{
    public static function getAll(mysqli $conn)
    {
        $sql = "SELECT volunteer_id, full_name, email, phone, over18, created_at
            FROM volunteers
            ORDER BY volunteer_id ASC";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function create(mysqli $conn, array $data): bool|string
    {
        $sql = "INSERT INTO volunteers(full_name, email, phone, over18, password_hash, remember_token, remember_expires, created_at)
                VALUES
                    (?, ?, ?, ?, ?, NULL, NULL, NOW())";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param(
            $stmt,
            'sssis',
            $data['full_name'],
            $data['email'],
            $data['phone'],
            $data['over18'],
            $data['password_hash']
        );

         if (!$stmt->execute()) {
            // duplicate email
            return "Insert failed: " . $stmt->error;
        }

        return true;
    }

    public static function findByEmail(mysqli $conn, string $email): ?array
    {
        $sql = "SELECT volunteer_id, full_name, email, phone, over18, password_hash, remember_token, remember_expires, created_at
                FROM volunteers
                WHERE email = ?
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        if (!$stmt) return null;

        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();

        $row = $res->fetch_assoc();
        return $row ?: null;
    }

    public static function setRemember(mysqli $conn, int $volunteerId, string $tokenHash, string $expiresAt): bool
    {
        $sql = "UPDATE volunteers
                SET remember_token = ?, remember_expires = ?
                WHERE volunteer_id = ?";

        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;

        $stmt->bind_param('ssi', $tokenHash, $expiresAt, $volunteerId);
        return $stmt->execute();
    }

        public static function clearRemember(mysqli $conn, int $volunteerId): void
    {
        $sql = "UPDATE volunteers
                SET remember_token = NULL, remember_expires = NULL
                WHERE volunteer_id = ?";

        $stmt = $conn->prepare($sql);
        if (!$stmt) return;

        $stmt->bind_param('i', $volunteerId);
        $stmt->execute();
    }

}

?>