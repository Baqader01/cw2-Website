<?php

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

    public static function create(mysqli $conn, array $data): bool
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
            'sssiss',
            $data['full_name'],
            $data['email'],
            $data['phone'],
            $data['over18'],
            $data['password_hash']
        );

        return true;
    }

}

?>