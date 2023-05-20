<?php


ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

// session_destroy();

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","elib_db");


$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (isset($_POST["btn_checkboxes"])) {
    print_r($_POST);
    $array = ($_POST);
    echo "<br>";
    

    $character = 'id';
    $count = 0;

    foreach ($array as $item) {
        if (strpos($item, $character) !== false) {
            $count++;
        }
    }

    echo $count;
    echo "<br>";




    $array_2 = [];
$array = $_POST;

foreach ($array as $item) {
    // Extract the number from the item
    $number = substr($item, 3);
    
    // Store the number in $array_2
    if (strpos($item, "id") !== false) {
        array_push($array_2, $number);
    }
    
}

// Display the updated $array_2
print_r($array_2);


foreach ($array_2 as $id) {
    $current_id = $id;
    $multiple_delete_query = $conn->query("DELETE FROM tbl_users WHERE user_id = $id");
    if ($multiple_delete_query) {
        echo $current_id." deleted "."<br>";
    }
}

}


?>
   
          






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>CHECKBOX</title>
</head>
<body>

<div class="container">
    <h1>test</h1>
    <table class="table">
        <thead>
            <tr>
               
                <th>#</th>
                <th>Name</th>
                <th>checkbox</th>
            </tr>
            
        </thead>
        <tbody>
            <form action="test1.php" method="POST">
                <?php
                    $get_users = $conn->query("SELECT * FROM tbl_users ORDER BY user_id DESC");
                    $num = 0;
                    while ($row = $get_users->fetch_assoc()):
                        $num++;
                ?>
                <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $row['first_name'] . " " .$row["last_name"]; ?></td>
                    
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_<?php echo $row['user_id']; ?>" value="id_<?php echo $row['user_id']; ?>">
                            <label class="form-check-label" for="inlineCheckbox1">Select</label>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
                <button class="btn btn-primary" name="btn_checkboxes">SUBMIT</button>
            </form>

        </tbody>
    </table>
</div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>