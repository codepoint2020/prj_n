<?php

// <!-- ==================================================== -->
// <!-- secure string prior to inserting to database -->
// <!-- ==================================================== -->

function escape_string_lower($string)
{
    global $conn;
    $secured_string = $conn->real_escape_string($string);
    $secured_string = ltrim($secured_string);
    $secured_string = rtrim($secured_string);
    return strtolower($secured_string);
}

// <!-- ==================================================== -->
// <!-- notify Error Messages -->
// <!-- ==================================================== -->


function set_alert_danger($message_alert)
{
    $danger = "<class='alert alert-danger'>";
    $end = "</div>";
    if (!empty($message_alert)) {
        $_SESSION['message_alert'] = $danger . $message_alert . $end;
        
    } else {
        $message_alert = "";
    }
}

function set_alert_info($message_alert)
{
    $info = "<class='alert alert-info'>";
    $end = "</div>";
    if (!empty($message_alert)) {
        $_SESSION['message_alert'] = $info . $message_alert . $end;
        
    } else {
        $message_alert = "";
    }
}

function set_alert_success($message_alert)
{
   
    if (!empty($message_alert)) {
        $_SESSION['message_alert'] = '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
        role="alert"><button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>' .$message_alert. "</div>";
    } else {
        $message_alert = "";
    }
}



function display_notification()
{
    if (isset($_SESSION['message_alert'])) {
        echo $_SESSION['message_alert'];
        unset($_SESSION['message_alert']);
    }
}

 




function add_record() {

    global $conn;

    if(isset($_POST['btn_submit'])) {
        $first_name = escape_string_lower($_POST['first_name']);
        // $last_name = escape_string_lower($_POST['last_name']);
        // $middle_name = escape_string_lower($_POST['middle_name']);
        // $ext = escape_string_lower($_POST['ext']);
        // $user_type = escape_string_lower($_POST['user_type']);
        // $email = escape_string_lower($_POST['email']);
        // // $username = escape_string_lower($_POST['username']);
        // // $gen_password = escape_string_lower($_POST['gen_password']);
        // $profile_pic = escape_string_lower($_POST['profile_pic']);
        // $contact_no = escape_string_lower($_POST['contact_no']);
        // $house_no = escape_string_lower($_POST['house_no']);
        // $street = escape_string_lower($_POST['street']);
        // $brgy = escape_string_lower($_POST['brgy']);
        // $city = escape_string_lower($_POST['city']);
        // $province = escape_string_lower($_POST['province']);
        // $zipcode = escape_string_lower($_POST['zipcode']);
    
        // $insert_query = $conn->query("
        //     INSERT INTO tbl_students (
        //         first_name,
        //         last_name,
        //         ext,
        //         username,
        //         email,
        //         password,
        //         contact_no,
        //         profile_pic,
        //         is_active
        //     ) VALUES (
        //         '$first_name',
        //         '$last_name',
        //         '$ext',
        //         '$usert_type',
        //         '$email',
        //         '$contact_no',
             
        //         '$profile_pic',
        //         '$middle_name',
        //         '$middle_name',
        //     ); 
        // ") or die("Failed to insert query: ".$conn->error.__LINE__);
    
        // $insert_query = true;
    
        $insert_query = $conn->query("INSERT INTO tbl_students (first_name) VALUES ('$first_name'); ");
    
        if ($insert_query) {
            set_alert_success('A record has been added');
        }
    }
}




?>
