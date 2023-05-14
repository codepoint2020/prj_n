<?php

delete_announcement_confirm_box();
delete_announcement();
display_notification();

?>

<style>
    .fa-window-close {
        color: #ED2B2A;
        font-size: 1.4rem;
        
    }
</style>

<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All announcements</h4>
                          
                                <div class="table-responsive">
                                    <table id="multi_col_order"
                                        class="table border table-striped table-bordered text-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Posted by</th>
                                                <th>Date Posted</th>
                                                <?php if($_SESSION['user_type'] == "administrator"):?>
                                                <th>Operations</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody class="border border-primary">

                                        <?php

                                            $query_announcement = $conn->query("SELECT a.*, u.*
                                            FROM tbl_announcement AS a
                                            INNER JOIN tbl_users AS u ON a.user_id = u.user_id
                                            ORDER BY a.announcement_id DESC");

                                            $num = 0;

                                            while($row = $query_announcement->fetch_assoc()):
                                                $num++;

                                        ?>
                                            <tr>
                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['content']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo date("M j, Y, g:i a", ($row['date_posted'])); ?></td>
                                                <?php if($_SESSION['user_type'] == "administrator"):?>
                                            <td>
                                                <a href="panel.php?all_announcements&delete_announcement=true&announcement_id=<?php echo $row['announcement_id']; ?>" data-bs-toggle="tooltip" title="Delete announcement permanently"><i class="fas fa-window-close"></i></a>
                                            </td>

                                        <?php endif; ?>
                                            </tr>
                                        <?php endwhile; ?>

                                       
                                          
                                      
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>