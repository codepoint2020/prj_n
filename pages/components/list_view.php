<div class="col-md-3">
        <li class="nav-item d-none d-md-block">
            <a class="nav-link" href="javascript:void(0)">
                <form>
                    <div class="customize-input">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white search-input shadow-2"
                            type="search" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </a>
        </li>
    </div>
    <div class="col-md-3">
        <form action="panel.php?all_references=true" method="POST">
        <select class="form-select mr-sm-2 mb-2" id="cat_filter" name="cat_filter">
            <option  value="">Choose category...</option>
            <option  value="All">All</option>
            <?php
                $get_categories = $conn->query("SELECT name FROM tbl_categories ORDER BY name ASC");
                while ($cat_name = $get_categories->fetch_assoc()):
            ?>
            <option value="<?php echo $cat_name["name"]; ?>"><?php echo ucwords($cat_name["name"]); ?></option>
            <?php endwhile; ?>
          
            
        </select>
            <button style="display: none" class="btn btn-sm btn-primary" name="btn_cat_filter" id="btn_cat_filter">btn_cat_filter</button>
        </form>
    </div>

    <!-- LIST VIEW -->
    <div class="col-md-3 alert_parent">

    
        <li class="nav-item d-none d-md-block mt-1">
            <a class="nav-link" href="javascript:void(0)">
            
                    <div class="customize-input">
                        <a href="panel.php?all_references=true" class="btn btn-dark btn-sm jm-info"> <i class="fas fa-th-large" data-bs-toggle="tooltip" title="Card View: This is the default view, allows quicker search functionality but more optimized on recently uploaded references"></i> </a>
                        <a href="panel.php?list_view=true" class="btn btn-dark btn-sm jm-info"> <i class="fas fa-th-list" data-bs-toggle="tooltip" title="List View: Similar with card view on a list styled layout. "></i> </a>
                        <a href="#" class="btn btn-dark btn-sm jm-info"> <i class="fas fa-table" data-bs-toggle="tooltip" title="Table View: This offers a detailed and more verbose searching experience of references"></i> </a>
                    </div>
               
            </a>
        </li>

      
     
    </div>

    <hr class="mb-4 mt-4">

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





<div class="col-12">
  <div class="card shadow-2">
      <div class="card-body">
          
          <div class="media d-flex align-items-center">
            <a 
            
            <?php 
        
        if ($file_format == "pptx") {
          echo 'target="_blank"';
        }
        
        ?>
            
            href="<?php 
        
    
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
      


?>id=<?php echo $row['book_id']?>&file=<?php echo $row['file_name']; ?>&title=<?php echo $row['title']; ?>" class="btnView" style="display: none">anchor tag to be hidden</a>
              <?php if (empty($cover_img)): ?>
              <img class="align-self-center w-25 me-3 jm-media-pic thumbnails" src="../assets/images/default_cover2.png"
                  alt="Generic placeholder image">
                  <?php else: ?>
                    <img class="align-self-center w-25 me-3 jm-media-pic thumbnails" src="<?php echo $cover_img; ?>"
                  alt="Generic placeholder image">
                  <?php endif; ?>
        
              <div class="media-body">
                
                  <p><?php echo $row['details']; ?> <a href="" class="">Read more...</a> </p>
                   
        
              </div>
          </div>
      </div>
  </div>
</div>


<?php endwhile; ?>

<style>
  .thumbnails {
    cursor: pointer;
  }
</style>

<script>
  const thumbnails = document.querySelectorAll('.thumbnails');
const btnViews = document.querySelectorAll('.btnView');

for (let i = 0; i < thumbnails.length; i++) {
  thumbnails[i].addEventListener('click', () => {
    btnViews[i].click();
  });
}

</script>