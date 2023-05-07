<div class="card shadow-2">
                            <div class="card-body ">
                                <h4 class="card-title"> <a href="panel.php?all_references=true" class="btn btn-dark btn-sm">Back to default view</a>  </h4>
                                <h6 class="card-subtitle">Type any keywords like possible title, description, category, author, file type, date posted etc.</h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table border table-striped table-bordered text-wrap table-info"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type of Change</th>
                                                <th>Affected Data</th>
                                                <th>Affected Item</th>
                                                <th>Log Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php

                                        
                                                    $all_logs_query = $conn->query("SELECT activity_logs.*, tbl_users.*
                                                    FROM activity_logs
                                                    JOIN tbl_users ON activity_logs.user_id = tbl_users.user_id;
                                                    ");
                                           
                                                    while ($row = $all_logs_query->fetch_assoc()):
                                               
                                        ?>
                                            <tr>
                                           
                                                <td><?php echo $row['first_name'] . " " .$row["last_name"]; ?></td>
                                                <td><?php echo $row['activity']; ?></td>
                                                <td><?php echo $row['affected']; ?></td>
                                                <td><?php echo $row['item']; ?></td>
                                                <td><?php echo $row['register_date']; ?></td>
                                           
                                            </tr>

                                            <?php endwhile; ?>
                                   
                                         
                                        
                                        
                                        </tbody>
                                 
                                    </table>
                                </div>
                            </div>
                        </div>