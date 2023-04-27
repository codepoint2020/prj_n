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

        $current_date = date('Y-m-d');
        $expiration_date = $row["active_until"];

        if ($current_date >= $expiration_date) {
            $conn->query("UPDATE tbl_users SET is_active = 'no', is_disabled = 'yes' WHERE username = '$uname';");
            redirect("login_failed.php?credentials_failed=true");
        } else {

            $is_active = $row["is_active"];
            $is_disabled = $row["is_disabled"];

            $correct_password = $row['password_e'];
            
            if (password_verify($user_password, $correct_password)) {
                






                $auth_user = strtolower($row['first_name']) . " " . strtolower($row['last_name']);
                $auth_user = ucwords($auth_user);

                if ($is_active == "yes" && $is_disabled == "no") {

                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['profile_pic'] = $row['profile_pic'];
         
                    $_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['sex'] = $row['sex'];
                    $_SESSION['dob'] = $row['dob'];

                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['contact_no'] = $row['contact_no'];
                    $_SESSION['contact_no2'] = $row['contact_no2'];
                    $_SESSION['house_no'] = $row['house_no'];
                    $_SESSION['street'] = $row['street'];
                    $_SESSION['brgy'] = $row['brgy'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['province'] = $row['province'];
                    $_SESSION['zipcode'] = $row['zipcode'];
                    $_SESSION['country'] = $row['country'];

                    $_SESSION['is_in'] = 'true';

                    $_SESSION['system_user'] = $auth_user;
                    $_SESSION['system_user_fname'] = strtolower($row['first_name']);
                    $_SESSION['user_email'] = strtolower($row['email']);
        
                    $_SESSION['user_type'] = strtolower($_SESSION['user_type']);

                    if (empty(['house_no'])) {
                        $house_no = "";
                    }

                    if (empty(['street'])) {
                        $street= "";
                        $separator= "";
                    }

                    if (empty(['brgy'])) {
                        $brgy= "";
                        $separator= "";
                    }

                    if (empty(['city'])) {
                        $city= "";
                        $separator= "";
                    }

                    if (empty(['zipcode'])) {
                        $zipcode= "";
                        $separator= "";
                    }

                    if (empty(['country'])) {
                        $country= "";
                        $separator= "";
                    }


                    $_SESSION['address'] = $house_no . $separator . $street . $separator . $brgy . $separator . $city . $separator . $zipcode . $separator . $country . $separator;
                    
                //WELCOME PAGE IS DIFFERENT FOR ADMINISTRATOR AND NON ADMINISTRATOR USERS
                    if ($_SESSION['user_type'] == "administrator") {
                        $_SESSION['is_admin'] = "yes";
                        redirect('panel.php?adm_home=true');
                    } else {
                        $_SESSION['is_admin'] = "no";
                        redirect('panel.php?home=true');
                    }

                } else {
                    redirect("login_failed.php?credentials_failed=true");
                }
            
                
                
            } else {
                $_SESSION['is_in'] = 'false';
                redirect("authentication.php?invalid_credentials=true");
                $_SESSION['entered_name'] = $uname;
                // $_SESSION['prevent_reload'] = 'set';
            }

        }

        
        
    }
}

//ERROR IF LOGIN FAILED


