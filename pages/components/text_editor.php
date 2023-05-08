<?php

//CREATE DATA
if (isset($_POST['submit'])) {

    $note_title = escape_string($_POST['note_title']);
    $content = $conn->real_escape_string($_POST['content']);
    $log_date = time();
    $user_id = intval($_SESSION['user_id']);

    $insert_data = $conn->query("INSERT INTO tbl_notes (note_title, content, user_id, log_date) VALUES ('$note_title', '$content', $user_id, '$log_date'); ");

    if ($insert_data) {
        $_SESSION['prevent_reload'] = 'set';
        redirect("panel.php?text_editor=true&save_note=true");
    }

}

if (isset($_GET['save_note']) && isset($_SESSION['prevent_reload'])) {
    unset($_SESSION['prevent_reload']);
    set_alert_success("Success! your notes has been saved.");

}

//DELETE DATA

if (isset($_GET['confirm_delete'])) {
    $note_id = html_ent($_GET['note_id']);
    $delete_query=$conn->query("DELETE FROM tbl_notes WHERE note_id = $note_id; ") or die("Delete notes query failed ".$conn->error.__LINE__);
    
    if ($delete_query) {
        $_SESSION['prevent_reload'] = 'set';
        redirect("panel.php?text_editor=true&notes_deleted=true&note_id=".$note_id); 
    }

}


if (isset($_GET['notes_deleted']) && isset($_SESSION['prevent_reload'])) {
    set_alert_success("A note has been deleted");
}   


function delete_note_confirm_box() {
    
    

    if (isset($_GET['delete_notes'])) {

        $note_id = html_ent($_GET['note_id']);
        $note_title = html_ent($_GET['note_title']);
    
$confirm_box = <<<DELIMETER
            <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Warning: </h4>
        <h4>You are about to PERMANENTLY delete this NOTE:</h4>
        <h3>{$note_title}</h3>
        <hr>
       
<a href="panel.php?text_editor=true" class="btn btn-sm btn-secondary">Cancel</a>
<a href="panel.php?text_editor=true&confirm_delete=true&note_id={$note_id}" class="btn btn-sm btn-danger">Proceed</a>
</div>
DELIMETER;
    
        echo $confirm_box;
           
    }
    
}

//EDIT DATA






display_notification();
delete_note_confirm_box();

?>




<div class="row">
    <div class="col-md-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="note_title" class="form-label">Title:</label>
            <input type="text" id="note_title" name="note_title" class="form-control mb-2 shadow-2" placeholder="Type a name for this note...">

            <textarea name="content" id="editor"><?php ?></textarea>
            <input type="submit" name="submit" value="SAVE" class="btn btn-dark mt-4">
            <input type="submit" name="update" value="UPDATE" class="btn btn-success mt-4">
            <a href="panel.php?text_editor=true" class="btn btn-secondary mt-4">Cancel</a>
        </form>
    </div>


<div class="col-md-4">
        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Your notes' lists</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-dark text-white">
                                          
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                         
                                                <th>Action</th>
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                        <?php 
                                                $user_id = intval($_SESSION['user_id']);
                                                $get_notes = $conn->query("SELECT * FROM tbl_notes WHERE user_id = $user_id ORDER BY note_id DESC");
                                                $num = 0;
                                                while ($note = $get_notes->fetch_assoc()):
                                                    $num++;
                                            ?>
                                            <tr>
                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $note['note_title']; ?></td>
                                                <td><?php echo short_desc($note['content']); ?></td>
                                    
                                                <td>
                                                    <a href="#" data-bs-toggle="tooltip" title="Edit this note"><i class="fas fa-edit jm-fas"></i></a>
                                                    <a href="panel.php?text_editor=true&delete_notes=true&note_title=<?php echo $note['note_title']; ?>&note_id=<?php echo $note['note_id']; ?>" data-bs-toggle="tooltip" title="Remove from the list"><i class="fas fa-window-close jm-fas"></i></a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
</div>
    

<script src="components/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserUploadMethod: "form",
        filebrowserUploadUrl: "upload.php"
    });
    // alert('test');
</script>
