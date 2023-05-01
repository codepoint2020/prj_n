<?php

if (isset($_SESSION['reference_update_event']) && $_SESSION['reference_update_event'] === "true") {
    redirect("panel.php?manage_all_ref=true");
}

// if(!isset($_SESSION['error_array_edit'])) {
//     $_SESSION['error_array_edit'] = "";
// } else {
//     $retreived_error_array_edit = $_SESSION['error_array_edit'];
// };

// unset($_SESSION['error_array_edit']);

// if (isset($_GET['invalid_file_upload']) && isset($_SESSION["prevent_reload"]) && $_SESSION["prevent_reload"] == 'set') {
//     set_alert_danger("Please upload supported files only, <a style='text-decoration: underline;' href='panel.php?manage_references=true'>refresh</a> the page and try again.");
//     $_SESSION["prevent_reload"] == 'disabled';
//     unset($_SESSION["prevent_reload"]);
// }

display_notification();
update_book();

// $title = "";
// $category_id = "";
// $details = "";
// $author = "";
// $cover_img = "";
// $file_name = "";
// $file_type = "";

// if (!isset($_SESSION['e_cover_img'])) {
//     $_SESSION['e_cover_img'] = "";
// }

// if (!isset($_SESSION['e_file_type'])) {
//     $_SESSION['e_file_type'] = "";
// }
// global $conn;

if (isset($_GET['edit_form']) && $_SESSION["is_admin"] === "yes" ) {

    $book_id = intval(html_ent($_GET['book_id']));
    // $book_id = $_SESSION['edit_book_id'];

    $query_selected_ref = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id; ") or die("Failed to query selected reference: ".$conn->error.__LINE__);
    $row = $query_selected_ref->fetch_assoc();

    //  $_SESSION['e_title']  = $row['title'];
    //  $_SESSION['e_category_id']  = intval($row['category_id']);
    //  $_SESSION['e_category'] = $row['category'];
    //  $_SESSION['e_details']  = $row['details'];
    //  $_SESSION['e_author']  = $row['author'];
    //  $_SESSION['e_cover_img']  = $row['cover_img'];
    //  $_SESSION['e_file_type']  = $row['file_type'];
    //  $_SESSION['e_file_name']  = $row['file_name'];

     $title  = $row['title'];
     $category_id= intval($row['category_id']);
     $category = $row['category'];
     $details  = $row['details'];
     $author = $row['author'];
     $cover_img  = $row['cover_img'];
     $file_type  = $row['file_type'];
     $file_name = $row['file_name'];

}


?>
<div class="error_handler"></div>
<div class="row jm-width">
    <div class="card ">
        <div class="card-body ">
     
            <h4 class="card-title">Edit reference</h4>
            <form action="panel.php?edit_ref=true&book_id=<?php echo $book_id; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $book_id; ?>" name="book_id">
                <input type="hidden" value="<?php echo $category_id; ?>" name="category_id">
         
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                            <!-- <h6 class="card-subtitle"><code>Required</code></h6> -->
                            <input type="text" id="title" name="title" class="form-control mb-4  
                            <?php 
                                // if (in_array("empty_title", $retreived_error_array_edit)) {
                                //     echo "is-invalid";
                                // }
                            ?>
                            " placeholder="Enter reference/book title..." value="<?php echo $title; ?>">
                            
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="details">Description</label>
                            <div class="form-group">
                                <textarea id="details" name="details" class="form-control mb-4 
                                  
                            <?php 
                                // if (in_array("empty_details", $retreived_error_array_edit)) {
                                //     echo "is-invalid";
                                // }
                            ?>
                                " rows="3" placeholder="Text Here..."><?php echo $details; ?></textarea>
                            </div>
                        </div>

                        <div class="mb-5">
                        
                            <label class="form-label" for="selectCategory">Category</label>  
                            <select class="form-select mr-sm-2 
                            <?php 
                                // if (in_array("empty_category", $retreived_error_array_edit)) {
                                //     echo "is-invalid";
                                   
                                // }
                            ?>
                            " id="selectCategory" name="category">
                                <option value="">Choose category...</option>
                                <?php 
                                    $get_categories = $conn->query("SELECT * FROM tbl_categories ") or die(jm_error('Categories query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                    while ($cat_row = $get_categories->fetch_assoc()):
                                ?>
                                    <option <?php if ($category === $cat_row['name']) { echo 'selected '; }?> value="<?php echo $cat_row['name']; ?>"><?php echo ucwords($cat_row['name']); ?></option>
                                <?php endwhile; ?>
                               
                            </select>
                        </div>
                        <div class="db_file mb-4">
                            <p class="mb-2">
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
                            <?php echo 'Filename: '.$file_name; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="formFile">Replace File</label>
                            <input class="form-control
                              
                            <?php 
                                // if (in_array("empty_formFile", $retreived_error_array_edit)) {
                                //     echo "is-invalid";
                                // }

                                // if (in_array("unsupported_file", $retreived_error_array_edit)) {
                                //     echo "is-invalid";
                                //     redirect("panel.php?manage_references=true&invalid_file_upload=true");
                                //     $_SESSION["prevent_reload"] = 'set';
                                // }
                            ?>
                            
                            " type="file" id="formFile" name="formFile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="File supported .mp4, .pdf, .pptx">
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="mb-2">
                            <label class="form-label" for="upload_file">Cover Image</label>
                            <input class="form-control
                            <?php 
                            // if (in_array("unsupported_file", $retreived_error_array_edit)) {
                            //     echo "is-invalid";
                            //     redirect("panel.php?manage_references=true&invalid_file_upload=true");
                            //     $_SESSION["prevent_reload"] = 'set';
                            // }
                            ?>
                            " type="file" id="upload_file" name="cover_image">
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
                                    <div class="card-body">
                                       
                                        <p class="card-text" id="filenamePreview">Cover image preview</p>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                           
                        <div class="mb-5">
                            <label class="">Author</label>
                            <!-- <h6 class="card-subtitle">To use add <code>.form-control-file</code> class to the input
                            </h6> -->
                            <input type="text" class="form-control" name="author" placeholder="Enter author's name..." value="<?php echo $author; ?>">
                        </div>
                        <!-- <div class="mb-4">
                            <label class="">Author's Bio</label>
                            <input type="text" class="form-control" placeholder="Enter reference/book title...">
                        </div> -->
                        <div class="mb-3">
                            <button class="btn btn-primary btn-lg" name="update_book">Submit</button>
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

