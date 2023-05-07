<?php



// $query_num_categories = $conn->query("SELECT * FROM tbl_categories; ") or die("Failed to query all categories: ".$conn->error.__LINE__);
// $i = 0;





// while ($row = $query_num_categories->fetch_assoc()) {
// $chart = <<<DELIMETER

// <script>
// alert('test');
// {$row['name']}
// </script>

// DELIMETER;
// $i++;
// echo $chart;
// }








// $query_num_ = $conn->query("SELECT * FROM tbl_books ORDER BY book_id DESC ");
// $book_item = $query_all_references->fetch_assoc();


?>

<div class="col-md-8 shadow-1 pt-4">
    <div class="row">
 

        <div class="col-md-12">
            <div class="card border-end">
                <div class="card-body">
                   
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <canvas id="myChart" style="width:100%;"></canvas>

                <script>
    var xValues = [
        <?php
            $all_cat_query = $conn->query("SELECT * FROM tbl_categories ORDER BY category_id ASC; ");
            $total_category = $all_cat_query->num_rows;
            while ($row = $all_cat_query->fetch_assoc()) {
                echo "'" . $row['name'] . "',";
            }
        ?> 
    ];
    var yValues = [

<?php
  $books_by_category = $conn->query("SELECT tbl_categories.name AS category, COUNT(tbl_books.book_id) AS num_books
  FROM tbl_categories
  LEFT JOIN tbl_books ON tbl_categories.category_id = tbl_books.category_id
  GROUP BY tbl_categories.category_id ORDER BY tbl_categories.category_id ASC
  ");

  while ($books_category_record = $books_by_category->fetch_assoc()) {
      echo $books_category_record['num_books'] . ", ";

  } 
  echo 0;
?>

        // 255, 495, 445, 245, 155, 222, 222, 222,
       
    
    ];
    var barColors = [
        <?php
            $colorArray = ["#FF6D60", "#03C988","#088395","#FFD56F","#FF7B54","#13005A","#86C8BC","#FFBF00", "#009EFF", "#EB6440","#E97777","#8D72E1","#9ED5C5","#54B435","#3C4048"];

            shuffle($colorArray);
            $randomColors = array_slice($colorArray, 0, $total_category);
            foreach($randomColors as $color) {
                echo "'" . $color . "',";
              }
        ?>
    ];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Comparison on available references per category"
            }
        }
    });
</script>




                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup><?php echo get_num_books(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Number of references
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup><?php echo get_num_users(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Number of users
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup><?php echo get_num_mp4(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Number of Videos
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup><?php echo get_num_pptx(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Number of Powerpoint Presentation
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup><?php echo get_num_pdf(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Number of pdf documents
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-info  grow shadow-2 rounded-4">
                    <a href="panel.php?manage_references=true">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">Add Reference</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Click to add new reference/book
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7"><i class="fas fa-plus text-dark"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->

     
        <!-- <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-success  grow shadow-2 rounded-4">
                    <a href="panel.php?load_users=true">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">Manage Users</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Add/View/Edit user's information.
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-dark"><i class="fas fa-users"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-warning rounded-4">
                    <a href="#">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">References</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Update References
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-edit text-dark"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-secondary rounded-4">
                    <a href="#">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">System Settings</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Manage/configure system settings
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-white"><i class="icon-settings"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-md-6">
            <button class="btn btn-primary">Password Reset Tool</button>
        </div> -->

       
    </div>
</div>


<!-- <div class="col-sm-6 col-lg-3">
<div class="card border-end ">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <div class="d-inline-flex align-items-center">
                    <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                    <span
                        class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">-18.33%</span>
                </div>
                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Projects
                </h6>
            </div>
            <div class="ms-auto mt-md-3 mt-lg-0">
                <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
            </div>
        </div>
    </div>
</div>
</div> -->


<div class="col-sm-4">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Recent Activities</h4>
            
            <div class="mt-4 activity">
                <?php

                
    //items per page
 
    $items_per_page = 6;

     //total logs combined with tbl_users info
    $query_logs_total = $conn->query("SELECT id FROM activity_logs;");

    $total_logs = $query_logs_total->num_rows;

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
     $total_pages = ceil($total_logs / $items_per_page);

     //set limit per page
    //  $get_all_books = $conn->query("SELECT * FROM tbl_books ORDER BY book_id DESC LIMIT $page1, $items_per_page") or die("Failed to get all books" . $conn->error . __LINE__);

     //set limit per page
    $query_logs = $conn->query("SELECT activity_logs.*, tbl_users.*
    FROM activity_logs
    INNER JOIN tbl_users ON activity_logs.user_id = tbl_users.user_id ORDER BY activity_logs.id DESC LIMIT $page1, $items_per_page;
    ") or die("Failed to get all activity logs ".$conn->error.__LINE__);


                while ($log = $query_logs->fetch_assoc()):

                ?>
               
                <div class="d-flex align-items-start border-left-line pb-3">
                    <div>
                        <a>
                            <img class="rounded-circle jm-circular mx-4" width="40" src="../assets/images/users/<?php echo $log['profile_pic']; ?>" alt="user photo"></img>
                        </a>
                    </div>
                    <div class="ms-3 mt-2">
                        <h5 class="text-dark font-weight-medium mb-2"><?php echo ucwords($log['activity']) . " " . strtolower($log['affected']) . " " . ucwords($log['item']); ?></h5>
                        <p class="font-14 mb-2 text-muted">Performed by:  <?php echo $log['first_name'] . " " .$log["last_name"]; ?>
                        </p>
                        <span class="font-weight-light font-14 text-muted"><?php 
                        
                        $timestamp = $log['datelog'];
                        $date = date('F j, Y, g:i a', $timestamp);
                        echo $date;

                        
                        ?></span>
                    </div>
                </div>

                <?php endwhile; ?>
      
                <!-- <div class="card">
                    <img class="card-img-top img-fluid" src="../assets/images/under_construction.png"
                        alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Work is underway</h4>
                        <p class="card-text">The development of this page is still in progress, try again later.</p>
                        <p class="card-text"><small class="text-muted">Maintainance, development</small></p>
                    </div>
                </div> -->

                <div class="ms-3 mt-2">             
                    <a href="panel.php?data_changes=true"
                        class="font-14 border-bottom pb-1 border-info">View All</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-sm-6 col-lg-3">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Recent References Changes</h4>
            
            <div class="mt-4 activity">
                <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="d-flex align-items-start border-left-line pb-3">
                    <div>
                        <a>
                            <img class="rounded-circle" width="40" src="../assets/images/users/user_def_img.png" alt="user photo"></img>
                        </a>
                    </div>
                    <div class="ms-3 mt-2">
                        <h5 class="text-dark font-weight-medium mb-2">Electronic Warfare</h5>
                        <p class="font-14 mb-2 text-muted">Added by: <br> Jerome Morales
                        </p>
                        <span>Category: Research</span><br>
                        <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                    </div>
                </div>
                <?php endfor; ?>

                <div class="ms-3 mt-2">             
                    <a href="#"
                        class="font-14 border-bottom pb-1 border-info">View All</a>
                </div>
                
            </div>
        </div>
    </div>
</div> -->






