 <!-- sample modal content -->




<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                

                <h4 class="card-title">Existing categories</h4>
            
                <h6 class="card-subtitle"></h6>
                <div class="table-responsive">
                    <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Register Date</th>
                                <th>Date Updated</th>
                            
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // <!-- ============================================================== -->
                            // <!-- FETCH USERS FROM DATABASE FOR panel.php datatable-->
                            // <!-- ============================================================== -->
                                $get_categories = $conn->query("SELECT * FROM tbl_categories") or 
                                die(jm_error('Get students query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                $num = 0;

                                while ($row = $get_categories->fetch_assoc()):
                                $num++;

                            ?>

                            <div>
                            <div  class="modal fade myModal<?php echo $row['category_id']; ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="panel.php?categories=true" method='POST'>
                                                <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Note: This will also update all the references that has been tagged by this category. The category of those references will also be updated to the most recent edit of category title.</h6>
                                                <input type="text" name="category_name" class="form-control shadow-1" value="<?php echo $row['name']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary" name="save_category_change">Save changes</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>

                            <tr>
                            
                            <td><?php echo $num; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <?php 
                                if (!empty($row["register_date"])) {
                                    echo date("F j, Y", intval($row['register_date'])); 
                                } else {
                                    echo '-';
                                }
                                
                                ?>
                            </td>
                            
                            <td><?php 

                                if (!empty($row["date_updated"])) {
                                    echo date("F j, Y", intval($row['date_updated'])); 
                                } else {
                                    echo '-';
                                }
                        
                            ?></td>
                        
                            <td>
                                <a href="panel.php?categories=true&edit=true&category_id=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target=".myModal<?php echo $row['category_id']; ?>" id="">Edit</a>

                                <a href="panel.php?categories=true&category_delete=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-danger">Del</a>

                            </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-1">
            <div class="card-body">
                <form action="panel.php?categories=true" method="POST">
                    <div class="mb-2">
                        
                        <label class="form-label" for="title">Add a new category</label>
                      
                       
                        <input type="text" id="title" name="cat_title" class="form-control mb-4  
                    
                        " placeholder="Enter category name" required>
                        
                    </div>
                
                    <div class="mb-4">
                            <button class="btn btn-lg btn-primary" name="btn_add_category">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>