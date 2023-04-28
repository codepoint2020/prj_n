

<?php



if (isset($_GET['file'])) {
    $video_location = '../assets/references/videos/';
    $video_file = $video_location . $_GET['file'];
    $id = html_ent($_GET['id']);
    $file_query = $conn->query("SELECT * FROM tbl_books WHERE book_id = $id");
    $row = $file_query->fetch_assoc();
  }
?>


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
