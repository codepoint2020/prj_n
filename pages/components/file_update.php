<?php

$_SESSION['reference_update_event'] = "true";

if (isset($_GET['book_id']) && isset($_GET['changed_main_file']) || isset($_GET['cover_image_changed']) || isset($_GET['info_update']) || isset($_GET['changed_main_file_and_cover_image'])) {
    $book_id = $_GET['book_id'];
    $query_updated = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id");
    $book_info = $query_updated->fetch_assoc();
    $file_type = $book_info['file_type'];
    $file_name = $book_info['file_name'];
    $cover_img = $book_info['cover_img'];
    $category = $book_info['category'];
}

?>
<?php display_notification(); ?>
<div class="error_handler"></div>
<div class="row jm-width">
    <div class="card ">
        <div class="card-body ">
        
            <h4 class="card-title">UPDATE CONFIRMATION</h4>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                           
                           <input class="form-control" type="text" disabled value="<?php echo $book_info['title'] ?>">
                            
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="details">Description</label>
                            <div class="form-group">
                                <textarea  disabled id="details" name="details" class="form-control mb-4 
                        
                                " rows="3" placeholder="Text Here..."><?php echo $book_info['details']; ?></textarea>
                            </div>
                        </div>

                        <div class="mb-5">
                        
                           <label class="form-label" for="selectCategory">Category</label>  
                           <input type="text" class="form-control" value="<?php echo $category; ?>" disabled>
                           
                        </div>
                        
                    
                        <?php
                                if ($file_type === "pdf") {
                                    echo 'File type: PDF document';
                                } elseif ($file_type === "pptx") {
                                    echo 'File type: Powerpoint file';
                                } elseif ($file_type === "mp4") {
                                    echo 'File type: mp4 Video';
                                } else {
                                    NULL;
                                }
                             ?>
                             </p>

                             <img class="card-img-top jm-icon" src="
                                    <?php 
                                   if ($file_type === "pdf") {
                                    echo '../assets/images/pdf_icon.png';
                                    } elseif ($file_type === "pptx") {
                                        echo '../assets/images/pptx_icon.png';
                                    } elseif ($file_type === "mp4") {
                                        echo '../assets/images/video_icon.png';
                                    } else {
                                        NULL;
                                    }
                                    
                                    ?>">
                                    <p class="card-title">Filename:</p>
                                    <p class="card-title">
                            <?php echo $file_name; ?>
                            </p>

                    </div>
                    <div class="col-md-6">

                        <div class="mb-2">
                            <label class="form-label" for="upload_file">Cover Image</label>
                            <p></p>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                <img class="card-img-top img-fluid" src="<?php 
                                    if (empty($file_type)) {
                                        echo '../assets/images/default_cover2.png';
                                    } else {
                                       if ($file_type === "pdf") {
                                        echo '../assets/references/pdf/'.$cover_img;
                                       } elseif ($file_type === "mp4") {
                                        echo '../assets/references/videos/'.$cover_img;
                                       } elseif ($file_type === "pptx") {
                                        echo './pptx_player/file/'.$cover_img;
                                       } else {
                                        NULL;
                                       }
                                    }
                                    
                                    
                                    ?>"
                                        alt="Cover image" id="coverImage">

<!--                                         
                                    <img class="card-img-top img-fluid" src="../assets/images/default_cover.png"
                                        alt="Cover image" id="coverImage"> -->
                                    <div class="card-body">
                                       
                                        <p class="card-text" id="filenamePreview">Cover image preview</p>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                           
                        <div class="mb-5">
                            <label class="">Author</label>
                           
                            <input type="text" class="form-control" disabled value="<?php echo $book_info['author']; ?>">
                        </div>

                        <div class="mb-4">
                            <a href="panel.php?manage_all_ref=true" class="btn btn-primary btn-block btn-lg">Confirm</a>
                        </div>
                    
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    const formFile = document.getElementById('formFile');
    let error_handler = document.querySelector('.error_handler');
    const fileInput = document.getElementById('upload_file');

    formFile.addEventListener('change', function() {
        const allowedExtensions = ['mp4', 'pdf', 'pptx'];
        const file = formFile.files[0];
        const extension = file.name.split('.').pop().toLowerCase();
        if (!allowedExtensions.includes(extension)) {
        //   alert('The selected file is not supported by the system. Please upload a .mp4, .pdf, or .pptx file.');
        error_handler.innerHTML = '<div style="z-index: 99" class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button"></button>Error:[File not supported] Recommended files for references are as follows: .pdf, .pptx, and .mp4</div>';
          
          formFile.value = '';
        }
      });

     
      fileInput.addEventListener('change', function() {
        const allowedExtensions = ['png', 'jpg', 'jpeg', 'bmp'];
        const file = fileInput.files[0];
        const extension = file.name.split('.').pop().toLowerCase();
        if (!allowedExtensions.includes(extension)) {
        //   alert('The selected file is not supported by the system. Please upload a .mp4, .pdf, or .pptx file.');
        error_handler.innerHTML = '<div style="z-index: 99" class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button"></button>Error:[File not supported] Recommended files for cover image are as follows: .jpg, .png, .jpeg and .bmp</div>';
          fileInput.value = '';
        }
      });

    function getImagePreviewBook(event) {

        var image = URL.createObjectURL(event.target.files[0]);
        var coverImage = document.getElementById("coverImage");
        coverImage.setAttribute("src",image);


        var upload_file = document.getElementById("upload_file");
        var filenamePreview = document.getElementById("filenamePreview");
        var filename = upload_file.files[0].name

        filenamePreview.textContent = filename;    
    }

</script>