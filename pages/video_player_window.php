<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
    margin:  0;
    padding: 0;

}



.container {
    width: 80%;
    margin: 80px auto; 
}




.feature-img {
    width: 83%;
    margin: auto;
    position: relative;
    border-radius: 6px;
    overflow: hidden;
}



.play-btn {
    width: 60px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;
}

.small-img .play-btn {
    width: 35px;
}

.video-player {
    width: 80%;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  
}

video:focus {
    outline: none;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 30px;
    cursor: pointer;
}


    </style>
    <title>Document</title>
</head>
<body>

<?php

// if (isset($_GET['id'])) {
//     $target_id = html_ent(($_GET['id']));
//     $query_file = $conn->query("SELECT file_name, cover_img FROM tbl_books WHERE book_id = $target_id; ") or die("Failed to fetch_file".$conn->error.__LINE__);
//     $target_file = $query_file->fetch_assoc();

// }


if (isset($_GET['file'])) {
    $video_location = '../assets/references/videos/';
    $video_file = $video_location . $_GET['file'];
  }
?>

    <div class="container">

    <div class="video-player" id="videoPlayer">
        <video width="100%" controls id="myVideo" autoplay>
             <source src="<?php echo $video_file; ?>" type="video/mp4">
        </video>
        <img src="<?php echo $video_location; ?>close.png" class="close-btn" onclick="stopVideo()">
        <a href="panel.php?all_references=true" id="hidden_link"></a>
    </div>
        
        
    </div>

   
    

    <script>
         var videoPlayer = document.getElementById("videoPlayer");
         var myVideo = document.getElementById("myVideo");
         var hidden_link = document.getElementById("hidden_link");
   

         function stopVideo() {
            videoPlayer.style.display = "none";
            hidden_link.click();
         }

         function playVideo(vid) {
            myVideo.src = vid;
            videoPlayer.style.display = "block";

         }
    </script>
</body>
</html>