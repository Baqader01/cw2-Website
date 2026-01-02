<?php

class OpeningTimes
{
    public static function getAll(mysqli $conn)
    {
        $sql = "SELECT day_name, open_time, close_time, is_closed
            FROM opening_hours
            ORDER BY opening_id ASC";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>