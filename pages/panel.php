<!-- ============================================================== -->
<!-- IMPORT(S): Php scripts, Header-->
<!-- ============================================================== -->

<?php include "php/connection.php"; include "php/functions.php"; ?>

<?php if ($_SESSION['is_in'] == 'true'): ?>

<?php 
    include "php/common_variables.php";
    
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
                <?php add_user(); delete_user(); display_notification(); ?>
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
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // <!-- ============================================================== -->
                                    // <!-- FETCH USERS FROM DATABASE FOR panel.php datatable-->
                                    // <!-- ============================================================== -->
                                        $get_students = $conn->query("SELECT * FROM tbl_users") or 
                                        die(jm_error('Get students query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                        $num = 0;
                                        
                                        while ($student_data = $get_students->fetch_assoc()):
                                        $num++;
                                    ?>
                                    <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $student_data['user_type']; ?></td>
                                    <td>
                                        <?php echo ucwords($student_data['first_name'] . " " . $student_data['last_name']); ?>
                                    </td>
                                    
                                    <td><?php echo $student_data['email']; ?></td>
                                    <td><?php 
                                        if($student_data['is_active'] == "no") {
                                            echo "Deactivated";
                                        } elseif ($student_data['is_disabled'] == "yes") {
                                            echo "Disabled";
                                        } else {
                                            echo "Active until " . date('F j, Y', strtotime($student_data["active_until"]));
                                        }
                                    ?>
                                    </td>
                                    <td>
                                        <a href="panel.php?edit=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="panel.php?del=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-danger">Del</a>
                                        <a href="panel.php?view=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-primary">View</a>
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
    <!-- <footer class="footer text-center text-muted">
        All Rights Reserved by Freedash. Designed and Developed by <a
            href="https://adminmart.com/">Adminmart</a>.
    </footer> -->
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
<?php 
include "components/foot.php";
?>

<?php else: ?>
<?php redirect('authentication.php'); ?>
<?php endif; ?>

