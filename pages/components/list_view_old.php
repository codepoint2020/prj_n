<div class="col-12">

<?php 


    // items per page
 
    $items_per_page = 100;


    if (isset($_POST['btn_cat_filter'])) {

        $selected_category = $_POST['cat_filter'];
      

        if (empty($selected_category)) {
            //total books in tbl_books
            $get_total_books = $conn->query("SELECT * FROM tbl_books") or die("Failed to get total books query" . $conn->error . __LINE__);
            $total_books = $get_total_books->num_rows; 
        } elseif (!empty($selected_category) && $selected_category === "All") {
            redirect("panel.php?all_references=true&selected_all=true");
        } else {
           //total books in tbl_books
         $get_total_books = $conn->query("SELECT * FROM tbl_books WHERE category = '$selected_category' ") or die("Failed to get total books query" . $conn->error . __LINE__);
         $total_books = $get_total_books->num_rows;
         
         if ($total_books === 0) {
           echo '<div class="alert alert-secondary">' . 'No results found for this category: '.ucwords($selected_category). '</div>';
         } else {
           echo '<div class="alert alert-info"></strong>' . $total_books . '</strong> record(s) found for this category: ' . ucwords($selected_category). '</div>';
         } 

        }


    } else {

        //total books in tbl_books
        $get_total_books = $conn->query("SELECT * FROM tbl_books") or die("Failed to get total books query" . $conn->error . __LINE__);
        $total_books = $get_total_books->num_rows;

    }
    

     //set page if user do not or if user starts clicking the pagination buttons

     if (!isset($_GET['post_page'])) {
        $page1 = 0;
        $page = 1;
      } else {
        $page = html_ent($_GET['post_page']);

        if ($page == "" || $page == "0" || $page == 1) {
          $page1 = 0;
        } else {
          $page1 = ($page * $items_per_page) - $items_per_page;
        }
      }

      //total pages
      $total_pages = ceil($total_books / $items_per_page);

    if (isset($_POST['btn_cat_filter'])) {

        $selected_category = $_POST['cat_filter'];

        if (empty($selected_category)) {
              //set limit per page
                $get_all_books = $conn->query("SELECT * FROM tbl_books ORDER BY book_id DESC LIMIT $page1, $items_per_page") or die("Failed to get all books" . $conn->error . __LINE__);
        }
    
        $get_all_books = $conn->query("SELECT * FROM tbl_books WHERE category = '$selected_category' ORDER BY book_id DESC LIMIT $page1, $items_per_page") or die("Failed to get all books" . $conn->error . __LINE__);

    } else {

    //set limit per page
      $get_all_books = $conn->query("SELECT * FROM tbl_books ORDER BY book_id DESC LIMIT $page1, $items_per_page") or die("Failed to get all books" . $conn->error . __LINE__);

      

    }

    while ($row = $get_all_books->fetch_assoc()):
        $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

        $cover_img_default = "../assets/images/default_cover2.png";
        $cover_img = $row['cover_img'];
  
        
        $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
        $cover_img_pptx = "./pptx_player/file/" . $cover_img;
        $cover_img_vids = "../assets/references/videos/" . $cover_img;
     

    ?>    






    <div class="card">
        <div class="card-body">
            <!-- <h5 class="card-title">Center-aligned media</h5> -->
            <a href="<?php 
        
    
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
      


?>id=<?php echo $row['book_id']?>&file=<?php echo $row['file_name']; ?>&title=<?php echo $row['title']; ?>" 

<?php 
        
        if ($file_format == "pptx") {
          echo 'target="_blank"';
        }
        
        ?>>
            
            <div class="media d-flex align-items-center">
                <?php if (empty($cover_img)): ?>
                   
                      <img class="align-self-center w-25 me-3" src="<?php echo $cover_img_default; ?>"
                      alt="Generic placeholder image">
                      <?php else: ?>
                          <img class="align-self-center w-25 me-3" src="<?php echo $cover_img; ?>"
                      alt="Generic placeholder image">
                      <?php endif; ?>
                  
                    
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $row['title']; ?></h5>
                    </a>
                    <?php echo $row['details']; ?>
                        <div class="mt-3 mb-2">
                            <a href="#" class="btn btn-sm btn-primary">READ</a>
                            <a href="#" class="btn btn-sm btn-danger">DOWNLOAD</a>
                        </div>
                </div>
            </div>
        </div>
    </div>


<?php endwhile; ?>

</div>