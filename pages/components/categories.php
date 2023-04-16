<?php
// add_book(); display_notification();
// if(!isset($_SESSION['error_array'])) {
//     $_SESSION['array_array'] = "";
// } else {
//     $retreived_error_array = $_SESSION['error_array'];
// };
// unset($_SESSION['error_array']);


?>
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Category</h4>
            <form action="panel.php?categories=true" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="title">Category Name</label>
                            <!-- <h6 class="card-subtitle"><code>Required</code></h6> -->
                            <input type="text" id="title" name="title" class="form-control mb-4  
                            <?php 
                                if (in_array("empty_title", $retreived_error_array)) {
                                    echo "is-invalid";
                                }
                            ?>
                            " placeholder="Enter category name">
                            
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="details">Description</label>
                            <div class="form-group">
                                <textarea id="details" name="details" class="form-control mb-4 
                                  
                            <?php 
                                if (in_array("empty_details", $retreived_error_array)) {
                                    echo "is-invalid";
                                }
                            ?>
                                " rows="3" placeholder="Text Here...(optional)"></textarea>
                            </div>
                        </div>
                        <div class="mb-2">
                                <button class="btn btn-lg btn-primary">Submit</button>
                        </div>


                    </div>
                    <div class="col-md-6">

                    <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                            <!-- <h6 class="card-subtitle"><code>Required</code></h6> -->
                            <div class="table-responsive">
                            <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // <!-- ============================================================== -->
                                    // <!-- FETCH USERS FROM DATABASE FOR panel.php datatable-->
                                    // <!-- ============================================================== -->
                                        $get_categories = $conn->query("SELECT * FROM tbl_categories") or 
                                        die(jm_error('Get categories query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                        $num = 0;

                                        while ($row = $get_categories->fetch_assoc()):
                                        $num++;
    
                                    ?>
                                    <tr>
                                   
                                    <td><?php echo $num; ?></td>
                                   <td> <?php echo ucwords($row['name']); ?></td>
                                       
                               
                                    
                            
                                    <td>
                                       

                                        <a href="panel.php?category_delete&id=<?php echo $studrowent_data['user_id']; ?>" class="btn btn-sm btn-danger">Del</a>

                                        <a href="panel.php?category_edit&id=<?php echo $studrowent_data['user_id']; ?>" class="btn btn-sm btn-info">Edit</a>

                                       
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                             
                            </table>
                         
                            
                        </div>

                        

                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<script>



</script>