<div class="card">
    <div class="card-body">
        <form action="panel.php?categories=true" method="POST">
            <div class="mb-2">
                <label class="form-label" for="title">Category Name</label>
                <!-- <h6 class="card-subtitle"><code>Required</code></h6> -->
                <input type="text" id="title" name="cat_title" class="form-control mb-4  
            
                " placeholder="Enter category name" required>
                
            </div>
        
            <div class="mb-4">
                    <button class="btn btn-lg btn-primary" name="btn_add_category">Submit</button>
            </div>
        </form>

        <h4 class="card-title mt-4">Users' Table</h4>
       
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
                    <tr>
                    
                    <td><?php echo $num; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <?php echo ucwords($row['register_date']); ?>
                    </td>
                    
                    <td><?php echo $row['register_date']; ?></td>
                   
                    <td>
                        <a href="panel.php?categories=true&category_edit=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-info">Edit</a>

                        <a href="panel.php?categories=true&category_delete=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-danger">Del</a>

                    </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                
            </table>
        </div>
    </div>
</div>