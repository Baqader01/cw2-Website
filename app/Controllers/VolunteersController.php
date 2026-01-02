<?php

class VolunteersController
{
    public static function index(mysqli $conn)
    {
        $sql = "SELECT volunteer_id, full_name, email, phone, over18, created_at
                FROM volunteers
                ORDER BY volunteer_id ASC";

        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo "<p>Could not load volunteers at the moment.</p>";
            return;
        }

        // Convert DB result into an array of rows for the view
        $result = $query->fetch_all(MYSQLI_ASSOC);

        require __DIR__ . '/../Views/Volunteers.php';
    }
}
