<?php
//imported scripts

include 'date_calc.php';
include 'filename_randomizer.php';
include 'notify_error_handlers.php';

// <!-- =======================START============================= -->
// <!-- VARIABLE TEST AREA -->
// <!-- ==================================================== -->


function redirect($location)
{
    header("Location: $location ");
}




function add_user()
{

    global $conn;

 

    if (isset($_POST['submit_user'])) {

     
        $first_name = escape_string_lower($_POST['first_name']);
        $last_name = escape_string_lower($_POST['last_name']);
        $ext = escape_string_lower($_POST['ext']);
        $user_type = escape_string_lower($_POST['user_type']);
        $username = escape_string_lower($_POST['username']);
        $email = escape_string_lower($_POST['email']);

        $gen_password = escape_string($_POST['gen_password']);

        

        $contact_no = escape_string_lower($_POST['contact_no']);
        $profile_pic = $_FILES['profile_pic']['name'];

        $register_date = current_date();
       
         
        //==START==Data for insertion but not from the form or POST====//
        $password_e = password_hash($gen_password, PASSWORD_BCRYPT);
        $is_active = escape_string_lower("yes");
        
        $active_until = set_default_exp_date(escape_string($_POST['expiration_date']));
    
        $is_disabled = escape_string_lower("no");
        //==END==Data for insertion but not from the form or POST====//


        $house_no = escape_string_lower($_POST['house_no']);
        $street = escape_string_lower($_POST['street']);  
        $brgy = escape_string_lower($_POST['brgy']); 
        $city = escape_string_lower($_POST['city']); 
        $province = escape_string_lower($_POST['province']);
        $zipcode = escape_string_lower($_POST['zipcode']);
        $country = escape_string_lower($_POST['country']);

        $errorArray = [];

        if (empty($first_name)) {
            array_push($errorArray, "empty_first_name");
        }

        if (empty($last_name)) {
            array_push($errorArray, "empty_last_name");
        }

        if (empty($email)) {
            array_push($errorArray, "empty_email");
        }

        if (empty($contact_no)) {
            array_push($errorArray, "empty_contact_no");
        }

        if (empty($errorArray)) {

            //Insert first the tbl_address data and capture the last inserted id so it can be used to insert data for tbl_users
            $insert_address = $conn->query("INSERT INTO tbl_address (
        
                house_no,
                street,  
                brgy, 
                city, 
                province, 
                zipcode,
                country
    
            ) VALUES (
                '$house_no',
                '$street',  
                '$brgy', 
                '$city',
                '$province',
                '$zipcode',
                '$country'
    
            ); ") or die(jm_error('Insert Address Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    
            // Check if the query was successful
            if ($insert_address) {
                // Retrieve the last inserted ID
                $last_id = $conn->insert_id;
    
                // echo "New record created successfully. Last inserted ID is: " . $last_id;
                $profile_pic_tmp = $_FILES['profile_pic']['tmp_name'];
    
                $profile_pic_dir = "uploads/";
    
                $insert_user_data = $conn->query("INSERT INTO tbl_students (
            
                    first_name,
                    last_name,
                    ext,
                    user_type,
                    username,
                    email,
                    password_e,
                    contact_no,
                   
                
                    address_id,
                   
                  
                    register_date,
                    is_active,
                    active_until,
                    is_disabled
                ) VALUES (
                    
                    '$first_name',
                    '$last_name', 
                    '$ext',
                    '$user_type',
                    '$username',
                    '$email',
                    '$password_e',
                    '$contact_no',
        
                   
                
                    $last_id,
              
                    '$register_date',
                    '$is_active',
                    '$active_until',
                    '$is_disabled'
                ); ") or 
                die(jm_error('Something went wrong while inserting data to tbl_students').$conn->error."<h2>At line: ".__LINE__."</h2>");
        
                if ($insert_user_data) {
    
                    $last_user_id = $conn->insert_id;
                    $_SESSION['last_user_added'] = $first_name . " " .$last_name;
                    $_SESSION['token'] = 'set';
                    $profile_pic_new = "id_" . $last_user_id. "_" . filenameAppend() .$profile_pic;
    
                    $conn->query("UPDATE tbl_students SET profile_pic = '$profile_pic_new' WHERE user_id = $last_user_id;"); 
                    
                    move_uploaded_file($profile_pic_tmp, $profile_pic_dir . $profile_pic_new);
                    
                }
    
            } else {
                echo jm_error('Something went wrong while inserting last id for $insert_address query').$conn->error."<h2>At line: ".__LINE__."</h2>";
            }

            header("Location: users.php?added_user=".$_SESSION['last_user_added']);


        }


    }
}