if (isset($_GET['invalid_credentials'])) {
    set_alert("Invalid credentials, try again");
    unset($_SESSION['prevent_reload']);
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

        $file_type = "";

      

        $file_extension = pathinfo($formFile, PATHINFO_EXTENSION);

        if ($file_extension == "pdf") {
            $dir = "../assets/references/pdf/";
            $file_type = "pdf";
        } elseif ($file_extension == "mp4"){
            $dir = "../assets/references/videos/";
            $file_type = "mp4";
        } elseif ($file_extension == "pptx") {
            $dir = "./pptx_player/file/";
            $file_type = "pptx";
        } elseif ($file_extension == "docx") {
            // $dir = "../assets/references/docx/";
            $file_type = "not_allowed"; 
        } else {
            $file_type = "not_allowed"; //produce error to tell user that the file is defined by the system as potentially harmful or unsupported
        }

    
        // $dir = "../assets/references/pdf/";

        $get_max_book_id = $conn->query("SELECT MAX(book_id) AS max_id FROM tbl_books");
        $row = $get_max_book_id->fetch_assoc();
        $max_id = intval($row['max_id']);
        $next_id = $max_id + 1;

        if (!empty($formFile)) {
            $formFile = "id_" . $next_id. "_" . filenameAppend() .$formFile;
            $cover_image = "id_" . $next_id. "_" . filenameAppend() .$cover_image;
            
        } else {
            $formFile = "";
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

   
        if ($file_type == "not_allowed") {
            array_push($errorArray, "unsupported_file");
        }

        

        if (empty($errorArray)) {
            $add_book_query = $conn->query("INSERT INTO tbl_books (
                file_name,
                file_type,
                title, 
                details, 
                category,
                author,
                cover_img,
                register_date

                ) VALUES (

                    '$formFile',
                    '$file_type',
                    '$title',
                    '$details',
                    '$category',
                    '$author',
                    '$cover_image',
                    '$register_date'

                    ); ");
        
            if ($add_book_query) {

                $_SESSION['last_book_added'] = $title;

                move_uploaded_file($formFile_temp, $dir . $formFile);

                if(!empty($cover_image)){
                    move_uploaded_file($cover_image_temp, $dir . $cover_image);
                }
        
                //if record has been recently changed prevent recently record to be added when user refreshes the page 1
                redirect('panel.php?manage_references=true&file_added='.$title);
              
               
            }
           
        } else {
            $_SESSION['error_array'] = $errorArray; 
        }
    
    } 

}

//NOTIFICATION IF A NEW BOOK HAS BEEN ADDED

if (isset($_GET['manage_references']) && isset($_GET['file_added'])) {
    $added_file = ucwords(html_ent($_GET['file_added']));
    set_alert_success($added_file . ' ' . 'has been successfully added. ' .'<a href="panel.php?all_references=true">Go to all categories to view the file.</a>');
    
}

//DELETE REFERENCE WITH CONFIRMATION
function delete_book_confirm_box()
{

    global $conn;

    if (isset($_GET['delete_ref'])) {
        $book_id = html_ent($_GET['id']);

        $query_book = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id; ") or die("FAILED TO QUERY BOOK" . $conn->error . __LINE__);
        $row = $query_book->fetch_assoc();
        $book = ucwords($row['title']);
        $confirm_box = <<<DELIMETER
        <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning: </h4>
    <h4>You are about to PERMANENTLY delete this REFERENCE:</h4>
    <h3>{$book}</h3>
    <hr>
   
    <a href="panel.php?manage_all_ref=true" class="btn btn-sm btn-secondary">Cancel</a>
    <a href="panel.php?manage_all_ref=true&confirm_delete_ref={$row['book_id']}" class="btn btn-sm btn-danger">Proceed</a>
</div>
DELIMETER;
        echo $confirm_box;
    }
}


//CONFIRM DELETE REFERENCE/BOOK

