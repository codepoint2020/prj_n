
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

                if (isset($_GET['all_references']) && $_GET['all_references'] =='true') {
                    echo  $panel_title = "All references";
                }

                if (isset($_GET['categories']) && $_GET['categories'] =='true') {
                    echo  $panel_title = "Categories";
                }

                if (isset($_GET['adm_home']) && $_GET['adm_home'] =='true') {
                    echo  $panel_title = "Admin Panel";
                }
                    
          
                ?>
               
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page"><?php  echo $panel_title; ?></li>
                    </ol>
                </nav>
            </div>
  

<?php endif; ?>

</div>
</div>
</div>