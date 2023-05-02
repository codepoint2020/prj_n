<!-- Row MARKED-->



<div class="row mb-4">
 
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
    <div class="col-md-3 alert_parent">
 
    </div>
    
</div>
 <!-- card parent -->

<div class="row card-parent">

    <?php 

    //items per page
 
    $items_per_page = 12;


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

     <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
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
            <div class="card grow shadow-2">
                <?php if (empty($row['cover_img'])): ?>
                <img class="card-img-top img-fluid" src="<?php echo $cover_img_default; ?>"
                    alt="Card image cap">
                <?php else: ?>

                  <!-- REMEMBER TO PREVENT UPLOAD OF OTHER FILE TYPES -->
                    <img class="card-img-top img-fluid" src="<?php echo $cover_img; ?>"
                    alt="Card image cap">
                
                    <?php endif; ?>
                <div class="card-body">
                    <h4 class="card-title"><?php echo ucwords(strtolower($row['title'])); ?></h4>
                    <small class="card-category">Category: <a href="#"><?php echo $row['category']; ?></a></small><br>
                    <small class="card-category">File type: <a href="#"><?php echo $row['file_type']; ?></a></small>
                    <p class="card-text"><?php echo short_desc($row['details']); ?></p>
                    
                   
                </div>
            </div>
        </a>
    </div>
    
    <?php endwhile ?>
    <!-- column -->
    

   

</div>
<!-- Row -->

<div class="row">
<div class="col-12">
    <nav aria-label="...">
          <ul class="pagination">
            <?php if ($page > 1) : ?>
              <!-- <li class="page-item">    
                <a class="page-link  news-cta" href="panel.php?all_references=true&post_page=<?php //echo $page - 1; ?>">Prev</a>
              </li> -->
              <a style="padding-left: 30px; padding-right: 30px" href="panel.php?all_references=true&post_page=<?php echo $page - 1; ?>" class="btn btn-secondary mx-2"><i class="fas fa-angle-left"></i> Prev</a>
            <?php else : ?>
              <li class="page-item disabled">
                <a style="padding-left: 30px; padding-right: 30px;" class="page-link  news-cta " href="">Prev</a>
              </li>
            <?php endif; ?>



            <?php if ($page < $total_pages) : ?>
              <li class="page-item">

                <!-- <a class="page-link news-cta" href="panel.php?all_references=true&post_page=<?php //echo $page + 1; ?>">Next</a>
              </li> -->
              <a style="padding-left: 30px; padding-right: 30px;" href="panel.php?all_references=true&post_page=<?php echo $page + 1; ?>" class="btn btn-secondary">Next <i class="fas fa-angle-right"></i></a>
            <?php else : ?>
              <li class="page-item disabled">
                <a style="padding-left: 30px; padding-right: 30px;" class="page-link news-cta " href="">   Next</a>
              </li>
            <?php endif; ?>


            <li class="page-item">
              <a style="padding-left: 30px; padding-right: 30px;" class="btn btn-info mx-2" href="panel.php?all_references=true">All</a>
            </li>

          </ul>
        </nav>
    </div>
</div>

<script>

//=====================FILTER BY CATEGORY with associated PHP Script under PHP Dir=====================//
const btn_cat_filter = document.getElementById("btn_cat_filter");



const cat_filter = document.getElementById("cat_filter");

cat_filter.addEventListener("change", function() {
    btn_cat_filter.click();
});
//=====================FILTER BY CATEGORY=====================//



//=====================QUICK SEARCH FUNCTIONALITY=====================//
// Get the search input and card parent elements
const searchInput = document.querySelector('.search-input');
const cardParent = document.querySelector('.card-parent');


// Add a keyup event listener to the search input
searchInput.addEventListener('input', function() {
  // Get the search query
  const query = this.value.trim().toLowerCase();

  // Get all the cards
  const cards = cardParent.querySelectorAll('.card-handle');

  // Loop through each card and check if the card title or description contains the search query
  cards.forEach(function(card) {

    const title = card.querySelector('.card-title').textContent.toLowerCase();
    const description = card.querySelector('.card-text').textContent.toLowerCase();
    const category = card.querySelector('.card-category').textContent.toLowerCase();
    
    const title_desc_category = title + description + category;

    if (title_desc_category.includes(query)) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
});

</script>

