<?php

class ShiftSignups
{
    public static function countForShift(mysqli $conn, int $shift_id): int
    {
        $sql = "SELECT COUNT(*) AS c FROM shift_signups WHERE shift_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return 0;
        }

        mysqli_stmt_bind_param($stmt, "i", $shift_id);
        mysqli_stmt_execute($stmt);

        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);

        return (int)($row['c'] ?? 0);
    }

    public static function create(mysqli $conn, int $shift_id, string $name, string $email): bool|string
    {
        $sql = "INSERT INTO shift_signups (shift_id, volunteer_name, volunteer_email)
                VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return "Could not prepare booking.";
        }

        mysqli_stmt_bind_param($stmt, "iss", $shift_id, $name, $email);

        if (!mysqli_stmt_execute($stmt)) {
            // Handles duplicate booking due to uniq_shift_email
            return "Could not book this shift (you may already be booked).";
        }

        return true;
    }
}
