<?php

class Volunteers
{
    public static function getAll($conn)
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
}

?>