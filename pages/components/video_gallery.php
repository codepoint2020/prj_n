<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <?php
        $num_videos = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'mp4' ");
        $total_vids = $num_videos->num_rows;
    ?>
    <script>
        //jquery here
        $(document).ready(function () {
            var dataCount = 8;
            $("#btnLoad").click(function() {
                var btnLoader = $("#btnLoad");
                var title = $(".title");

                dataCount = dataCount + 1;
                $("#data").load("components/loadmore.php", {
                    dataCountNew: dataCount
                })

                if (title.length == <?php echo $total_vids; ?>) {
                    btnLoader.html("All videos loaded");
                    btnLoader.prop("disabled", true);
                }
                console.log(title.length);
            })
        })

    </script>
    <title>Document</title>
    <style>
        * {
    margin: 0;
    padding: border-box;
    text-transform: capitalize;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: normal;
}

a {
    margin: 0px;
    padding: 0px;
    border: none;
}

body {
    background: #eee;

}

.heading {
    color: #444;
    font-size: 40px;
    text-align: center;
    padding: 10px;
}

.container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 15px;
    align-items: flex-start;
    padding: 5px 5%;
}

.container .main-video {
    background: #fff;
    border-radius: 5px;
    padding: 10px;
}
.container .main-video video {
    width: 100%;
    border-radius: 5px;
}

.container .main-video .title {
    color: #333;
    font-size: 23px;
}

.container .video-list {
    background: #fff;
    border-radius: 5px;
    height: 700px;
    overflow-y: scroll;
}

.container .video-list::-webkit-scrollbar {
    width: 7px;

}

.container .video-list::-webkit-scrollbar-track {
    background: #ccc;
    border-radius: 50px;

}

.container .video-list::-webkit-scrollbar-thumb {
    background: #666;
    border-radius: 50px;

}

.container .video-list .vid video {
    width: 100px;
    border-radius: 5px;
}

.container .video-list .vid {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f7f7f7;
    border-radius: 5px;
    margin: 10px;
    padding: 10px;
    border: 1px solid rgba(0,0,0,.1);
    cursor: pointer;
}

.container .video-list .vid:hover {
    background: #b9b5b5;
   

}


.container .video-list .vid:active {
    background: #2980b9;
    
}

.container .video-list .vid.active .title {
    color: #279eed;
    font-weight: bold;
}

.container .video-list .vid .title {
    color: #333;
    font-size: 17px;
}

.jm-margin {
    margin-left: 73px;
    margin-bottom: 20px;
}



@media (max-width: 991px) {
    .container {
      
        grid-template-columns: 1.5fr 1fr;
        padding: 10px;
    }
}


@media (max-width: 768px) {
    .container {
      
        grid-template-columns: 1fr;
     
    }
}

    </style>
</head>

<body>

    <!-- Searchbox Here -->  
    <div class="row card-parent">
    <div class="card">
        <div class="card-body">
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <input type="text" class="form-control search-input mt-4 shadow-1 br4" placeholder="Search">
                </div>
            </div>
        </div>
    </div>

    <?php




    ?>


    <div class="card">
        <div class="body">
            <div class="container mt-4">

                <?php 
                    if (isset($_GET['video_selected'])): {

                        $book_id = $_GET['id'];

                        $query_selected = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'mp4' AND book_id = $book_id");
                        $row = $query_selected->fetch_assoc();

                        $book_id = intval($_GET['id']);
		                log_view($book_id);

                    }
                ?>
                <div class="main-video">
                    
                    <div class="video">
                        <video src="../assets/references/videos/<?php echo $row['file_name']; ?>" controls autoplay></video>
                        <h3 class="title mt-2"><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['details']; ?></p>
                    </div>
                </div>

                <?php else: ?>

                <div class="main-video" >
                    <?php
                    $query_videos = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'mp4' ORDER BY book_id DESC");
                    $first_vid = $query_videos->fetch_assoc();
                    ?>
                    <div class="video">
                        <video src="../assets/references/videos/<?php echo $first_vid['file_name']; ?>" controls autoplay></video>
                        <h3 class="title mt-2"><?php echo $first_vid['title']; ?></h3>
                        <p><?php echo $first_vid['details']; ?></p>
                    </div>
                </div>


                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                    <div class="video-list card-handle" id="data">
                    <?php
                    $query_videos = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'mp4' ORDER BY book_id DESC LIMIT 8");

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
                        <h3 class="title">No videos uplaoded yet</h3>
                        
DELIMETER;
                    }
                    
                    ?>
                </div>

                    </div>
                    <div class="col-12">
                    <?php

                   

                    if ($total_vids > 8):
                     
                    ?>
                    <div class="row p-4">
                        <button class="btn btn-primary text-center" id="btnLoad">Load more videos</button>
                    </div>
                     
                    <?php endif; ?>

                    </div>
                </div>
                
               
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.search-input').on('input', function() {
        var searchQuery = $(this).val().toLowerCase();

        $('.video-list .vid').each(function() {
            var title = $(this).find('.title').text().toLowerCase();

            if (title.includes(searchQuery)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});


</script>

</body>
</html>