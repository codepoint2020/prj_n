

<?php

if (isset($_GET['deleted_item']) && isset($_GET['save_id'])) {
    $save_id = html_ent($_GET['save_id']);
    $query_saved_item = $conn->query("DELETE FROM tbl_save WHERE save_id = $save_id; ") or die("Failed query on saved item ".$conn->error.__LINE__);

    if ($query_saved_item) {
        $_SESSION['prevent_reload'] = 'set';
        redirect("panel.php?study_list=true&delete_confirmed=true");
    }
}

if (isset($_GET['delete_confirmed']) && isset($_SESSION['prevent_reload'])) {
    set_alert_success("Success! you have deleted an item from your study list");
    unset($_SESSION['prevent_reload']);

}
display_notification();
?>
<div class="card">
                            <div class="card-body">
                          
                              
                                <div class="table-responsive">
                                    <table class="table table-wrap">
                                        <thead class="bg-success text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Date Added</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border border-success">
                                                <?php
                                                    $user_id = $_SESSION['user_id'];

                                                    $query_saves = $conn->query("SELECT tbl_books.*, tbl_save.*
                                                    FROM tbl_books
                                                    JOIN tbl_save ON tbl_books.book_id = tbl_save.book_id
                                                    WHERE tbl_save.user_id = $user_id;
                                                    ") or die($conn->error.__LINE__);

                                                    $num = 0;

                                                    while($row = $query_saves->fetch_assoc()):
                                                        $num++;
                                                        $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                                                        $cover_img_default = "../assets/images/default_cover2.png";
                                                        $cover_img = $row['cover_img'];
                                                  
                                                        
                                                        $cover_img_pdf = "../assets/references/pdf/" . $cover_img;
                                                        $cover_img_pptx = "./pptx_player/file/" . $cover_img;
                                                        $cover_img_vids = "../assets/references/videos/" . $cover_img;
                                                    

                                                    ?>
                                                <tr>
                                                    <td><?php echo $num; ?></td>
                                                    <td>
                                                    <a <?php 
        
                                                        if ($file_format == "pptx") {
                                                        echo 'target="_blank"';
                                                        }
                                                        
                                                        ?>href="<?php 
                                                        
                                                    
                                                                    $file_format = pathinfo($row['file_name'], PATHINFO_EXTENSION);

                                                                    if ($file_format == "pdf") {

                                                                    if (file_exists($cover_img_pdf)) {
                                                                        $cover_img = $cover_img_pdf;
                                                                    } else {
                                                                        $cover_img = $cover_img_default;
                                                                    }

                                                            

                                                                    echo 'panel.php?load_pdf=true&';
                                                                    
                                                                    } elseif ($file_format == "mp4") {
                                                                    if (file_exists($cover_img_vids)) {
                                                                        $cover_img = $cover_img_vids;
                                                                    } else {
                                                                        $cover_img = $cover_img_default;
                                                                    }


                                                                    echo 'panel.php?load_video=true&';
                                                                    
                                                                    } elseif ($file_format == "pptx") {

                                                                    if (file_exists($cover_img_pptx)) {
                                                                        $cover_img = $cover_img_pptx;
                                                                    } else {
                                                                        $cover_img = $cover_img_default;
                                                                    }

                                                                    echo 'panel.php?load_pptx=true&';

                                                                    } elseif ($file_format == "docx") {
                                                                    echo '#';
                                                                    } else {
                                                                    NULL;
                                                                    }
                  
        
        
                                                        ?>id=<?php echo $row['book_id']?>&file=<?php echo $row['file_name']; ?>&title=<?php echo $row['title']; ?>">
                                                        <?php echo ucwords(short_desc($row['title'])); ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo short_desc($row['details']); ?></td>
                                                    <td><?php echo date("F j, Y, g:i a", ($row['log_date'])); ?></td>
                                                    <td>
                                                        <a href="panel.php?study_list=true&deleted_item=true&save_id=<?php echo $row['save_id']; ?>"data-bs-toggle="tooltip" title="Remove from the list"><i class="fas fa-window-close jm-fas"></i></a>
                                                    </td>
                                                </tr>
                                                    <?php endwhile; ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

