<!-- ============================================================== -->
<!-- IMPORT(S): Php scripts, Header-->
<!-- ============================================================== -->
<?php 

include "php/connection.php";
include "components/head.php";
include "php/common_variables.php";
include "php/functions.php";
include "php/objects.php";

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

        <?php add_record(); display_notification();?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users' Table</h4>
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
                                        <th>User Type</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Expiry Date</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // <!-- ============================================================== -->
                                    // <!-- FETCH USERS FROM DATABASE FOR users.php datatable-->
                                    // <!-- ============================================================== -->
                                        // $get_students = $conn->query("SELECT * FROM tbl_students");
                                        // $num = 0;
                                        $get_students = $conn->prepare("SELECT student_id, first_name, last_name, email, profile_pic FROM tbl_students") or die("Failed to fetch students".$conn->error.__LINE__);

                                        $get_students->execute();
                                        $get_students->bind_result($id, $first_name, $last_name, $email, $profile_pic);
                                        $num = 0;

                                        while ($get_students->fetch()):
                                        $num++;
                                    ?>
                                    <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo "student"; ?></td>
                                    <td>
                                        <?php echo $first_name . " " . $last_name; ?>
                                    </td>
                                    
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo "active"; ?></td>
                                    <td><?php echo "10-10-10"; ?></td>
                                    <td>
                                        <a href="users.php?edit=<?php echo $id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="users.php?del=<?php echo $id; ?>" class="btn btn-sm btn-danger">Del</a>
                                        <a href="users.php?view=<?php echo $id; ?>" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                             
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php include 'components/modal_add_user.php'; ?>
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