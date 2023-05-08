
<style>

.video-player {
    position: relative;
    outline: none;
}


.jm-back {
    position: absolute;
    font-size: 1.3rem;
    padding-right: 10px;
    padding-top: 10px;
    z-index: 2;
    color: #fff;
    text-shadow: 1px 2px 4px black;
    margin-right: 3px;
    right: 0;
    opacity: 0.8;
}

.jm-back:hover {
    transform: scale(1.15);
}

</style>

<?php

if (isset($_GET['file'])) {
    $video_location = '../assets/references/videos/';
    $video_file = $video_location . $_GET['file'];
    $file = $_GET['file'];
    $id = html_ent($_GET['id']);
    $title = html_ent($_GET['title']);
    $file_query = $conn->query("SELECT * FROM tbl_books WHERE book_id = $id");
    $row = $file_query->fetch_assoc();

    $book_id = intval($id);

    log_view($book_id);
}

if (isset($_GET['saved'])) {
    
    $book_id = intval($_GET['id']);
    add_to_list($book_id);
    $_SESSION['prevent_reload'] = 'set';
    redirect("panel.php?load_video=true&id=".$book_id."&file=".$file."&title=".$title."&save_complete=true");
    
}

if (isset($_GET['save_complete']) && isset($_SESSION['prevent_reload'])) {
    set_alert_success("Success! This reference is now added in your study list: ".'<a href="panel.php?study_list=true">Go to My Study List</a>');
    unset($_SESSION['prevent_reload']);

}

display_notification();

?>



<a id="add_to_list" class="btn btn-dark mb-4" href="panel.php?load_video=true&id=<?php echo $book_id; ?>&file=<?php echo $file; ?>&title=<?php echo $title; ?>&saved=true">Add To My Study List</a>

    <div class="video-player" id="videoPlayer">
    <a href="panel.php?all_references=true" id="hidden_link">
        <i class=" fas fa-times-circle jm-back"></i>
    </a>
        <video width="100%" controls id="myVideo" autoplay>
             <source src="<?php echo $video_file; ?>" type="video/mp4">
        </video>
        <!-- <img src="<?php //echo $video_location; ?>close.png" class="close-btn" onclick="stopVideo()"> -->
        <h2 class="h3 mt-2">Description:  <?php echo $row['details'] ?></h2>
        
    </div>
    

    <script>
         var videoPlayer = document.getElementById("videoPlayer");
         var myVideo = document.getElementById("myVideo");
         var hidden_link = document.getElementById("hidden_link");

        //  function stopVideo() {
        //     videoPlayer.style.display = "none";
        //     hidden_link.click();
        //  }

         function playVideo(vid) {
            myVideo.src = vid;
            videoPlayer.style.display = "block";

         }
    </script>
