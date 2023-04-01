<?php
//imported scripts

include 'date_calc.php';

// <!-- ==================================================== -->
// <!-- secure string prior to inserting to database (for POST requests) -->
// <!-- ==================================================== -->

function escape_string_lower($string)
{
    global $conn;
    $secured_string = $conn->real_escape_string($string);
    $secured_string = ltrim($secured_string);
    $secured_string = rtrim($secured_string);
    return strtolower($secured_string);

}

function escape_string($string)
{
    global $conn;
    $secured_string = $conn->real_escape_string($string);
    return $secured_string;

}


// <!-- ==================================================== -->
// <!-- SANITIZE INPUT TO HTML ENTITIES (for GET requests) -->
// <!-- ==================================================== -->

function html_ent($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}



// <!-- ==================================================== -->
// <!-- notify Error Messages -->
// <!-- ==================================================== -->


function set_alert_danger($message_alert)
{
    if (!empty($message_alert)) {
        $_SESSION['message_alert'] = '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
        role="alert"><button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>' .$message_alert. "</div>";
    } else {
        $message_alert = "";
    }
}

function set_alert_info($message_alert)
{
    if (!empty($message_alert)) {
        $_SESSION['message_alert'] = '<div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show"
        role="alert"><button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>' .$message_alert. "</div>";
    } else {
        $message_alert = "";
    }
}


function set_alert_warning($message_alert)
{
    if (!empty($message_alert)) {
        $_SESSION['message_alert'] = '<div class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show"
        role="alert"><button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>' .$message_alert. "</div>";
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

function jm_error($error_description) {
    return "<div class='alert alert-danger'>".$error_description."</div>";
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

        $gen_password = escape_string_lower($_POST['gen_password']);

        

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
                move_uploaded_file($profile_pic_tmp, $profile_pic_dir . $profile_pic);
                set_alert_success('A new user has been added with address id: '.$last_id);
            }

        } else {
            echo jm_error('Something went wrong while inserting last id for $insert_address query').$conn->error."<h2>At line: ".__LINE__."</h2>";
        }


        
            
        
    }
}


function delete_user() {
    global $conn;
    if (isset($_GET['del'])) {
        $id = html_ent($_GET['del']);

        //set_alert_danger notification keeps showing up if the URL contains a var del and a number even if it doesn't exist
        //This is the fix
        $query_id = $conn->query("SELECT * FROM tbl_students WHERE student_id = $id") or 
                    die(jm_error('Query id failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($query_id->num_rows > 0) {

            $delete_query = $conn->query("DELETE FROM tbl_students WHERE student_id = $id; ") or 
            die(jm_error('Delete Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_query) {
            set_alert_danger('User permanently deleted');
            }
        } else {
            header("Location: users.php");
        }
       
    
    }
}





?>
