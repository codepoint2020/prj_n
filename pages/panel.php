<!-- ============================================================== -->
<!-- IMPORT(S): Php scripts, Header-->
<!-- ============================================================== -->


<?php

 include "php/connection.php"; include "php/functions.php";
 
?>

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
    <div class="container-fluid ">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
       
        <!-- basic table -->
        
        <!-- order table -->

<!-- FIND WAYS TO DISPLAY SOMETHING WHEN PURELY PANEL.PHP IS LOADED -->
        
        <div class="row">
            
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['user_type'] == 'administrator' && isset($_GET['adm_home'])): ?>
                <?php 
                    include 'components/adm_home.php';
                ?>

                <!-- <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Panel Main Page</h1>
                            <?php //include 'components/under_construction.php'; ?>
                        </div>
                    </div>
                </div> -->
            <?php endif; ?>

            <?php if (isset($_GET['announcement_form'])):?>
                    <?php include 'components/annoucement_form.php'; ?>
            <?php endif; ?>

            <?php if (isset($_GET['all_announcements'])):?>
                    <?php include 'components/announcement_table.php'; ?>
            <?php endif; ?>

            
         

            <?php if (isset($_GET['manage_references']) && $_SESSION['user_type'] == 'administrator'): ?>
                <?php  add_book(); display_notification();  ?>
                <?php include 'components/manage_ref.php'?>
            <?php endif; ?>

            <?php if (isset($_GET['manage_all_ref']) && $_SESSION['user_type'] == 'administrator'): ?>
                <?php  add_book(); display_notification(); delete_book_confirm_box(); delete_book()?>
                <?php include 'components/manage_all_ref.php'?>
            <?php endif; ?>


            <?php if (isset($_GET['home']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 'no' ): ?>
                           
                <div class="col-12">
                    <!-- <h1>Users' Panel Main Page</h1> -->
                    <?php include 'components/welcome_student.php'; ?>
                </div>
               
            <?php endif; ?>

       
    


            <?php if (isset($_GET['categories']) && $_SESSION['user_type'] == 'administrator'): ?>
                <?php add_category(); display_notification(); delete_category_confirm_box(); delete_category(); editCategory(); ?>
                <?php include 'components/categories.php'?>
            <?php endif; ?>

            <!-- ============================================================== -->
            <!-- UNDER CONSTRUCTION START -->
            <!-- ============================================================== -->

            <?php 

                if (isset($_GET['underconstruction'])) {
                    include 'components/under_construction.php';
                }
            ?>

            <?php 

            if (isset($_GET['underconstruction'])) {
                include 'components/under_construction.php';
            }
            ?>
             <!-- ============================================================== -->
            <!-- UNDER CONSTRUCTION END -->
            <!-- ============================================================== -->

        
            

            <!-- =========================Load edit reference page========================== -->
            <?php if (isset($_GET['edit_ref']) && $_SESSION['user_type'] == 'administrator'): ?>
                
            <div class="col-12">
                <div class="card-body">
                <?php  ?>
                <?php include 'components/edit_reference.php'?>
                </div>
            </div>
            <?php endif; ?>
     
            
            <!-- ============================================================== -->
            <!-- CARDS START -->
            <!-- ============================================================== -->
            <?php if (isset($_GET['all_references']) || isset($_GET['card_view']) || isset($_GET['default_view'])): ?>
            <div class="col-12">
                <?php include 'components/cards.php'?>
            </div>
            <?php endif; ?>

            <!-- ============================================================== -->
            <!-- LIST VIEW START -->
            <!-- ============================================================== -->

     
            


      

             <!-- ============================================================== -->
            <!-- TABLE VIEW START -->
            <!-- ============================================================== -->
            <?php if (isset($_GET['table_view'])): ?>
         
                <?php include 'components/table_view.php'?>

            <?php endif; ?>

            <!-- =========================LOAD PROFILE========================== -->
            <?php if (isset($_GET['profile'])): ?>
            <div class="col-12">
                
                <?php include 'components/profile.php'?>

            </div>
            <?php endif; ?>

               <!-- =========================REFERENCE UPDATED PAGE========================== -->
               <?php if (isset($_GET['reference_updated'])): ?>
            <div class="col-12">
                
                <?php include 'components/file_update.php'?>

            </div>
            <?php endif; ?>

        
             <!-- =========================LOAD edit profile========================== -->
             <?php if (isset($_GET['update_profile'])): ?>
            <div class="col-12">
                <?php changePassword(); display_notification(); update_profile(); ?>
                <?php include 'components/update_profile.php'?>
              
               
            </div>
            <?php endif; ?>

            <?php if (isset($_GET['edit_user_info'])): ?>
            <div class="col-12">
                <?php passwordResetManual(); display_notification(); autoGeneratedPassword(); ?>
                <?php include 'components/view_user.php'?>
               
            </div>
            <?php endif; ?>

  
         


         


            <!-- =========================LOAD VIDEO PLAYER========================== -->
            <?php if (isset($_GET['load_video'])): ?>
            <div class="col-12">
                <div class="card-body">
                <?php include 'components/video_player_component.php'?>
                </div>
               
            </div>
            <?php endif; ?>

            <!-- =======================LOAD PDF VIEWER=============================== -->
            <?php if (isset($_GET['load_pdf'])): ?>
            <div class="col-12">
            
                <?php include 'components/pdf_reader_component.php'?>
               
            </div>
            <?php endif; ?>

             <!-- =======================LOAD PPTX VIEWER=============================== -->
             <?php if (isset($_GET['load_pptx']) && isset($_GET['file'])): ?>
            <div class="col-12">
            
                <?php 

                $pptx = $_GET['file'];
                $title = $_GET['title'];
                $id = $_GET['id'];
                
                //include 'pptx_viewer/powerpoint_viewer.php'

                redirect("pptx_player/pptx_viewer.php?powerpoint=".$pptx."&title=".$title."&id=".$id);
                
                
                ?>
               
            </div>
            <?php endif; ?>


             <!-- =======================LOAD VIDEO GALLERY=============================== -->
             <?php if (isset($_GET['load_gallery'])): ?>
            <div class="col-12">
            
                <?php include 'components/video_gallery.php'?>
               
            </div>
            <?php endif; ?>



            
            
            <!-- ============================================================== -->
            <!-- USERS' END START -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- USERS' TABLE START -->
            <!-- ============================================================== -->
            <?php if (isset($_GET['load_users']) && $_SESSION['user_type'] == 'administrator'): ?>
            <div class="col-12">
                <?php  
                add_user(); delete_user(); delete_user_confirm_box(); display_notification(); 
                deactivate_user_confirm_box(); deactivate_user();
                activate_user_confirm_box(); activate_user();
                ?>
                <?php include 'components/tbl_users.php'; ?>
                
            </div>
            <?php endif; ?>


            <?php if (isset($_GET['view']) && $_SESSION['user_type'] == 'administrator'): ?>
            <div class="col-12">
                <?php  
               
                ?>
                <?php include 'components/view_user.php'; ?>
                
            </div>
            <?php endif; ?>

            <?php if (isset($_GET['data_changes']) && $_SESSION['user_type'] == 'administrator'): ?>
            <div class="col-12">
          
                <?php include 'components/data_changes.php'; ?>
                
            </div>
            <?php endif; ?>

            <?php if (isset($_GET['study_list'])): ?>
            <div class="col-12">
          
                <?php include 'components/study_list.php'; ?>
                
            </div>
            <?php endif; ?>

            <?php if (isset($_GET['text_editor'])): ?>
            <div class="col-12">
          
                <?php include 'components/text_editor.php'; ?>
                
            </div>
            <?php endif; ?>


            



            <!-- ============================================================== -->
            <!-- USERS' TABLE END -->
            <!-- ============================================================== -->
        </div>

        <!-- ============================================================== -->
            <!-- IMPORTED COMPONENTS -->
        <!-- ============================================================== -->
        
       
      
        <?php 
        include 'components/modal_add_user.php';
      
       
        ?>
    
    
        
        
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



