<?php

$conn = new mysqli("localhost", "root", "", "elib_db");




$query_announcement = $conn->query("SELECT a.*, u.*
FROM tbl_announcement AS a
INNER JOIN tbl_users AS u ON a.user_id = u.user_id
ORDER BY a.announcement_id DESC
LIMIT 3");



if ($query_announcement) {
    while ($row = $query_announcement->fetch_assoc()) {
        echo $row['title'];
        echo $row['content'];
        echo $row['first_name'];
    }
} else {
    echo "Failed to retrieve data: " . $conn->error;
}




?>