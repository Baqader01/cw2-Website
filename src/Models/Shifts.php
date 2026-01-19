<?php

namespace Communitytable\Foodbank\Models;
use mysqli;

class Shifts
{
    public static function getShifts(mysqli $conn)
    {
        $sql = "
            SELECT 
                s.shift_id,
                s.shift_date,
                s.label,
                s.start_time,
                s.end_time,
                s.max_volunteers,
                COUNT(ss.signup_id) AS booked_count
            FROM shifts s
            LEFT JOIN shift_signups ss 
                ON ss.shift_id = s.shift_id
            GROUP BY s.shift_id
            ORDER BY s.shift_date, s.start_time
        ";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("SQL ERROR: " . mysqli_error($conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    public static function getSignups(mysqli $conn): array
    {
        $sql = "
            SELECT 
                s.shift_id,
                s.shift_date,
                s.label,
                s.start_time,
                s.end_time,
                s.required_volunteers,
                s.max_volunteers,
                COUNT(ss.signup_id) AS booked_count
            FROM shifts s
            LEFT JOIN shift_signups ss ON ss.shift_id = s.shift_id
            GROUP BY s.shift_id
            ORDER BY s.shift_date ASC, s.start_time ASC
        ";
        
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function find(mysqli $conn, int $shift_id): ?array
    {
        $sql = "SELECT shift_id, shift_date, label, start_time, end_time, max_volunteers
                FROM shifts
                WHERE shift_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $shift_id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null;
    }

    public static function update(mysqli $conn, int $shift_id, array $data): bool
    {
        $sql = "
            UPDATE shifts
            SET shift_date = ?, label = ?, start_time = ?, end_time = ?, max_volunteers = ?
            WHERE shift_id = ?
        ";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param(
            $stmt,
            "ssssii",
            $data['shift_date'],
            $data['label'],
            $data['start_time'],
            $data['end_time'],
            $data['max_volunteers'],
            $shift_id
        );

        return mysqli_stmt_execute($stmt);
    }

    public static function getByDateRange(
    mysqli $db,
    string $startDate,
    string $endDate
): array {
    $sql = "
        SELECT s.*,
               COUNT(ss.shift_id) AS booked_count
        FROM shifts s
        LEFT JOIN shift_signups ss ON s.shift_id = ss.shift_id
        WHERE s.shift_date BETWEEN ? AND ?
        GROUP BY s.shift_id
        ORDER BY s.shift_date, s.start_time
    ";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("ss", $startDate, $endDate);
    $stmt->execute();

    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Group by date
    $grouped = [];
    foreach ($rows as $shift) {
        $grouped[$shift['shift_date']][] = $shift;
    }

    return $grouped;
}

}

?>