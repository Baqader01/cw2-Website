<?php

class Shifts
{
    public static function getAll(mysqli $conn)
    {
        $sql = "SELECT shift_id, shift_date, label, start_time, end_time, required_volunteers, max_volunteers
            FROM shifts
            ORDER BY shift_id ASC";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            return [];
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>