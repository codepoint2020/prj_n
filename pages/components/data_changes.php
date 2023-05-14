<div class="card shadow-2">
                            <div class="card-body ">
                                
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table border table-striped table-bordered text-wrap table-info"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type of Change</th>
                                                <th >Affected Data</th>
                                                <th style="max-width: 180px">Affected Item</th>
                                                <th>Log Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php

                                                $all_logs_query = $conn->query("SELECT activity_logs.*, tbl_users.*
                                                FROM activity_logs
                                                INNER JOIN tbl_users ON activity_logs.user_id = tbl_users.user_id;
                                                ") or die("Failed to get all activity logs ".$conn->error.__LINE__);

                                        
                                                    // $all_logs_query = $conn->query("SELECT activity_logs.*, tbl_users.*
                                                    // FROM activity_logs
                                                    // JOIN tbl_users ON activity_logs.user_id = tbl_users.user_id;
                                                    // ");
                                           
                                                    while ($row = $all_logs_query->fetch_assoc()):
                                               
                                        ?>
                                            <tr>
                                           
                                                <td><?php echo $row['first_name'] . " " .$row["last_name"]; ?></td>
                                                <td><?php echo $row['activity']; ?></td>
                                                <td ><?php echo $row['affected']; ?></td>
                                                <td><?php echo $row['item']; ?></td>
                                                <!-- <td><?php //echo date("M j, Y, g:i a D", intval($row['register_date'])); ?></td> -->
                                                <td><?php
                                                $timestamp = $row['datelog'];
                            $date = date('F j, Y, g:i a', $timestamp);
                            echo $date; ?>
                            </td>
                                           
                                            </tr>

                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>