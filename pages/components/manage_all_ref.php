
<div class="row">
    
    <div class="card shadow-1">
        <div class="card-body">
            <h4 class="card-title">All References</h4>
                            <div class="col-md-3 mb-4">
                                <a href="panel.php?manage_references=true" class="btn btn-info">Add New Reference</a>
                            </div>
            <div class="table-responsive">
                <table id="default_order" class="table border table-striped table-bordered text-nowrap"
                                style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th >[UID] Reference Title</th>
                            <th>Category</th>
                            
                            
                            <th>Author</th>
                            <th>Date Added</th>
                        
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody class="border border-primary">
                        <?php
                            $query_references = $conn->query("SELECT * FROM tbl_books");
                            $num = 0;           
                            while($row = $query_references->fetch_assoc()):
                                $num++;
                        ?>
                        <tr>
                            <td><?php echo  $num; ?></td>
                            <td><?php echo "[".$row['book_id']."] " . short_desc_title(ucwords($row['title'])); ?></td>
                            <td><?php echo ucwords($row['category']); ?></td>
                            
                            <td><?php echo ucwords($row['author']); ?></td>
                            <td><?php echo ucwords($row['register_date']); ?></td>
                            <td>
                                <a href="panel.php?manage_all_ref=true&delete_ref=true&id=<?php echo $row['book_id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i></a>
                                <a href="panel.php?edit_ref=true&edit_form=true&book_id=<?php echo $row['book_id']; ?>" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                           
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</div>

<script>


</script>

<?php if(isset($_SESSION['reference_update_event'])) {
    unset($_SESSION['reference_update_event']); 
}

?>

