<?php 
    include "php/connection.php";
    include "php/common_variables.php";
    include "php/functions.php";
    include "php/objects.php";

    include "components/head.php";
?>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?php include "components/topheader.php"; ?>
     
        <?php include "components/leftSideBar.php" ?>
      
        <div class="page-wrapper">
 
            <?php include "components/breadcrump.php"; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Default Ordering</h4>
                                <h6 class="card-subtitle">With DataTables you can alter the ordering characteristics of
                                    the table at initialisation time. Using the<code> order | option</code> order
                                    initialisation parameter, you can set the table to display the data in exactly the
                                    order that you want.</h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Instructor</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Profile Pic</th>
                                                <th>Registered date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                
                                                $get_students = $conn->query("SELECT * FROM tbl_students");
                                                $num = 0;
                                                while ($row = $get_students->fetch_assoc()):
                                                $num++;
                                            ?>
                                           <tr>
                                               <td><?php echo $num; ?></td>
                                               <td><?php echo $row['first_name'] . " " .$row['last_name'];?></td>
                                               <td>J</td>
                                               <td>J</td>
                                               <td><?php echo $row['email']; ?></td>
                                               <td><?php echo "nothing yet"; ?></td>
                                               <?php echo $row['profile_pic']; ?>
                                               <td>J</td>
                                               <td>J</td>
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
          
            <footer class="footer text-center text-muted">
                All Rights Reserved by Freedash. Designed and Developed by <a
                    href="https://adminmart.com/">Adminmart</a>.
            </footer>
    
        </div>
    </div>
    <?php include "components/foot.php" ?>