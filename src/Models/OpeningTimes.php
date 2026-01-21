<?php

namespace Communitytable\Foodbank\Models;
use mysqli;


class OpeningTimes
{
    public static function getForWeek(mysqli $db, string $weekStart): array
    {
        $stmt = $db->prepare(
            "SELECT *
            FROM opening_hours
            WHERE week_start = ?
            ORDER BY FIELD(
                day_name,
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            )"
        );

        $stmt->bind_param('s', $weekStart);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function create(
    mysqli $db,
    string $weekStart,
    string $dayName,
    ?string $openTime,
    ?string $closeTime,
    bool $isClosed
    ): void {
        $stmt = $db->prepare(
            "INSERT INTO opening_hours
                (week_start, day_name, open_time, close_time, is_closed)
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
                open_time = VALUES(open_time),
                close_time = VALUES(close_time),
                is_closed = VALUES(is_closed)"
        );

        $isClosedInt = $isClosed ? 1 : 0;

        $stmt->bind_param(
            'ssssi',
            $weekStart,
            $dayName,
            $openTime,
            $closeTime,
            $isClosedInt
        );

        $stmt->execute();
    }


}

?>