

<div class="row">
    <div class="col-md-8 shadow-1 pt-4">
        <div class="row">
            <div class="col-md-12">
    
                <a href="panel.php?adm_home=true" class="btn btn-info mb-4">Bar Graph</a>
                <a href="panel.php?adm_home=true?&pie_chart=true" class="btn btn-info mb-4">Pie Chart</a>
                <div class="card border-end">
                    <!-- BARGRAPH START -->
                    <div class="card-body">
                        <?php if (!isset($_GET['pie_chart'])): ?>
                            <canvas id="myChart" style="width:100%;" class="mt-4"></canvas>
                            <?php else: ?>
                        <canvas id="myPie" style="width: 100%; height: 500px" class="mt-4"></canvas>
                        <?php endif; ?>
        

                        <script>

                    
                            // var xValues = [ "test1", "test2", "test3"];
                            var xValues = [<?php
                                    $all_cat_query = $conn->query("SELECT * FROM tbl_categories ORDER BY category_id ASC; ");
                                    $total_category = $all_cat_query->num_rows;

                                    $query_books = $conn->query("SELECT * FROM tbl_books");
                                    $total_books= $query_books->num_rows;

                                    while ($row = $all_cat_query->fetch_assoc()) {
                                        echo "'" . very_short_title($row['name']) . "',";
                                    }

                                
                                ?>]
                            var xValues2 = [<?php
                                    $all_cat_query = $conn->query("SELECT * FROM tbl_categories ORDER BY category_id ASC; ");
                                    $total_category = $all_cat_query->num_rows;

                                    $query_books = $conn->query("SELECT * FROM tbl_books");
                                    $total_books= $query_books->num_rows;

                                    while ($row = $all_cat_query->fetch_assoc()) {
                                        echo "'" . very_short_title($row['name']) . "',";
                                    }

                                
                                ?>    
                            ];
                            
                        

                            // var yValues = [5,4,3];
                            var yValues = [

                                <?php
                            $books_by_category = $conn->query("SELECT tbl_categories.name AS category, COUNT(tbl_books.book_id) AS num_books
                            FROM tbl_categories
                            LEFT JOIN tbl_books ON tbl_categories.category_id = tbl_books.category_id
                            GROUP BY tbl_categories.category_id ORDER BY tbl_categories.category_id ASC
                            ");

                            //highest number of books in a category
                            $highest_category_query = $conn->query("SELECT tbl_categories.name AS category, COUNT(tbl_books.book_id) AS num_books
                            FROM tbl_categories
                            LEFT JOIN tbl_books ON tbl_categories.category_id = tbl_books.category_id
                            GROUP BY tbl_categories.category_id
                            ORDER BY num_books DESC
                            LIMIT 1
                        ");

                            if ($highest_category_query->num_rows > 0) {
                                
                                $num_books_highest = $row['num_books'];

                            
                            } 
                            
                        
                            while ($books_category_record = $books_by_category->fetch_assoc()) {
                                echo $books_category_record['num_books'] . ", ";

                            } 
                            echo 0;
                            ?>

                            ];
                            
                            
                        
                            // var barColors = ["red","blue", "yellow"];
                            var barColors = ["#19A7CE", "#03C988", "#088395", "#FFD56F"]; //[
                                <?php
                                    // $colorArray = ["#FF6D60", "#03C988","#088395","#FFD56F","#FF7B54","#13005A","#86C8BC","#FFBF00", "#009EFF", "#EB6440","#E97777","#8D72E1","#9ED5C5","#54B435","#3C4048"];
                                    
                                    // for ($i = 0; $i < $total_books; $i++) {
                                    //     shuffle($colorArray);
                                    //     $randomColors = array_slice($colorArray, 0, $total_category);
                                    //     foreach($randomColors as $color) {
                                    //         echo "'" . $color . "',";
                                    //     }
                                    // }
                                    
                                ?>
                                //];

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
                                legend: {
                                    display: false, // Display the legend
                                    labels: {
                                        // Modify legend labels here
                                    
                                        fontSize: 12, // Set the font size for the legend labels
                                    
                                    }
                                },

                                title: {
                                    display: true,
                                    fontSize: 18,
                                    text: "Comparison on available references per category"
                                }
                            }
                        
                            });

                        </script>
                    </div>
                    <!-- BARGRAPH END -->
                        <script>
                            const ctx = document.getElementById('myPie');

                        let pieXValues = [<?php
                            $all_cat_query = $conn->query("SELECT * FROM tbl_categories ORDER BY category_id ASC; ");
                            $total_category = $all_cat_query->num_rows;

                            $query_books = $conn->query("SELECT * FROM tbl_books");
                            $total_books= $query_books->num_rows;

                            while ($row = $all_cat_query->fetch_assoc()) {
                                echo "'" . very_short_title($row['name']) . "',";
                            }

                        
                        ?>]
                
                            var pieYValues = [

                            <?php
                            $books_by_category = $conn->query("SELECT tbl_categories.name AS category, COUNT(tbl_books.book_id) AS num_books
                            FROM tbl_categories
                            LEFT JOIN tbl_books ON tbl_categories.category_id = tbl_books.category_id
                            GROUP BY tbl_categories.category_id ORDER BY tbl_categories.category_id ASC
                            ");

                            //highest number of books in a category
                            $highest_category_query = $conn->query("SELECT tbl_categories.name AS category, COUNT(tbl_books.book_id) AS num_books
                            FROM tbl_categories
                            LEFT JOIN tbl_books ON tbl_categories.category_id = tbl_books.category_id
                            GROUP BY tbl_categories.category_id
                            ORDER BY num_books DESC
                            LIMIT 1
                            ");

                            if ($highest_category_query->num_rows > 0) {

                            $num_books_highest = $row['num_books'];


                            } 


                            while ($books_category_record = $books_by_category->fetch_assoc()) {
                            echo $books_category_record['num_books'] . ", ";

                            } 
                            echo 0;
                            ?>

                            ];
                
                
    


                            new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: pieXValues,
                                datasets: [{
                                label: '# of Votes',
                                data: pieYValues,
                                backgroundColor: ["#19A7CE", "#03C988", "#088395", "#FFD56F"]
                                }],
                                hoverOffset: 4
                            },

                            options: {
                                    legend: {
                                        display: true, // Display the legend
                                        labels: {
                                            // Modify legend labels here
                                        
                                            fontSize: 18, // Set the font size for the legend labels
                                        
                                        }
                                    },

                                    title: {
                                        display: true,
                                        text: "Comparison on the number of references per category",
                                        fontSize: 18
                                    }
                                }
                            
                            });

                        </script>
                </div>
            </div>

            <div class="row">   
                <div class="col-md-6">              
                    <div class="col-md-12">
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
                    <div class="col-md-12">
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

                    <div class="col-md-12">
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

                    <div class="col-md-12">
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

                    <div class="col-md-12">
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
                </div>
                

                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Top 5 Most Viewed References</h4>
                                <!-- <h6 class="card-subtitle">To use add class <code>.bg-info .text-whit</code> in the -->
                        
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-secondary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Title of Reference</th>
                                                <th># of Views</th>
                                        
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $query_top_3 = $conn->query("SELECT b.book_id, b.title, b.details, b.file_name, b.file_type,  COUNT(v.view_id) AS view_count
                                                    FROM tbl_books AS b
                                                    JOIN tbl_views AS v ON b.book_id = v.book_id
                                                    GROUP BY b.book_id
                                                    ORDER BY view_count DESC
                                                    LIMIT 5;
                                                    ");

                                                    $num = 0;

                                                    while($row = $query_top_3->fetch_assoc()):
                                                        $num++;
                                                        $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);
                                                    

                                                        ?>
                                                
                                    
                                            
                                            
                                    
                                    

                                    
                                            <tr>
                                                <td><?php echo $num; ?></td>
                                                <td><a 
                                                    <?php 
                                                    
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
                                                    <?php echo short_desc(ucwords($row['title'])); ?></a></td>
                                                    <td><?php echo $row['view_count']; ?></td>
                                            
                                                    </tr>
                                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                             
                    </div>
                </div>       
            </div>
        </div>
    </div>

    <div class="col-md-4">

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mt-4 mx-2">Announcements</h4>
                        <div class="mt-4 activity">

                                <?php
                                    $query_announcement = $conn->query("SELECT a.*, u.*
                                    FROM tbl_announcement AS a
                                    INNER JOIN tbl_users AS u ON a.user_id = u.user_id
                                    ORDER BY a.announcement_id DESC
                                    LIMIT 3");

                                    while($data = $query_announcement->fetch_assoc()):
                                ?>
                        
                                <div class="ms-3 p-2 rounded mx-2 mb-4" style="border: 1px solid #9BA4B5;">
                                    <h5 class="text-dark font-weight-medium mb-2"><?php echo $data['title']; ?></h5>
                                    <p class="font-14 mb-2"><?php echo short_desc($data['content']); ?><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#centermodal<?php echo $data['announcement_id']; ?>"> Read more...</a>
                                    </p>
                                    <span class="font-weight-light font-14 text-muted">By: <?php echo $data['username'];?></span>
                                    <div> <span class="font-weight-light font-14 text-muted">Date: <?php echo date("M j, Y, g:i a D",$data['date_posted']); ?></span></div>
                                    
                                </div>

                                 <!-- modal -->

                            <!-- Center modal content -->
                            <div class="modal fade" id="centermodal<?php echo $data['announcement_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title m-dark" id="myCenterModalLabel">Announcement</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body jm-dark">
                                            <h5><?php echo strtoupper($data['title']); ?></h5>
                                            <p><?php echo $data['content']; ?></p>
                                            
                                            <span>Posted by: <?php echo $data['username'];?> &nbsp; <img src="../assets/images/users/<?php echo $data['profile_pic']; ?>" alt="profile picture" class="jm-circular" width="40"></span>
                                            <div>
                                            <span class="font-weight-light font-14 text-muted">Date: <?php echo date("M j, Y, g:i a D",$data['date_posted']); ?></span>
                                            </div>
                                            
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- modal -->

                                <?php endwhile; ?>


                       

                            <a href="panel.php?all_announcements">View All</a>

                           

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    
                        <h4 class="card-title mx-2 mt-4">Database Changes</h4>
                    
                        <div class="mt-4 activity">

                                        <?php
                                        $item_limit = 4;

                                        //set limit per page
                                        $query_logs = $conn->query("SELECT activity_logs.*, tbl_users.*
                                        FROM activity_logs
                                        INNER JOIN tbl_users ON activity_logs.user_id = tbl_users.user_id ORDER BY activity_logs.id DESC LIMIT $item_limit;
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
                                    <h5 class="font-18 mb-2" style="color: black;"><?php echo very_short_desc(ucwords($log['activity']) . ": " . strtolower($log['affected']) . ", " . ucwords($log['item'])); ?></h5>
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
                            <div class="ms-3 mt-2">             
                                <a href="panel.php?data_changes=true"
                                    class="font-14 border-bottom pb-1 border-info">View All</a>
                            </div>
                        </div>
                    </div>
                </div>                                 
            </div>
            
        </div>
    </div>

    

   
   







    
  