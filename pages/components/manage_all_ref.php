
<style>
    .fa-window-close {
        color: #fff;
    }

    #delete_multiple_references {
        display: none;
    }
</style>

<div class="row">
<form action="panel.php?manage_all_ref=true" method="POST">
    <div class="card shadow-1">
    <?php delete_multiple_references(); display_notification(); ?>
        <div class="card-body">
            <h4 class="card-title">All References</h4>
            
                            <div class="col-12">
                                <a href="panel.php?manage_references=true" class="btn btn-info float-end mb-4">Add New Reference</a>
                            

                            <button type="button" id="initiate_references_delete" class="btn btn-danger mb-4" data-bs-toggle="tooltip" title="Enable the checkboxes for the desired user to be deleted and click this button">Batch Delete</button>
                            <button id="delete_multiple_references" name="delete_multiple_references">btn_del</button>
                            </div>
           
                            
                            <div class="table-responsive">
                <table id="default_order" class="table border table-striped table-bordered text-wrap"
                                style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
               
                            <th>Cover Image</th>
                            <th>Reference Title</th>
                            <th>Category</th>
                            
                            
                            <th>Author</th>
                            <th>Date Added</th>
                        
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody class="border border-primary">
                        <?php
                            $query_references = $conn->query("SELECT * FROM tbl_books");
                            $num = 0;           
                            while($row = $query_references->fetch_assoc()):
                                $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                                // $cover_img_default = "../assets/images/default_cover2.png";
                                // $cover_img = $row['cover_img'];
                          
                                
                                // $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
                                // $cover_img_pptx = "./pptx_player/file/" . $cover_img;
                                // $cover_img_vids = "../assets/references/videos/" . $cover_img;
                                // $num++;

                                $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                                $cover_img_default = "../assets/images/default_cover2.png";
                                $cover_img = $row['cover_img'];
                          
                                
                                $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
                                $cover_img_pptx = "./pptx_player/file/" . $cover_img;
                                $cover_img_vids = "../assets/references/videos/" . $cover_img;

                                if ($file_format == "pdf") {

                                    $cover_img = $cover_img_pdf;

                                } elseif ($file_format == "mp4") {
                                
                                    $cover_img = $cover_img_vids;

                                } elseif ($file_format == "pptx") {

                                    $cover_img = $cover_img_pptx;
                                
                                } else {
                                    NULL;
                                }

                                if (empty($row["cover_img"])) {
                                    $cover_img = $cover_img_default;
                                }
                        
                        ?>
                        <tr>

                     

                          
                            <td>  
                            <input type="checkbox" name="id_<?php echo $row['book_id']; ?>" value="id_<?php echo $row['book_id']; ?>">    
                            <img src="<?php echo $cover_img; ?>" alt=""></td>
                            <td>
                            </form>
                                <a <?php 
        
        if ($file_format == "pptx") {
          echo 'target="_blank"';
        }
        
        ?>href="<?php 
        
    
                    $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                    if ($file_format == "pdf") {

                      if (file_exists($cover_img_pdf)) {
                         $cover_img = $cover_img_pdf;
                      } else {
                         $cover_img = $cover_img_default;
                      }

             

                      echo 'panel.php?load_pdf=true&';
                      
                    } elseif ($file_format == "mp4") {
                      if (file_exists($cover_img_vids)) {
                         $cover_img = $cover_img_vids;
                      } else {
                         $cover_img = $cover_img_default;
                      }


                      echo 'panel.php?load_video=true&';
                      
                    } elseif ($file_format == "pptx") {

                     if (file_exists($cover_img_pptx)) {
                        $cover_img = $cover_img_pptx;
                     } else {
                        $cover_img = $cover_img_default;
                     }

                      echo 'panel.php?load_pptx=true&';

                    } elseif ($file_format == "docx") {
                      echo '#';
                    } else {
                      NULL;
                    }
                  
        
        
        ?>id=<?php echo $row['book_id']?>&file=<?php echo $row['file_name']; ?>&title=<?php echo $row['title']; ?>">
                                            
                                           
                                           
                                           
                                            <p class="jm-underline " style="min-width: 400px"><?php echo $row['title']; ?></p>
                              
                            </a><?php echo " ".$row["file_type"]?>
                            </td>
                            <td><?php echo ucwords($row['category']); ?></td>
                            
                            <td><?php echo ucwords($row['author']); ?></td>
                            <td><?php echo date("M j, Y, g:i a D",$row['register_date']); ?></td>
                            <td>
                                <a href="panel.php?manage_all_ref=true&delete_ref=true&id=<?php echo $row['book_id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i></a>
                                <a href="panel.php?edit_ref=true&edit_form=true&book_id=<?php echo $row['book_id']; ?>" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                           
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</div>

<script>

let delete_multiple_references = document.getElementById("delete_multiple_references");
            let initiate_references_delete = document.getElementById("initiate_references_delete");
            initiate_references_delete.addEventListener("click", function () {
                var result = window.confirm("You are about to delete multiple references, continue?");
                if (result) {
                    delete_multiple_references.click();
                } else {
                    alert("Command cancelled.");
                }
              
            })

</script>



<?php if(isset($_SESSION['reference_update_event'])) {
    unset($_SESSION['reference_update_event']); 
}

?>

