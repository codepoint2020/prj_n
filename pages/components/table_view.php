<div class="card shadow-2">
                            <div class="card-body ">
                                <h4 class="card-title"> <a href="panel.php?all_references=true" class="btn btn-dark btn-sm jm-info mt-2">Back to default view</a>  </h4>
                                <h6 class="card-subtitle">Type any keywords like possible title, description, category, author, file type, date posted etc.</h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table border table-striped table-bordered text-wrap table-info"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                              
                                              
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>File type</th>
                                                <th>Description</th>
                                                <th>Author</th>
                                                <th>Register Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                                    $all_ref_query = $conn->query("SELECT * FROM tbl_books ORDER BY book_id DESC");
                                           
                                                    while ($row = $all_ref_query->fetch_assoc()):
                                                        $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                                                        $cover_img_default = "../assets/images/default_cover2.png";
                                                        $cover_img = $row['cover_img'];
                                                  
                                                        
                                                        $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
                                                        $cover_img_pptx = "./pptx_player/file/" . $cover_img;
                                                        $cover_img_vids = "../assets/references/videos/" . $cover_img;
                                               
                                        ?>
                                         <tr>
                                        
                                   
                                           
                                           <td>

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
                                           </a>
                                        
                                        </td>
                                           <td><?php echo $row['category']; ?></td>
                                           <td><?php echo $row['file_type']; ?></td>
                                           <td><?php echo $row['details']; ?></td>
                                           
                                          
                                           <td><?php echo $row['author']; ?></td>
                                           <td><?php echo $row['register_date']; ?></td>
                                      
                                       </tr>
           
       
                                            

                                            <?php endwhile; ?>
                                   
                                         
                                        
                                        
                                        </tbody>
                                 
                                    </table>
                                </div>
                            </div>
                        </div>