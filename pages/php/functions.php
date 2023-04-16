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


//limit the number of text to based on character string on the description/details of references/books
function short_desc($string)
{
    $max_length = 100;
    $current_length = strlen($string);

    if ($current_length <= $max_length) {
        return $string;
    } else {
        return substr($string, 0, $max_length) . "...";
    }
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

           //GOOD FROM HERE

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

            //good from here
    
            // Check if the query was successful
            if ($insert_address) {
                // Retrieve the last inserted ID
                $last_id = $conn->insert_id;
          
    
                // echo "New record created successfully. Last inserted ID is: " . $last_id;
                $profile_pic_tmp = $_FILES['profile_pic']['tmp_name'];
    
                $profile_pic_dir = "../assets/images/users/";
             
    
                $insert_user_data = $conn->query("INSERT INTO tbl_users (
            
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
                die(jm_error('Something went wrong while inserting data to tbl_users').$conn->error."<h2>At line: ".__LINE__."</h2>");


                if ($insert_user_data) {

                    $last_user_id = $conn->insert_id;
                    $_SESSION['last_user_added'] = $first_name . " " .$last_name;
                    $_SESSION['prevent_reload_data'] = 'set';
                    
                    
                    if (!empty($profile_pic)) {
                        $profile_pic_new = "id_" . $last_user_id. "_" . filenameAppend() .$profile_pic;
                        $conn->query("UPDATE tbl_users SET profile_pic = '$profile_pic_new' WHERE user_id = $last_user_id;"); 
                        move_uploaded_file($profile_pic_tmp, $profile_pic_dir . $profile_pic_new);
                    } 
                    
                    
                } else {
                    echo jm_error('Something went wrong while inserting last id for $insert_address query').$conn->error."<h2>At line: ".__LINE__."</h2>";
                }

                header("Location: panel.php?load_users=true&added_user=".$_SESSION['last_user_added']);

            }
        }

    }
}

//NOTIFICATION IF A NEW USER HAS BEEN ADDED

if (isset($_GET['added_user']) && isset($_SESSION['prevent_reload_data'])) {
    $added_user = ucwords(html_ent($_GET['added_user']));
    set_alert_success($added_user . ' ' . 'has been successfully added');
    unset($_SESSION['prevent_reload_data']);
    
}

//NOTIFICATION IF A USER HAS BEEN DELETED

if (isset($_GET['user_deleted']) && isset($_SESSION['prevent_reload_data'])) {
    $deleted_user = html_ent($_GET['uname']);
    set_alert_warning($deleted_user . ' ' . 'deleted');
    unset($_SESSION['prevent_reload_data']);
    
}

