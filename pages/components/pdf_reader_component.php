<?php


if (isset($_GET['file']) || isset($_GET['val'])) {
  $pdf_location = '../assets/references/pdf/';
  $pdf_file = $pdf_location . $_GET['file'];
  $file = $_GET['file'];
  $book_id = intval($_GET['id']);
  $title = html_ent($_GET['title']);

  log_view($book_id);

}

if (isset($_GET['saved'])) {
    
  $book_id = intval($_GET['id']);
  add_to_list($book_id);
  $_SESSION['prevent_reload'] = 'set';
  redirect("panel.php?load_pdf=true&id=".$book_id."&file=".$file."&title=".$title."&save_complete=true");
  
}


if (isset($_GET['save_complete']) && isset($_SESSION['prevent_reload'])) {
  set_alert_success("Success! This reference is now added in your study list");
  unset($_SESSION['prevent_reload']);

}


display_notification();


?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <style>
      * {
  margin: 0;
  padding: 0;
}

.top-bar {
  background: #333;
  color: #fff;
  padding: 1rem;
}

.btn {
  background: coral;
  color: #fff;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 0.7rem 2rem;
}

.btn:hover {
  opacity: 0.9;
}

.page-info {
  margin-left: 1rem;
}

.error {
  background: orangered;
  color: #fff;
  padding: 1rem;
}

.download {
  background-color: #19A7CE !important;
  color: #fff;
}

.download:hover {
  background-color: #009FBD !important;
  color: #fff;
}






.add_to_list {
  background-color: #333 !important;
  color: #fff;
}

    </style>
    <title><?php echo $title; ?></title>
  </head>

  <a  class="btn btn-dark mb-4 add_to_list" href="panel.php?load_pdf=true&id=<?php echo $book_id; ?>&file=<?php echo $file; ?>&title=<?php echo $title; ?>&saved=true">Add To My Study List</a>

  <a data-bs-toggle="tooltip" title="View with toolbars" class="btn btn-primary mb-4 download" href="
  panel.php?load_pdf=true&id=<?php echo $book_id; ?>&file=<?php echo $file; ?>&title=<?php echo $title; ?>
  "> <i class="icon-refresh"></i></a>

  <a data-bs-toggle="tooltip" title="View with toolbars" class="btn btn-primary mb-4 download" href="
  panel.php?load_pdf=true&id=<?php echo $book_id; ?>&file=<?php echo $file; ?>&title=<?php echo $title; ?>&pdf_toolbars=true
  "> <i class=" fas fa-file-pdf"></i></a>

  <a target = "_blank" data-bs-toggle="tooltip" title="View document in new tab" class="btn btn-primary mb-4 download" href="<?php echo $pdf_file; ?>"> <i class=" fas fa-sticky-note"></i></a>

  <a data-bs-toggle="tooltip" title="Download this document." class="btn btn-primary mb-4 download" href="<?php echo $pdf_file; ?>" download> <i class="fas fa-download"></i></a>

  



  <?php
    if (isset($_GET['pdf_toolbars'])) {
      include 'pdf_reader_component_embed.php';
    } else {
      include 'pdf_reader_default_view.php';
    }
  ?>




  

  </body>
</html>
