<?php

$conn = new mysqli("localhost", "root", "", "elib_db");

$dataCountNew = $_POST["dataCountNew"];
$_SESSION['total_videos_loaded'] = $dataCountNew;

$query_videos = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'mp4' ORDER BY book_id DESC LIMIT $dataCountNew");

if($query_videos->num_rows > 0) {
    while ($row = $query_videos->fetch_assoc()){
        $video_list = <<<DELIMETER
        <a href="panel.php?load_gallery=true&video_selected=true&id={$row['book_id']}">
        <div class="vid active">
            <video src="../assets/references/videos/{$row['file_name']}" muted></video>
            <h3 class="title" >{$row['title']}</h3>
        </div>
        </a>

DELIMETER;
echo $video_list;
    }
} else {
    $message = <<<DELIMETER
    <h3 class="title">No videos uploaded yet</h3>
    
DELIMETER;
}