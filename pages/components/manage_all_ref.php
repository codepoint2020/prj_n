
<style>
    .fa-window-close {
        color: #fff;
    }
</style>

<div class="row">
    
    <div class="card shadow-1">
        <div class="card-body">
            <h4 class="card-title">All References</h4>
                            <div class="col-md-3 mb-4">
                                <a href="panel.php?manage_references=true" class="btn btn-info">Add New Reference</a>
                            </div>
            <div class="table-responsive">
                <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                                style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th >[UID] Reference Title</th>
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

                                $cover_img_default = "../assets/images/default_cover2.png";
                                $cover_img = $row['cover_img'];
                          
                                
                                $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
                                $cover_img_pptx = "./pptx_player/file/" . $cover_img;
                                $cover_img_vids = "../assets/references/videos/" . $cover_img;
                                $num++;

                                // $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                                // $cover_img_default = "../assets/images/default_cover2.png";
                                // $cover_img = $row['cover_img'];
                          
                                
                                // $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
                                // $cover_img_pptx = "./pptx_player/file/" . $cover_img;
                                // $cover_img_vids = "../assets/references/videos/" . $cover_img;

                                // if ($file_format == "pdf") {

                                //     $cover_img = $cover_img_pdf;

                                // } elseif ($file_format == "mp4") {
                                
                                //     $cover_img = $cover_img_vids;

                                // } elseif ($file_format == "pptx") {

                                //     $cover_img = $cover_img_pptx;
                                
                                // } else {

                                //     NULL;

                                // }
                        
                        ?>
                        <tr>

                     

                            <td><?php echo  $num; ?></td>
                            <td><a <?php 
        
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
                              
                            </a>
                            </td>
                            <td><?php echo ucwords($row['category']); ?></td>
                            
                            <td><?php echo ucwords($row['author']); ?></td>
                            <td><?php echo ucwords($row['register_date']); ?></td>
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



<?php if(isset($_SESSION['reference_update_event'])) {
    unset($_SESSION['reference_update_event']); 
}

?>

