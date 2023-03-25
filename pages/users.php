<!-- ============================================================== -->
<!-- IMPORT(S): Php scripts, Header-->
<!-- ============================================================== -->
<?php 
include "php/connection.php";
include "php/common_variables.php";
include "php/functions.php";
include "php/objects.php";

include "components/head.php";
?>


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<?php include "components/topheader.php"; ?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php include "components/leftSideBar.php" ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <?php include "components/breadcrumb.php"; ?>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        
        <!-- order table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Users</h4>
                        <div class="row ">
                            <div class="col-md-2">
                            <select class="custom-select custom-select-set form-control" name="cars" id="cars">
                                <option value="volvo">All</option>
                                <option value="saab">Students</option>
                                <option value="mercedes">NSSTC Personnal</option>
                                <option value="audi">External Users</option>
                            </select>
                            
                            </div>
                            <div class="col-md-2">
                                <!-- Large modal -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#bs-example-modal-lg">Add User</button>
                            
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive">
                            <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Pic</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Instructor</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Registered date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // <!-- ============================================================== -->
                                    // <!-- FETCH USERS FROM DATABASE FOR users.php datatable-->
                                    // <!-- ============================================================== -->
                                        // $get_students = $conn->query("SELECT * FROM tbl_students");
                                        // $num = 0;
                                        $get_students = $conn->prepare("SELECT first_name, last_name, email, profile_pic FROM tbl_students") or die("Failed to fetch students".$conn->error.__LINE__);

                                        $get_students->execute();
                                        $get_students->bind_result($first_name, $last_name, $email, $profile_pic);
                                        $num = 0;

                                        while ($get_students->fetch()):
                                        $num++;
                                    ?>
                                    <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><img src="<?php echo $profile_pic; ?>" alt="Profile picture"></td>
                                    <td><?php echo $first_name . " " . $last_name; ?></td>
                                    <td>J</td>
                                    <td>J</td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo "nothing yet"; ?></td>
                                    <td>J</td>
                                    <td>J</td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--  Modal content for the above example -->
            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">User Registration Form</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- ==================================================== -->
                                        <!-- Modal Body Start -->
                                        <!-- ==================================================== -->
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Name:</h4>
                                                        <h6 class="card-subtitle"><code>Required</code></h6>
                                                        
                                                            <div class="form-group">
                                                                <input type="text" class="form-control mb-2" name="first_name" placeholder="First name">
                                                                <input type="text" class="form-control mb-2" name="middle_name" placeholder="Middle name">
                                                                <input type="text" class="form-control mb-2" name="last_name" placeholder="Last name">
                                                            </div>

                                                        <h4 class="card-title mt-3">User Type:</h4>
                                                        <h6 class="card-subtitle"><code>Required</code></h6>
                                                        
                                                            <div class="form-group mb-4">
                                                                <label class="mr-sm-2" for="userType" name="user_type">Select</label>
                                                                <select class="form-select mr-sm-2" id="userType">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="student">Student</option>
                                                                    <option value="external">External users</option>
                                                                    <option value="personnel">NSSTC Personnel</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Email:</h4>
                                                            <h6 class="card-subtitle"><code>Required</code></h6>
                                                            <div class="form-group">
                                                                <input type="email" class="form-control mb-2" name="email" placeholder="Email address">
                                                                <h6 class="card-title">Account/User name:<br /><code>Auto-generated</code></h6>
                                                                <input type="username" value="<?php echo "jemor_231234" ?>" class="form-control mb-2" name="text" >
                                                              
                                                                

                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title">Password:</h4>
                                                            <h6 class="card-subtitle"><code>Auto-generated</code></h6>
                                                           
                                                                
                                                                <div class="input-group">
                                                                    <input id="gen_password" type="password" class="form-control" value="12345"
                                                                        aria-label="Input group example" aria-describedby="passwordEye">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text h-100" id="passwordEye"><i class="fas fa-eye-slash"></i></div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- ==================================================== -->
                                        <!-- Modal Body Start -->
                                        <!-- ==================================================== -->
                                        
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
        </div>
    
        
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center text-muted">
        All Rights Reserved by Freedash. Designed and Developed by <a
            href="https://adminmart.com/">Adminmart</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include "components/foot.php" ?>