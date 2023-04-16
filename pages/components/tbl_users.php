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

                                        <a href="panel.php?load_users=true&del=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-danger">Del</a>

                                  

                                        <a href="panel.php?view=<?php echo $student_data['user_id']; ?>" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                             
                            </table>
                        </div>
                    </div>
                </div>