//DELETE SELECTED USER
function delete_user() {
    global $conn;
    if (isset($_GET['confirm_delete'])) {
        $id = html_ent($_GET['confirm_delete']);

        //set_alert_danger notification keeps showing up if the URL contains a var del and a number even if it doesn't exist
        //This is the fix
        $query_id = $conn->query("SELECT * FROM tbl_users WHERE user_id = $id") or 
                    die(jm_error('Query id failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($query_id->num_rows > 0) {
            $row = $query_id->fetch_assoc();
            $target_user = ucwords($row['first_name'] . " " .$row['last_name']);
            $_SESSION['prevent_reload_data'] = "set";

            $delete_query = $conn->query("DELETE FROM tbl_users WHERE user_id = $id; ") or 
            die(jm_error('Delete Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_query) {
                redirect("panel.php?load_users=true&user_deleted=true&uname=".$target_user);
            }
        } 
    
    }
}


//DELETE USER WITH CONFIRMATION
function delete_user_confirm_box()
{

    global $conn;

    if (isset($_GET['del'])) {
        $id = html_ent($_GET['del']);

        $query_student = $conn->query("SELECT * FROM tbl_users WHERE user_id = $id; ") or die("FAILED TO QUERY STUDENT" . $conn->error . __LINE__);
        $row = $query_student->fetch_assoc();
        $user = ucwords($row['first_name'] . " " . $row['last_name']);
        $confirm_box = <<<DELIMETER
        <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning: </h4>
    <h4>You are about to PERMANENTLY delete this user:</h4>
    <h3>{$user}</h3>
    <hr>
   
    <a href="panel.php?load_users=true" class="btn btn-sm btn-secondary">Cancel</a>
    <a href="panel.php?load_users=true&confirm_delete={$row['user_id']}" class="btn btn-sm btn-danger">Proceed</a>
</div>
DELIMETER;
        echo $confirm_box;
    }
}


function signin_user()
{

    global $conn;
   

    if (isset($_POST['btn_signin'])) {
        $uname = escape_string($_POST['uname']);
        $user_password = escape_string($_POST['user_password']);
 

        $grab_pass = $conn->query("SELECT * from tbl_users WHERE username = '$uname'") or die(jm_error('Fetching users failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
        $row = $grab_pass->fetch_assoc();

     
        $correct_password = $row['password_e'];
        if (password_verify($user_password, $correct_password)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['profile_pic'] = $row['profile_pic'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_type'] = $row['user_type'];
            $auth_user = strtolower($row['first_name']) . " " . strtolower($row['last_name']);
            $auth_user = ucwords($auth_user);
            $_SESSION['is_in'] = 'true';
            $_SESSION['system_user'] = $auth_user;
            $_SESSION['system_user_fname'] = strtolower($row['first_name']);

            $_SESSION['user_type'] = strtolower($_SESSION['user_type']);

            if ($_SESSION['user_type'] == "administrator") {
                $_SESSION['is_admin'] = "yes";
                redirect('panel.php?adm_home=true');
            } else {
                $_SESSION['is_admin'] = "no";
                redirect('panel.php?home=true');
            }
            
            
        } else {
            $_SESSION['is_in'] = 'false';
            auth_set_alert_danger('Login failed: Invalid username or password');
            $_SESSION['entered_name'] = $uname;
        }
        
    }
}

//LOGOUT FUNCTIONALITY

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    redirect('authentication.php');

}

//Add Book/Reference

function add_book() {
    
    global $conn;

    if (isset($_POST['add_book'])) {

        $title = escape_string($_POST['title']);
        $details = escape_string($_POST['details']);
        $category = escape_string($_POST['category']);

        $formFile = $_FILES['formFile']['name'];
        $formFile_temp = $_FILES['formFile']['tmp_name'];
        $author = escape_string($_POST['author']);

        $cover_image = $_FILES['cover_image']['name'];
        $cover_image_temp = $_FILES['cover_image']['tmp_name'];

        $register_date = current_date();

    
        $dir = "../assets/references/pdf/";

        $get_max_book_id = $conn->query("SELECT MAX(book_id) AS max_id FROM tbl_books");
        $row = $get_max_book_id->fetch_assoc();
        $max_id = intval($row['max_id']);
        $next_id = $max_id + 1;

        if (!empty($formFile)) {
            $formFile = "id_" . $next_id. "_" . filenameAppend() .$formFile;
            
        } else {
            $formFile = "";
            $cover_image = "";    }

        if (!empty($formFile)) {
            $cover_image = "id_" . $next_id. "_" . filenameAppend() .$cover_image;
            
        } else {
     
            $cover_image = "";
        }


     
        

    
        
        $errorArray = [];
    
        if (empty($title)) {
            array_push($errorArray, "empty_title");
        }
    
        if (empty($details)) {
            array_push($errorArray, "empty_details");
        }
    
        if (empty($category)) {
            array_push($errorArray, "empty_category");
        }

        if (empty($formFile)) {
            array_push($errorArray, "empty_formFile");
        }

        if (empty($formFile_temp)) {
            array_push($errorArray, "empty_formFile_temp");
        }

        

        if (empty($errorArray)) {
            $add_book_query = $conn->query("INSERT INTO tbl_books (
                file_name,
                title, 
                details, 
                category,
                author,
                cover_img,
                register_date

                ) VALUES (

                    '$formFile',
                    '$title',
                    '$details',
                    '$category',
                    '$author',
                    '$cover_image',
                    '$register_date'

                    ); ");
        
            if ($add_book_query) {

                // $last_book_id = $conn->insert_id;
               
                // $newformFile = "id_" . $last_book_id. "_" . filenameAppend() .$formFile;
                // $new_cover_image = "id_" . $last_book_id. "_" . filenameAppend() .$cover_image;

                move_uploaded_file($formFile_temp, $dir . $formFile);

                if(!empty($cover_image)){
                    move_uploaded_file($cover_image_temp, $dir . $cover_image);
                }
               
                
                //if record has been recently changed prevent recently record to be added when user refreshes the page 1
                redirect('panel.php?manage_references=true&record_changed=true');
                set_alert_success("[".ucwords(strtolower($title)). "]  successfully uploaded!.");
            }
           
        } else {
            $_SESSION['error_array'] = $errorArray; 
        }
    
    } 

}

//if record has been recently changed prevent recently record to be added when user refreshes the page 2
if (isset($_GET['manage_reference']) && isset($_GET['record_changed'])) {
    display_notification();
}

function get_num_users() {
    global $conn;

    $get_users = $conn->query("SELECT * FROM tbl_users") or die(jm_error('Get users query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_users = $get_users->num_rows;
    return $num_of_users;
}

function get_num_books() {
    global $conn;

    $get_books = $conn->query("SELECT * FROM tbl_books") or die(jm_error('Get books Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_books = $get_books->num_rows;
    return $num_of_books;
}

?>
