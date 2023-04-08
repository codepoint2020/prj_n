<?php
add_book(); display_notification();
if(!isset($_SESSION['error_array'])) {
    $_SESSION['array_array'] = "";
} else {
    $retreived_error_array = $_SESSION['error_array'];
};
unset($_SESSION['error_array']);


?>
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage References</h4>
            <form action="panel.php?manage_references=true" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                            <!-- <h6 class="card-subtitle"><code>Required</code></h6> -->
                            <input type="text" id="title" name="title" class="form-control mb-4  
                            <?php 
                                if (in_array("empty_title", $retreived_error_array)) {
                                    echo "is-invalid";
                                }
                            ?>
                            " placeholder="Enter reference/book title...">
                            
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="details">Description</label>
                            <div class="form-group">
                                <textarea id="details" name="details" class="form-control mb-4 
                                  
                            <?php 
                                if (in_array("empty_details", $retreived_error_array)) {
                                    echo "is-invalid";
                                }
                            ?>
                                " rows="3" placeholder="Text Here..."></textarea>
                            </div>
                        </div>

                        <div class="mb-5">
                        
                            <label class="form-label" for="selectCategory">Category</label>  
                            <select class="form-select mr-sm-2 
                            <?php 
                                if (in_array("empty_category", $retreived_error_array)) {
                                    echo "is-invalid";
                                }
                            ?>
                            " id="selectCategory" name="category">
                                <option selected value="">Choose category...</option>
                                <?php 
                                    $get_categories = $conn->query("SELECT * FROM tbl_categories ") or die(jm_error('Categories query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                    while ($row = $get_categories->fetch_assoc()):
                                ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo ucwords($row['name']); ?></option>
                                <?php endwhile; ?>
                               
                            </select>
                           
                        </div>
                        
                    


                        <div class="mb-4">
                            <label class="form-label" for="formFile">Upload File</label>
                            <input class="form-control
                              
                            <?php 
                                if (in_array("empty_formFile", $retreived_error_array)) {
                                    echo "is-invalid";
                                }
                            ?>
                            
                            " type="file" id="formFile" name="formFile">
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="mb-2">
                            <label class="form-label" for="upload_file">Cover Image</label>
                            <input class="form-control" type="file" id="upload_file" name="cover_image" onchange="getImagePreview(event)">
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="../assets/images/big/img1.jpg"
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
                            <input type="text" class="form-control" name="author" placeholder="Enter author's name...">
                        </div>
                        <!-- <div class="mb-4">
                            <label class="">Author's Bio</label>
                            <input type="text" class="form-control" placeholder="Enter reference/book title...">
                        </div> -->
                        <div class="mb-3">
                            <button class="btn btn-primary btn-lg" name="add_book">Submit</button>
                        </div>

                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function getImagePreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var coverImage = document.getElementById("coverImage");
        coverImage.setAttribute("src",image);


        var upload_file = document.getElementById("upload_file");
        var filenamePreview = document.getElementById("filenamePreview");
        var filename = upload_file.files[0].name

        filenamePreview.textContent = filename;    
    }

</script>