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

    public static function countForVolunteerShifts(
        mysqli $conn,
        int $volunteer_id,
        string $week_start,
        string $week_end
    ): int {
        $sql = "
            SELECT COUNT(*) AS c
            FROM shift_signups ss
            JOIN shifts s ON ss.shift_id = s.shift_id
            WHERE ss.volunteer_id = ?
              AND s.shift_date BETWEEN ? AND ?
        ";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iss", $volunteer_id, $week_start, $week_end);
        mysqli_stmt_execute($stmt);

        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);

        return (int)$row['c'];
    }

    public static function create(mysqli $conn, int $shift_id, int $volunteer_id): bool|string
    {
        $sql = "INSERT INTO shift_signups (shift_id, volunteer_id)
                VALUES (?, ?)"; 

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return "Could not prepare booking.";
        }

        mysqli_stmt_bind_param($stmt, "ii", $shift_id, $volunteer_id);

        if (!mysqli_stmt_execute($stmt)) {
            // Handles duplicate booking due to uniq_shift_email
            return "Could not book this shift (you may already be booked).";
        }

        return true;
    }

    public static function getForVolunteer(mysqli $conn, int $volunteer_id): array
    {
        $sql = "
            SELECT s.shift_date, s.label, s.start_time, s.end_time
            FROM shift_signups ss
            JOIN shifts s ON ss.shift_id = s.shift_id
            WHERE ss.volunteer_id = ?
            ORDER BY s.shift_date, s.start_time
        ";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $volunteer_id);
        mysqli_stmt_execute($stmt);

        return mysqli_fetch_all(
            mysqli_stmt_get_result($stmt),
            MYSQLI_ASSOC
        );
    }

}