function delete_book() {
    global $conn;
    if (isset($_GET['confirm_delete_ref'])) {
        $book_id = html_ent($_GET['confirm_delete_ref']);

        //set_alert_danger notification keeps showing up if the URL contains a var del and a number even if it doesn't exist
        //This is the fix
        $query_book = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id") or 
                    die(jm_error('Query book id failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($query_book->num_rows > 0) {
            $row = $query_book->fetch_assoc();
            $target_book = ucwords("Reference Title: ".$row['title']);
            $target_file = $row["file_name"];
            $target_cover_image = $row["cover_img"];
            $_SESSION['prevent_reload_data'] = "set";

            $file_dir = "../assets/references/pdf/";

            $delete_book_query = $conn->query("DELETE FROM tbl_books WHERE book_id = $book_id; ") or 
            die(jm_error('Delete reference Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_book_query) {
                unlink($file_dir . $target_file);
                unlink($file_dir . $target_cover_image);
                redirect("panel.php?manage_all_ref=true&reference_deleted=true&book_title=".$target_book);
            }
        } 
    
    }
}

// NOTIFICATION IF A BOOK HAS BEEN DELETED

if (isset($_GET['reference_deleted']) && isset($_SESSION['prevent_reload_data'])) {
    $deleted_book = html_ent($_GET['book_title']);
    set_alert_info($deleted_book . ' ' . 'has been deleted');
    unset($_SESSION['prevent_reload_data']);
    
}

//ADD A CATEGORY
function add_category() {

    global $conn;
    if (isset($_POST['btn_add_category'])) {
        $cat_title = escape_string($_POST['cat_title']);

        if (!empty($cat_title)) {
            $insert_new_category = $conn->query("INSERT INTO tbl_categories (name) VALUES ('$cat_title')");
            if ($insert_new_category) {
                $_SESSION['prevent_reload_data'] = 'set';
                redirect('panel.php?categories=true&category_added='.$cat_title);
            }
        }
    }
}

function delete_category_confirm_box()
{

    global $conn;

    if (isset($_GET['category_delete'])) {
        $category_id = html_ent($_GET['category_delete']);

        $query_category = $conn->query("SELECT * FROM tbl_categories WHERE category_id = $category_id; ") or die("FAILED TO QUERY CATEGORY" . $conn->error . __LINE__);
        $row = $query_category->fetch_assoc();
        $category = ucwords($row['name']);
        $confirm_box = <<<DELIMETER
        <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning: </h4>
    <h4>You are about to PERMANENTLY delete this REFERENCE:</h4>
    <h3>{$category}</h3>
    <hr>
   
    <a href="panel.php?categories=true" class="btn btn-sm btn-secondary">Cancel</a>
    <a href="panel.php?categories=true&confirm_category_delete={$row['category_id']}" class="btn btn-sm btn-danger">Proceed</a>
</div>
DELIMETER;
        echo $confirm_box;
    }
}

function delete_category() {
    global $conn;
    if (isset($_GET['confirm_category_delete'])) {
        $category_id = html_ent($_GET['confirm_category_delete']);


        $query_category = $conn->query("SELECT * FROM tbl_categories WHERE category_id = $category_id") or 
                    die(jm_error('Query category id failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($query_category->num_rows > 0) {
            $row = $query_category->fetch_assoc();
            $target_category = ucwords("Reference Title: ".$row['name']);
         
            $_SESSION['prevent_reload_data'] = "set";


            $delete_category_query = $conn->query("DELETE FROM tbl_categories WHERE category_id = $category_id; ") or 
            die(jm_error('Delete category Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_category_query) {
              
                redirect("panel.php?categories=true&category_deleted=".$target_category);
            }
        } 
    
    }
}

//NOTIFICATION: If a new category has been added
if (isset($_GET['category_added']) && isset($_SESSION['prevent_reload_data'])) {
    $added_category = ucwords(html_ent($_GET['category_added']));
    set_alert_success($added_category . ' ' . 'has been successfully added');
    unset($_SESSION['prevent_reload_data']);
}


//NOTIFICATION IF A category HAS BEEN DELETED

if (isset($_GET['category_deleted']) && isset($_SESSION['prevent_reload_data'])) {
    $deleted_category = html_ent($_GET['category_deleted']);
    set_alert_warning($deleted_category . ' ' . 'deleted');
    unset($_SESSION['prevent_reload_data']);
    
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



//DEACTIVATE A USER PROMPT

function deactivate_user_confirm_box()
{

    global $conn;

    if (isset($_GET['deactivate'])) {
        $user_id = html_ent($_GET['deactivate']);

        $query_user = $conn->query("SELECT * FROM tbl_users WHERE user_id = $user_id; ") or die("FAILED to query target user" . $conn->error . __LINE__);
        $row = $query_user->fetch_assoc();
        $user = ucwords($row['first_name'] . " " .$row["last_name"]);
        $confirm_box = <<<DELIMETER
        <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Warning: </h4>
    <h4>You are about to DEACTIVATE this User:</h4>
    <h3>{$user}</h3>
    <hr>
   
    <a href="panel.php?load_users=true" class="btn btn-sm btn-secondary">Cancel</a>
    <a href="panel.php?load_users=true&confirm_deactivation={$user_id}" class="btn btn-sm btn-danger">Proceed</a>
</div>
DELIMETER;
        echo $confirm_box;
    }
}

//EXECUTE CONFIRMED DEACTIVATION OF USER'S ACCOUNT
function deactivate_user() {

    global $conn;
    if (isset($_GET['confirm_deactivation'])) {
        $user_id = html_ent($_GET['confirm_deactivation']);

        $query_user = $conn->query("SELECT first_name, last_name FROM tbl_users WHERE user_id = $user_id ");
        $target_record = $query_user->fetch_assoc();
        $target_user = $target_record["first_name"] . " " . $target_record["last_name"];

        $_SESSION['prevent_reload_data'] = "set";

        $update_account_status = $conn->query("UPDATE tbl_users SET is_disabled = 'yes', is_active = 'no' WHERE user_id = $user_id; ")or die(jm_error('Deactivation failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($update_account_status) {
            redirect("panel.php?load_users=true&deactivated_user=".$target_user);
        }
    }

}

//NOTIFICATION IF A USER HAS BEEN DEACTIVATED
if (isset($_GET['deactivated_user']) && isset($_SESSION['prevent_reload_data'])) {
    $deactivated_user = html_ent($_GET['deactivated_user']);
    set_alert_success($deactivated_user . ' ' . 'has been deactivated');
    unset($_SESSION['prevent_reload_data']);
}



//DEACTIVATE A USER PROMPT

function activate_user_confirm_box()
{

    global $conn;

    if (isset($_GET['activate'])) {
        $user_id = html_ent($_GET['activate']);

        $query_user = $conn->query("SELECT * FROM tbl_users WHERE user_id = $user_id; ") or die("FAILED to query target user" . $conn->error . __LINE__);
        $row = $query_user->fetch_assoc();
        $user = ucwords($row['first_name'] . " " .$row["last_name"]);
        $confirm_box = <<<DELIMETER
        <div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Note: </h4>
    <h4>You are attempting to ACTIVATE this user:</h4>
    <h3>{$user}</h3>
    <hr>
   
    <a href="panel.php?load_users=true" class="btn btn-sm btn-secondary">Cancel</a>
    <a href="panel.php?load_users=true&confirm_activation={$user_id}" class="btn btn-sm btn-primary">Proceed</a>
</div>
DELIMETER;
        echo $confirm_box;
    }
}

//EXECUTE CONFIRMED DEACTIVATION OF USER'S ACCOUNT
function activate_user() {

    global $conn;
    if (isset($_GET['confirm_activation'])) {
        $user_id = html_ent($_GET['confirm_activation']);

        $query_user = $conn->query("SELECT first_name, last_name FROM tbl_users WHERE user_id = $user_id ");
        $target_record = $query_user->fetch_assoc();
        $target_user = $target_record["first_name"] . " " . $target_record["last_name"];

        $current_date = date('Y-m-d');
        $expiration_date = $target_record["active_until"];
        $set_exp_date = $_SESSION['def_exp_date'];

        $default_exp_date = set_default_exp_date($set_exp_date);

        $_SESSION['prevent_reload_data'] = "set";

        if ($current_date >= $expiration_date) {
            $update_account_status = $conn->query("UPDATE tbl_users SET is_disabled = 'no', active_until = '$default_exp_date', is_active = 'yes' WHERE user_id = $user_id; ")or die(jm_error('Deactivation failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
            
            if ($update_account_status) {
                redirect("panel.php?load_users=true&activated_user=".$target_user);
            }

        } else {
            $update_account_status = $conn->query("UPDATE tbl_users SET is_disabled = 'no' WHERE user_id = $user_id; ")or die(jm_error('Deactivation failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
            
            if ($update_account_status) {
                redirect("panel.php?load_users=true&activated_user=".$target_user);
            }

        }
        

    }

}

//NOTIFICATION IF A USER'S ACCOUNT IS ALREADY ACTIVATED
if (isset($_GET['activated_user']) && isset($_SESSION['prevent_reload_data'])) {
    $activated_user = html_ent($_GET['activated_user']);
    set_alert_success($activated_user . ' ' . ' account has been reactivated');
    unset($_SESSION['prevent_reload_data']);
}


function changePassword() {

    if (isset($_POST['btn_change_password'])) {

        global $conn;
    
        $pw_change_errors = [];
    
        $current_user_id = $_SESSION['user_id'];
    
        $old_password = escape_string($_POST['old_password']);
        $new_password = escape_string($_POST['new_password']);
        $retype_new_password = escape_string(($_POST['retype_new_password']));
    
        if (empty($old_password)) {
            array_push($pw_change_errors, "empty_old_password");
        } 
    
        if (empty($new_password)) {
            array_push($pw_change_errors, "empty_new_password");
        } 
    
        if (empty($retype_new_password)) {
            array_push($pw_change_errors, "empty_new_retype_new_password");
        } 
    
    
    
        if (empty($pw_change_errors)) {
    
            $query_existing_password = $conn->query("SELECT password_e FROM tbl_users WHERE user_id = $current_user_id; ");
            $existing_password = $query_existing_password->fetch_assoc();
    
            $correct_password = $existing_password['password_e'];
    
            if (password_verify($old_password, $correct_password)) {
    
                $new_password_e = password_hash($new_password, PASSWORD_BCRYPT);
    
                if ($new_password === $retype_new_password) {
                    
                    $query_update_password = $conn->query("UPDATE tbl_users SET password_e = '$new_password_e'");
    
                    if ($query_update_password) {
                        redirect("panel.php?update_profile=true&password_change_ok=true");
                        $_SESSION['prevent_reload_data'] = 'set';
                    } else {
                        redirect("panel.php?update_profile=true&password_change_ok=false");
                        $_SESSION['prevent_reload_data'] = 'set';
                    }
    
                } else {
                    redirect("panel.php?update_profile=true&new_password_match=false");
                    $_SESSION['prevent_reload_data'] = 'set';
                }
            } else {
                redirect("panel.php?update_profile=true&old_password_failed=true");
                $_SESSION['prevent_reload_data'] = 'set';
            }
        }
    }
    
    
    if (isset($_GET['password_change_ok']) && $_GET['password_change_ok'] == 'false' ) {
        set_alert_danger('Password query failed during an attempt to change password from the database');
        unset($_SESSION['prevent_reload_data']);
    }
    
    if (isset($_GET['password_change_ok']) && $_SESSION['prevent_reload_data'] == 'set' && $_GET['password_change_ok'] == 'true' ) {
       
        set_alert_success('Password has been successfully changed!');
        unset($_SESSION['prevent_reload_data']);
    }

    if (isset($_GET['new_password_match']) && isset($_SESSION['prevent_reload_data']) && $_GET['new_password_match'] == 'false') {
        set_alert_danger('Password mismatch, try again!');
        unset($_SESSION['prevent_reload_data']);
    }

    if (isset($_GET['old_password_failed']) && isset($_SESSION['prevent_reload_data']) && $_GET['old_password_failed'] == 'true') {
        set_alert_danger('Old password failed, try again.');
        unset($_SESSION['prevent_reload_data']);
    }
    

}





?>


