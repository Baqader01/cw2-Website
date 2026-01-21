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

}

?>