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
    padding: 60px 0;
    color: #fff;
    font-size: 44px;
    text-align: center;
    
}

/* .container h1 {
    padding: 60px 0;
    color: #fff;
    font-size: 44px;
    text-align: center;
} */

.row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.col {
    flex-basis: 50%;
    min-width: 250px;
}

.feature-img {
    width: 83%;
    margin: auto;
    position: relative;
    border-radius: 6px;
    overflow: hidden;
}

.small-img-row {
    display: flex;
    background: #efefef;
    margin: 20px 0;
    align-items: center;
    border-radius: 6px;
    overflow: hidden;
    width: 85;
}

.small-img {
    position: relative;
    margin: 0.6rem;
}

.small-img img {
    width: 150px;
}

.small-img-row p {
    margin-left: 20px;
    color: #707070;
    line-height: 22px;
    font-size: 15px;
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
    position: relative;
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



if (isset($_GET['file'])) {
    $video_location = '../assets/references/videos/';
    $video_file = $video_location . $_GET['file'];
  }
?>

    <div class="container">
        <!-- <h1>some title</h1> -->
     
    </div>

    <div class="video-player" id="videoPlayer">
        <video width="100%" controls id="myVideo" autoplay>
             <source src="<?php echo $video_file; ?>" type="video/mp4">
        </video>
        <img src="<?php echo $video_location; ?>close.png" class="close-btn" onclick="stopVideo()">
        <a href="panel.php?all_references=true" id="hidden_link"></a>
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