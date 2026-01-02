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
        $sql = "INSERT INTO volunteers (full_name, email, phone, over18, password_hash, created_at)
                VALUES (?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "sssiss",
            $data['full_name'],
            $data['email'],
            $data['phone'],
            $data['over18'],
            $data['password_hash']
        );

        $ok = $stmt->execute();
        $stmt->close();

        return $ok;
    }

}

?>