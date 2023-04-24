<div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users' Table</h4>
                        <div class="row">
                            <div class="col-md-2 mb-4">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#bs-example-modal-lg">Add User</button>
                                
                            </div>
                            <div class="col-md-10">
                            <span class="mx-4">
                                    <!-- Note: Operations Includes: 
                                    Diactivate <i class="fas fa-ban"></i>,
                                    Edit <i class="fas fa-edit"></i>,
                                    Delete <i class="fas fa-window-close"></i>, and
                                    View <i class="fas fa-eye"></i> -->
                                </span>
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

                                        $current_date = date('Y-m-d');
                                        

                                        while ($student_data = $get_students->fetch_assoc()):
                                        $expiration_date = $student_data["active_until"];
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
                                            echo "Account disabled";
                                        } elseif ($current_date >= $expiration_date) {
                                            echo "Expired last " . date('F j, Y', strtotime($student_data["active_until"])); 
                                            
                                        } else {
                                            echo "Active until " . date('F j, Y', strtotime($student_data["active_until"]));
                                        }
                                    ?>
                                     
                                    </td>
                                    <td>
                                        <?php if ($student_data['is_active'] == "no" || $student_data['is_disabled'] == "yes" || $current_date >= $expiration_date): ?>

                                            <a href="panel.php?load_users=true&activate=<?php echo $student_data['user_id']?>" class="btn btn-info btn-sm jm-activate" data-bs-toggle="tooltip" title="Activate the account for this user: <?php echo ucwords($student_data['first_name'] . " " . $student_data['last_name']) ?>">
                                            <i class="fas fa-check-square"></i>
                                            </a>

                                          
                                           
                                            
                                        <?php else: ?>
                                            <a href="panel.php?load_users=true&deactivate=<?php echo $student_data['user_id']?>" class="btn btn-info btn-sm jm-deactivate" data-bs-toggle="tooltip" title="Deactivate this account of: <?php echo ucwords($student_data['first_name'] . " " . $student_data['last_name']) ?>">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        <?php endif; ?>

                                        <a href="panel.php?edit=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit user's information">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                        <a href="panel.php?load_users=true&del=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="PERMANENTLY Delete this account of: <?php echo ucwords($student_data['first_name'] . " " . $student_data['last_name']) ?>">
                                        <i class="fas fa-window-close"></i>
                                    </a>

                                  

                                        <a href="panel.php?view=<?php echo $student_data['user_id']; ?>&underconstruction=true" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="View details for this user"><i class="fas fa-eye"></i></a>
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                             
                            </table>
                        </div>
                    </div>
                </div>