//NOTIFICATION IF A NEW USER HAS BEEN ADDED

if (isset($_GET['added_user']) && isset($_SESSION['token'])) {
    $added_user = html_ent($_GET['added_user']);
    set_alert_success($added_user . ' ' . 'has been successfully added');
    unset($_SESSION['token']);
    
}

//DELETE SELECTED USER
function delete_user() {
    global $conn;
    if (isset($_GET['del'])) {
        $id = html_ent($_GET['del']);

        //set_alert_danger notification keeps showing up if the URL contains a var del and a number even if it doesn't exist
        //This is the fix
        $query_id = $conn->query("SELECT * FROM tbl_students WHERE user_id = $id") or 
                    die(jm_error('Query id failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($query_id->num_rows > 0) {

            $delete_query = $conn->query("DELETE FROM tbl_students WHERE user_id = $id; ") or 
            die(jm_error('Delete Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_query) {
            set_alert_danger('User permanently deleted');
            }
        } else {
            header("Location: users.php");
        }
       
    
    }
}


function signin_user()
{

    global $conn;
   

    if (isset($_POST['btn_signin'])) {
        $uname = escape_string($_POST['uname']);
        // $user_password = escape_string($_POST['user_password']);
        $user_type = escape_string($_POST['user_type']);

    
        // if ($user_type === 'guest') {
        //     $get_user_info = $conn->query("SELECT * from tbl_external WHERE username = '$uname'") or die(jm_error('Fetching guest record failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
        //     $row = $get_user_info->fetch_assoc();
        //     $correct_password = $row['password_e'];
        // }

        if ($user_type === 'student') {
            $get_user_info = $conn->query("SELECT * from tbl_students WHERE username = '$uname'") or die(jm_error('Fetching student record failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
            $row = $get_user_info->fetch_assoc();
            $correct_password = $row['password_e'];
            echo $correct_password;
            echo "===";
            echo $user_type;
            
        }
        

      

        // if ($user_type === 'personnel') {

        //     $get_user_info = $conn->query("SELECT * from tbl_personnel WHERE username = '$uname'") or die(jm_error('Fetching personnel record failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
        //     $row = $get_user_info->fetch_assoc();
        //     $correct_password = $row['password_e'];
        // }

        // if ($user_type === 'staff') {

        //     $get_user_info = $conn->query("SELECT * from tbl_staff WHERE username = '$uname'") or die(jm_error('Fetching staff/librarian record failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
        //     $row = $get_user_info->fetch_assoc();
        //     $correct_password = $row['password_e'];
        // }

        // if ($user_type === 'administrator') {
        //     $get_user_info = $conn->query("SELECT * from tbl_sysadmin WHERE username = '$uname'") or die(jm_error('Fetching sysadmin record failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
        //     $row = $get_user_info->fetch_assoc();
        //     $correct_password = $row['password_e'];
        // }

        
        
        // if (!empty($get_user_info)) {

        //     $correct_password = $row['password_e'];
        //     if (password_verify($user_password, $correct_password)) {
        //         $_SESSION['user_id'] = $row['user_id'];
        //         $_SESSION['profile_pic'] = $row['profile_pic'];
        //         $_SESSION['user_email'] = $row['email'];
        //         $_SESSION['user_type'] = $row['user_type'];
        //         $auth_user = strtolower($row['first_name']) . " " . strtolower($row['last_name']);
        //         $auth_user = ucwords($auth_user);
        //         $_SESSION['is_in'] = 'true';
        //         $_SESSION['system_user'] = $auth_user;

        //         $_SESSION['user_type'] = strtolower($_SESSION['user_type']);

        //         if ($_SESSION['user_type'] == "administrator") {
        //             $_SESSION['is_admin'] = "yes";
        //         } else {
        //             $_SESSION['is_admin'] = "no";
        //         }
             
        //         redirect('users.php');
        //     } else {
        //         $_SESSION['is_in'] = 'false';
        //         set_alert_danger('Login failed.');
        //     }
        
        // }

        
    }
}


?>
