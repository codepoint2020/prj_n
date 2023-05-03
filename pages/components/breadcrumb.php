
<div class="page-breadcrumb">
<div class="row">
<div class="col-7 align-self-center">


<?php if (isset($_GET['home']) && $_GET['home'] == 'true' ): ?>
    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning <?php echo isset($_SESSION['system_user_fname']) ? ucwords($_SESSION['system_user_fname']) : ""; ?>!</h3>
    <?php echo isset($_SESSION['user_type']) ? ucwords($_SESSION['user_type']) : ""; ?>

<?php else: ?>

            
    
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                <?php 

                $panel_title = "";
                
                if (isset($_GET['manage_references']) && $_GET['manage_references'] =='true') {
                    echo $panel_title =  "Add New Reference";
                }

                if (isset($_GET['load_users']) && $_GET['load_users'] =='true') {
                    echo  $panel_title = "List of Users";
                }

                if (isset($_GET['all_references']) || isset($_GET['list_view']) || isset($_GET['table_view'])) {
                    echo  $panel_title = "All references";
                }

                if (isset($_GET['categories']) && $_GET['categories'] =='true') {
                    echo  $panel_title = "Categories";
                }

                if (isset($_GET['adm_home']) && $_GET['adm_home'] =='true') {
                    echo  $panel_title = "Data Monitoring";
                }

                if (isset($_GET['manage_all_ref']) && $_GET['manage_all_ref'] =='true') {
                    echo  $panel_title = "References Table";
                }

                if (isset($_GET['load_pdf']) && isset($_GET['title'])) {
                    echo  $panel_title = html_ent(ucwords($_GET['title']));
                }

                if (isset($_GET['load_video']) && isset($_GET['title'])) {
                    echo  $panel_title = html_ent(ucwords($_GET['title']));
                }

                if (isset($_GET['profile'])) {
                    echo  $panel_title = "Profile";
                }
                if (isset($_GET['update_profile'])) {
                    echo  $panel_title = "Profile Settings";
                }

                if (isset($_GET['load_gallery'])) {
                    echo  $panel_title = "LibraryTube";
                }


                if (isset($_GET['edit_ref'])) {
                    echo  $panel_title = "Edit Reference";
                }

                if (isset($_GET['changed_main_file']) || isset($_GET['cover_image_changed'])) {
                    echo  $panel_title = "Update confirmation";
                }
                
                

                
                    
          
                ?>
               
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php 
                        if ($_SESSION['is_admin'] === 'yes') {
                            echo "panel.php?adm_home=true";
                        } else {
                            echo "panel.php?home=true";
                        }
                        
                        ?>" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page"><?php  echo $panel_title; ?></li>
                    </ol>
                </nav>
            </div>
  

<?php endif; ?>

</div>
</div>
</div>