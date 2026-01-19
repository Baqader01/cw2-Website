<?php

namespace Communitytable\Foodbank\Models;
use mysqli;

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

    public static function countForVolunteerOnDate(
        mysqli $db,
        int $volunteerId,
        string $date
    ): int {
        $sql = "
            SELECT COUNT(*) 
            FROM shift_signups ss
            JOIN shifts s ON ss.shift_id = s.shift_id
            WHERE ss.volunteer_id = ?
            AND s.shift_date = ?
        ";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("is", $volunteerId, $date);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        return (int)$count;
    }


    public static function create(mysqli $conn, int $shift_id, int $volunteer_id): void
    {
        $sql = "INSERT INTO shift_signups (shift_id, volunteer_id)
                VALUES (?, ?)";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $shift_id, $volunteer_id);
            mysqli_stmt_execute($stmt);

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

    public static function alreadyBooked(mysqli $db, int $shiftId, int $volunteerId): bool
    {
        $sql = "SELECT 1 FROM shift_signups 
                WHERE shift_id = ? AND volunteer_id = ?
                LIMIT 1";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ii", $shiftId, $volunteerId);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }


}
