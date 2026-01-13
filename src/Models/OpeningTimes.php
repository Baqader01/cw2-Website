<?php

class OpeningTimes
{
    public static function getAll()
    {
        $sql = "SELECT day_name, open_time, close_time, is_closed
            FROM opening_hours
            ORDER BY opening_id ASC";

        $conn = db_connect();

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>