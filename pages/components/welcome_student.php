<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="p-5 text-center bg-body-tertiary rounded-3">
      <h1 class="text-body-emphasis">Welcome aboard</h1>
        <img src="../assets/images/default_cover_transparent.png" alt="book cover" height="300px" class="mb-4">
        
        <p class="col-lg-8 mx-auto fs-5">
        Welcome to NSSTC e-library! We are excited to offer you a collection of references and resources that you can access anytime, anywhere. Whether you're a student, a researcher, or an instructor our e-library has something for you. Browse our digital shelves and discover new titles, or search for specific books using our powerful search engine!
        </p>
        <div class="gap-2 mb-5">
          <a class="align-items-center btn btn-primary btn-lg rounded-pill" href="panel.php?all_references=true">EXPLORE</a>
        
        </div>
      </div>
    </div>



    <div class="col-md-4 col-sm-4 p-4">
        <h4 class="card-title" style="color:black;">Top 5 Most Viewed References</h4>
        <hr class="mb-4">
        <ul class="list-group list-group-full">
          <?php
              $query_top_3 = $conn->query("SELECT b.book_id, b.title, b.details, b.file_name, b.file_type,  COUNT(v.view_id) AS view_count
              FROM tbl_books AS b
              JOIN tbl_views AS v ON b.book_id = v.book_id
              GROUP BY b.book_id
              ORDER BY view_count DESC
              LIMIT 5;
              ");

              while($row = $query_top_3->fetch_assoc()):
                $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);
               

          ?>
        <a <?php 
        
        if ($file_format == "pptx") {
          echo 'target="_blank"';
        }
        
        ?>href="
              <?php 
              
          
              $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

              if ($file_format == "pdf") {

                echo 'panel.php?load_pdf=true&';
                
              } elseif ($file_format == "mp4") {
                
                echo 'panel.php?load_video=true&';
                
              } elseif ($file_format == "pptx") {

                echo 'panel.php?load_pptx=true&';

              } elseif ($file_format == "docx") {
                echo '#';
              } else {
                NULL;
              }
            


              ?>id=<?php echo $row['book_id']?>&file=<?php echo $row['file_name']; ?>&title=<?php echo $row['title']; ?>">
                <li class="list-group-item"> <?php echo very_short_desc(ucwords($row['title'])); ?><span
                          class="badge text-bg-success mx-2"><?php echo $row['view_count'] . " " . "<i class='fas fa-eye'></i>"; ?></span>
                    
                </li>
              </a>

              <?php endwhile; ?>
   
        </ul>
    </div>
  </div>
</div>


<script>
  let listItems = document.querySelectorAll(".list-group-item");

  listItems.forEach(list => {
    list.addEventListener('mouseover', function () {
      if(list.classList.contains('active')) {
        list.classList.remove('active');
      } else {
        list.classList.add('active');
      }
    })
    list.addEventListener('mouseleave', function () {
      if(list.classList.contains('active')) {
        list.classList.remove('active');
      } else {
        list.classList.add('active');
      }
    })
  });
</script>
