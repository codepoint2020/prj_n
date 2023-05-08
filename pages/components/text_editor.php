<?php

$updating = 'false';
$note_title = "";
$note_content = "";

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
    unset($_SESSION['prevent_reload']);
}   


function delete_note_confirm_box() {
    
    

    if (isset($_GET['delete_notes'])) {

        $note_id = html_ent(escape_string($_GET['note_id']));
        $note_title = html_ent(escape_string($_GET['note_title']));
    
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

if (isset($_GET['edit_notes'])) {

    $note_id = escape_string($_GET['note_id']);
    $note_id = intval($note_id);
    $note_title = escape_string($_GET['note_title']);

    $query_note = $conn->query("SELECT * FROM tbl_notes WHERE note_id = $note_id; ") or die($conn->error.__LINE__);

    $row = $query_note->fetch_assoc();
    $note_content = $row['content'];

    $updating = 'true';
        
}

if (isset($_GET['cancel'])) {
    $updating = 'false';
}


//UPDATE
if (isset($_POST['update'])) {

    $note_id =  intval(escape_string($_POST['note_id']));
    $note_title = mysqli_real_escape_string($conn, $_POST['note_title']);
    $content = escape_string($_POST['content']);
    $log_date = time();
    $user_id = intval($_SESSION['user_id']);

    $update_data = $conn->query("UPDATE tbl_notes SET
    note_title = '$note_title',
    content = '$content',
    log_date = '$log_date' 
    WHERE note_id = $note_id");

    if ($update_data) {
        $_SESSION['prevent_reload'] = 'set';
        redirect("panel.php?text_editor=true&notes_updated=true&note_id=".$note_id);
    }
}

if (isset($_GET['notes_updated'])) {

    $updating = 'true';
    set_alert_success("Notes changes saved!");

    $note_id = html_ent($_GET['note_id']);
    $query_note = $conn->query("SELECT * FROM tbl_notes WHERE note_id = $note_id");
    $row = $query_note->fetch_assoc();

    $note_title = $row['note_title'];
    $note_content = $row['content'];


}
    

display_notification();
delete_note_confirm_box();

?>


<div class="row">
    <div class="col-md-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="note_id" value="<?php echo $note_id; ?>">
            <label for="note_title" class="form-label">Title:</label>
            <input type="text" id="note_title" name="note_title" class="form-control mb-2 shadow-2" placeholder="Type a name for this note..." value="<?php echo $note_title; ?>">

            <textarea name="content" id="editor"><?php echo $note_content; ?></textarea>
            <?php if ($updating == 'true'):?>
                <input type="submit" name="update" value="UPDATE" class="btn btn-success mt-4">
           
            <?php else: ?>
                <input type="submit" name="submit" value="SAVE" class="btn btn-dark mt-4">
            <?php endif; ?>
            <a href="panel.php?text_editor=true&cancel=true" class="btn btn-secondary mt-4">Cancel</a>
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
                                                    <a href="panel.php?text_editor=true&edit_notes=true&note_title=<?php echo urlencode($note ['note_title']); ?>&note_id=<?php echo $note['note_id']; ?>" data-bs-toggle="tooltip" title="Edit this note"><i class="fas fa-edit jm-fas"></i></a>
                                                    <a href="panel.php?text_editor=true&delete_notes=true&note_title=<?php echo urlencode($note['note_title']); ?>&note_id=<?php echo $note['note_id']; ?>" data-bs-toggle="tooltip" title="Remove from the list"><i class="fas fa-window-close jm-fas"></i></a>
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
