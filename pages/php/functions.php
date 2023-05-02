<?php
//imported scripts

include 'date_calc.php';
include 'filename_randomizer.php';
include 'notify_error_handlers.php';

// <!-- =======================START============================= -->
// <!-- VARIABLE TEST AREA -->
// <!-- ==================================================== -->


//Log or Record Major admin activities such as posting editing and deleting data
function jemor_log($input_activity, $input_affected, $input_item)
{
    global $conn;

    //logs activity into the system
    $admin_user_id    = intval($_SESSION['user_id']);
    $activity   = strtolower($input_activity);
    $affected = strtolower($input_affected);
    $item = strtolower($input_item);
    $log_time   = time();

    $conn->query("INSERT INTO activity_logs (user_id, activity, affected, item, datelog) VALUES ($admin_user_id,'$activity','$affected','$item','$log_time'); ")

        or die("Failed to insert activity logs" . $conn->error . __LINE__);
}


function redirect($location)
{
    header("Location: $location ");
}


//limit the number of text to based on character string on the description/details of references/books
function short_desc($string)
{
    $max_length = 70;
    $current_length = strlen($string);

    if ($current_length <= $max_length) {
        return $string;
    } else {
        return substr($string, 0, $max_length) . "...";
    }
}

function short_desc_title($string)
{
    $max_length = 35;
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
        $complete_name = $first_name . " " .$last_name;
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

                jemor_log("added", $user_type, $complete_name);
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
            $user_type = $row['user_type'];
            $_SESSION['prevent_reload_data'] = "set";

            $delete_query = $conn->query("DELETE FROM tbl_users WHERE user_id = $id; ") or 
            die(jm_error('Delete Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_query) {
                jemor_log("deleted", $user_type, $target_user);
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

        $user_id = $_SESSION['user_id'];
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
                jemor_log("Added", $category, $title);
     

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


function update_book() {
    
    global $conn;
    $_SESSION['set_page'] ="true";
    if (isset($_POST['update_book'])) {

        $admin_user_id = $_SESSION['user_id'];
        $book_id = escape_string($_POST['book_id']);
        $title = escape_string($_POST['title']);
        $details = escape_string($_POST['details']);
        $category_id = escape_string($_POST['category_id']);
        $category = escape_string($_POST['category']);
        $author = escape_string($_POST['author']);
        $date_updated = time();
        // $file_type = "";


        $formFile = $_FILES['formFile']['name'];
        $formFile_temp = $_FILES['formFile']['tmp_name'];
        $cover_image = $_FILES['cover_image']['name'];
        $cover_image_temp = $_FILES['cover_image']['tmp_name'];

       

        
        //If the user changed the associated file of an existing reference
        if (!empty($formFile) && empty($cover_image)) {

            $formFile = "id_" . $book_id. "_" . filenameAppend() .$formFile;
            $cover_image = "id_" . $book_id. "_" . filenameAppend() .$cover_image;

            $query_existing = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id") or die("Query existing book for edit failed. ".$conn->error.__LINE__);
            $book_info = $query_existing->fetch_assoc();

             //If the user did not change the cover image
            // if (empty($cover_image)) {
            //     $cover_image = $book_info['cover_img'];
            // }

            $video_path = "../assets/references/videos/";
            $pdf_path = "../assets/references/pdf/";
            $pptx_path = "./pptx_player/file/";

            $existing_file = $book_info["file_name"];
            $existing_cover_image = $book_info["cover_img"];
            $existing_file_type = $book_info["file_type"];
            
            //Check the file extension of the new file being uploaded
            $file_extension = pathinfo($formFile, PATHINFO_EXTENSION);

            if ($file_extension === "pdf" && $existing_file_type === "pdf" ) {

                $dir = "../assets/references/pdf/";
                $file_type = "pdf";

            } elseif ($file_extension === "mp4" && $existing_file_type === "mp4"){

                $dir = "../assets/references/videos/";
                $file_type = "mp4";

            } elseif ($file_extension === "pptx" && $existing_file_type === "pptx") {
                $dir = "./pptx_player/file/";
                $file_type = "pptx";


            } elseif ($file_extension === "pdf" && $existing_file_type === "mp4") {

                if (file_exists($video_path.$existing_cover_image)) {
                    rename($video_path.$existing_cover_image, $pdf_path.$existing_cover_image);
                }

                $dir = "../assets/references/pdf/";
                $file_type = "pdf";


            } elseif ($file_extension == "pdf" && $existing_file_type == "pptx") {
                    if (file_exists($pptx_path.$existing_cover_image)) {
                        rename($pptx_path.$existing_cover_image, $pdf_path.$existing_cover_image);
                    }
    
                    $dir = "../assets/references/pdf/";
                    $file_type = "pdf";
            
            }   elseif ($file_extension === "mp4" && $existing_file_type === "pptx") {
                if (file_exists($pptx_path.$existing_cover_image)) {
                    rename($pptx_path.$existing_cover_image, $video_path.$existing_cover_image);
                }

                $dir = "../assets/references/videos/";
                $file_type = "mp4";

            }   elseif ($file_extension === "mp4" && $existing_file_type === "pdf") {

                if (file_exists($pdf_path.$existing_cover_image)) {
                    rename($pdf_path.$existing_cover_image, $video_path.$existing_cover_image);
                }

                $dir = "../assets/references/videos/";
                $file_type = "mp4";

                
            } elseif ($file_extension === "pptx" && $existing_file_type === "pdf") {
                if (file_exists($pdf_path.$existing_cover_image)) {
                    rename($pdf_path.$existing_cover_image, $pptx_path.$existing_cover_image);
                }

                $dir = "./pptx_player/file/";
                $file_type = "pptx";

            
            } elseif ($file_extension === "pptx" && $existing_file_type === "mp4") {
                if (file_exists($video_path.$existing_cover_image)) {
                    rename($video_path.$existing_cover_image, $pptx_path.$existing_cover_image);
                }

                $dir = "./pptx_player/file/";
                $file_type = "pptx";
            
            }
    

            $new_file_update = $conn->query("UPDATE tbl_books SET
            
            file_name = '$formFile',
            file_type = '$file_type',
            title = '$title',
            category_id = '$category_id',
            category = '$category',
            details = '$details',
            author = '$author',
    
            date_updated = '$date_updated' WHERE book_id = $book_id; ") or die("Reference update failed: " .$conn->error.__LINE__);

            if ($new_file_update) {

               //remove the existing file and upload the new one
                unlink($dir.$existing_file);
                move_uploaded_file($formFile_temp, $dir . $formFile);
                
                $_SESSION['prevent_reload'] = "set";
                jemor_log("edited", "reference", $title);
                
                redirect("panel.php?reference_updated=true&book_id=".$book_id."&changed_main_file=true");
                
            }

            //else if NO FILE CHANGE BUT OTHER INFO GOT CHANGED INCLUDING THE COVER IMAGE
        } elseif (empty($formFile) && !empty($cover_image)) {

            $cover_image = "id_" . $book_id. "_" . filenameAppend() .$cover_image;

            $query_existing = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id") or die("Query existing book for edit failed. ".$conn->error.__LINE__);
            $book_info = $query_existing->fetch_assoc();
            $file_type = $book_info["file_type"];
            $existing_cover_image = $book_info["cover_img"];

            if ($file_type === "pdf") {
                $path = "../assets/references/pdf/";
            } elseif ($file_type === "mp4") {
                $path = "../assets/references/videos/";
            } elseif ($file_type === "pptx") {
                $path = "./pptx_player/file/";
            } else {
                NULL;
            }
            
        
            $new_cover_img_update = $conn->query("UPDATE tbl_books SET
            
            title = '$title',
            category_id = '$category_id',
            category = '$category',
            details = '$details',
            author = '$author',
            cover_img = '$cover_image',
            date_updated = '$date_updated' WHERE book_id = $book_id; ") or die("Reference update failed: " .$conn->error.__LINE__);

            if ($new_cover_img_update) {

                // $cover_image = $_FILES['cover_image']['name'];
                // $cover_image_temp = $_FILES['cover_image']['tmp_name'];
               //remove the existing file and upload the new one
                // unlink($path.$existing_cover_image);

                move_uploaded_file($cover_image_temp, $path . $cover_image);
                
                $_SESSION['prevent_reload'] = "set";
                jemor_log("edited", "reference", $title);
                
                redirect("panel.php?reference_updated=true&book_id=".$book_id."&cover_image_changed=true");
          
            }
        
        } elseif (!empty($formFile) && !empty($cover_image)) {

            $formFile = "id_" . $book_id. "_" . filenameAppend() .$formFile;
            $cover_image = "id_" . $book_id. "_" . filenameAppend() .$cover_image;

            $query_existing = $conn->query("SELECT * FROM tbl_books WHERE book_id = $book_id") or die("Query existing book for edit failed. ".$conn->error.__LINE__);
            $book_info = $query_existing->fetch_assoc();
            $file_type = $book_info['file_type'];

             //If the user did not change the cover image
            // if (empty($cover_image)) {
            //     $cover_image = $book_info['cover_img'];
            // }

            // if ($file_type === "pdf") {
            //     $path = "../assets/references/pdf/";
            // } elseif ($file_type === "mp4") {
            //     $path = "../assets/references/videos/";
            // } elseif ($file_type === "pptx") {
            //     $path = "./pptx_player/file/";
            // } else {
            //     NULL;
            // }
            

            $video_path = "../assets/references/videos/";
            $pdf_path = "../assets/references/pdf/";
            $pptx_path = "./pptx_player/file/";

            $existing_file = $book_info["file_name"];
            $existing_cover_image = $book_info["cover_img"];
            $existing_file_type = $book_info["file_type"];
            
            //Check the file extension of the new file being uploaded
            $file_extension = pathinfo($formFile, PATHINFO_EXTENSION);

            if ($file_extension === "pdf" && $existing_file_type === "pdf" ) {

                $dir = "../assets/references/pdf/";
                $file_type = "pdf";

            } elseif ($file_extension === "mp4" && $existing_file_type === "mp4"){

                $dir = "../assets/references/videos/";
                $file_type = "mp4";

            } elseif ($file_extension === "pptx" && $existing_file_type === "pptx") {
                $dir = "./pptx_player/file/";
                $file_type = "pptx";


            } elseif ($file_extension === "pdf" && $existing_file_type === "mp4") {

                if (file_exists($video_path.$existing_cover_image)) {
                    rename($video_path.$existing_cover_image, $pdf_path.$existing_cover_image);
                }

                $dir = "../assets/references/pdf/";
                $file_type = "pdf";


            } elseif ($file_extension == "pdf" && $existing_file_type == "pptx") {
                    if (file_exists($pptx_path.$existing_cover_image)) {
                        rename($pptx_path.$existing_cover_image, $pdf_path.$existing_cover_image);
                    }
    
                    $dir = "../assets/references/pdf/";
                    $file_type = "pdf";
            
            }   elseif ($file_extension === "mp4" && $existing_file_type === "pptx") {
                if (file_exists($pptx_path.$existing_cover_image)) {
                    rename($pptx_path.$existing_cover_image, $video_path.$existing_cover_image);
                }

                $dir = "../assets/references/videos/";
                $file_type = "mp4";

            }   elseif ($file_extension === "mp4" && $existing_file_type === "pdf") {

                if (file_exists($pdf_path.$existing_cover_image)) {
                    rename($pdf_path.$existing_cover_image, $video_path.$existing_cover_image);
                }

                $dir = "../assets/references/videos/";
                $file_type = "mp4";

                
            } elseif ($file_extension === "pptx" && $existing_file_type === "pdf") {
                if (file_exists($pdf_path.$existing_cover_image)) {
                    rename($pdf_path.$existing_cover_image, $pptx_path.$existing_cover_image);
                }

                $dir = "./pptx_player/file/";
                $file_type = "pptx";

            
            } elseif ($file_extension === "pptx" && $existing_file_type === "mp4") {
                if (file_exists($video_path.$existing_cover_image)) {
                    rename($video_path.$existing_cover_image, $pptx_path.$existing_cover_image);
                }

                $dir = "./pptx_player/file/";
                $file_type = "pptx";
            
            }
    

            $new_file_cover_img = $conn->query("UPDATE tbl_books SET
            
            file_name = '$formFile',
            file_type = '$file_type',
            title = '$title',
            category_id = '$category_id',
            category = '$category',
            details = '$details',
            author = '$author',
            cover_img = '$cover_image',
            date_updated = '$date_updated' WHERE book_id = $book_id; ") or die("Reference update failed: " .$conn->error.__LINE__);

            if ($new_file_cover_img) {

               //remove the existing file and upload the new one
                unlink($dir.$existing_file);
                move_uploaded_file($formFile_temp, $dir . $formFile);

                //upload new cover image
                move_uploaded_file($cover_image_temp, $dir . $cover_image);


                
                $_SESSION['prevent_reload'] = "set";
                jemor_log("edited", "reference", $title);
                
                redirect("panel.php?reference_updated=true&book_id=".$book_id."&changed_main_file_and_cover_image=true");
                
            }


        } else {

            $info_update_only = $conn->query("UPDATE tbl_books SET
            
            title = '$title',
            category_id = '$category_id',
            category = '$category',
            details = '$details',
            author = '$author',
        
            date_updated = '$date_updated' WHERE book_id = $book_id; ") or die("Reference update failed: " .$conn->error.__LINE__);

            if ($info_update_only) {

            
                $_SESSION['prevent_reload'] = "set";
                jemor_log("edited", "reference", $title);
                
                redirect("panel.php?reference_updated=true&book_id=".$book_id."&info_update=true");
            }

        }
    }
}


//IF MAIN FILE HAS BEEN CHANGED
if (isset($_GET['changed_main_file']) && isset($_SESSION['prevent_reload'])) {
  
    set_alert_success('File has been successfully edited, attached file changed'.'<a href="panel.php?manage_all_ref=true"> Back to Manage References</a>
    ');
    unset($_SESSION['prevent_reload']);

}

//IF MAIN FILE HAS BEEN CHANGED
if (isset($_GET['cover_image_changed']) && isset($_SESSION['prevent_reload'])) {
  
    set_alert_success('File has been successfully edited, cover image changed.'.'<a href="panel.php?manage_all_ref=true"> Back to Manage References</a>
    ');
    unset($_SESSION['prevent_reload']);

}

//IF MAIN FILE HAS BEEN CHANGED
if (isset($_GET['info_update']) && isset($_SESSION['prevent_reload'])) {
  
    set_alert_success('File has been successfully updated.'.'<a href="panel.php?manage_all_ref=true"> Back to Manage References</a>
    ');

    unset($_SESSION['prevent_reload']);

}


//NOTIFICATION IF A NEW BOOK HAS BEEN EDITED

// if (isset($_GET['file_edited']) && isset($_SESSION['prevent_reload'])) {
//     $edited_file = ucwords(html_ent($_GET['file_edited']));
//     set_alert_success($edited_file . ' ' . 'has been successfully edited. ' .'<a href="panel.php?all_references=true">Go to all categories to view the file.</a>');
//     unset($_SESSION['prevent_reload']);
    
// }

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
            $book_title = ucwords($row['title']);
            $target_file = $row["file_name"];
            $category = $row['category'];
            $target_cover_image = $row["cover_img"];
            $_SESSION['prevent_reload_data'] = "set";

            $file_dir = "../assets/references/pdf/";

            $delete_book_query = $conn->query("DELETE FROM tbl_books WHERE book_id = $book_id; ") or 
            die(jm_error('Delete reference Query Failed').$conn->error."<h2>At line: ".__LINE__."</h2>");

            if ($delete_book_query) {
                unlink($file_dir . $target_file);
                unlink($file_dir . $target_cover_image);
                jemor_log("deleted", $category, $book_title);
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
        $register_date = time();
  

        if (!empty($cat_title)) {
            $insert_new_category = $conn->query("INSERT INTO tbl_categories (name, register_date) VALUES ('$cat_title', '$register_date')");
            if ($insert_new_category) {
                jemor_log("Added", "category", $cat_title);
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
                
                jemor_log("deleted", "category", $target_category);
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

//EDIT CATEGORY

function editCategory() {

    global $conn;

    if (isset($_POST["save_category_change"])) {

        // $admin_user_id = $_SESSION['user_id'];
        $category_id = escape_string($_POST['category_id']);
        $category_name = escape_string($_POST['category_name']);

        $query_existing_category = $conn->query("SELECT * FROM tbl_categories WHERE category_id = $category_id ") or die("query existing category failed: ".$conn->error.__LINE__);
        $row = $query_existing_category->fetch_assoc();
        $old_category_name = $row['name'];
        $date_updated = time();
        

        $update_category_query = $conn->query("UPDATE tbl_categories SET
         name = '$category_name',
         date_updated = $date_updated
         WHERE category_id = $category_id; ") or die("update category query failed: ".$conn->error.__LINE__);

        if ($update_category_query) {

            //update the edited category to existing references under it.
            $conn->query("UPDATE tbl_books SET category = '$category_name' WHERE category_id = $category_id ");
          

            $_SESSION['prevent_reload_data'] = 'set';
            jemor_log('edit_category', $old_category_name, $category_name);
            redirect("panel.php?categories=true&edited_category=true&from=".$old_category_name."&to=".$category_name);
        }

    }
    
}


//NOTIFICATION IF A category HIS EDITED

if (isset($_GET['edited_category']) && isset($_SESSION['prevent_reload_data'])) {
    $from = html_ent($_GET['from']);
    $to = html_ent($_GET['to']);
    set_alert_info("Successfully edited a category from ".$from." to ".$to);
    unset($_SESSION['prevent_reload_data']);
    
}


function get_num_users() {
    global $conn;

    $get_users = $conn->query("SELECT * FROM tbl_users") or die(jm_error('Get users query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_users = $get_users->num_rows;
    return $num_of_users;
}

//total number of books
function get_num_books() {
    global $conn;

    $get_books = $conn->query("SELECT * FROM tbl_books") or die(jm_error('Get books Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_books = $get_books->num_rows;
    return $num_of_books;
}


//total number of videos
function get_num_mp4() {
    global $conn;

    $get_books = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'mp4' ") or die(jm_error('Get books Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_videos = $get_books->num_rows;
    return $num_of_videos;
}

//total number of pptx
function get_num_pptx() {
    global $conn;

    $get_books = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'pptx' ") or die(jm_error('Get books Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_pptx = $get_books->num_rows;
    return $num_of_pptx;
}

//total number of pdf
function get_num_pdf() {
    global $conn;

    $get_books = $conn->query("SELECT * FROM tbl_books WHERE file_type = 'pdf' ") or die(jm_error('Get books Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
    $num_of_pdf = $get_books->num_rows;
    return $num_of_pdf;
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

        $query_user = $conn->query("SELECT * FROM tbl_users WHERE user_id = $user_id ");
        $target_record = $query_user->fetch_assoc();
        $target_user = $target_record["first_name"] . " " . $target_record["last_name"];
        $user_type = $target_record['user_type'];

        $_SESSION['prevent_reload_data'] = "set";

        $update_account_status = $conn->query("UPDATE tbl_users SET is_disabled = 'yes', is_active = 'no' WHERE user_id = $user_id; ")or die(jm_error('Deactivation failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");

        if ($update_account_status) {

            $query_user = $conn->query("SELECT first_name, last_name FROM tbl_users WHERE user_id = $user_id ");
            $row = $query_user->fetch_assoc();
         
            jemor_log('deactivated', $user_type, $target_user);
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

        $query_user = $conn->query("SELECT * FROM tbl_users WHERE user_id = $user_id ");
        $target_record = $query_user->fetch_assoc();
        $target_user = $target_record["first_name"] . " " . $target_record["last_name"];
        $user_type = $target_record['user_type'];

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
            $update_account_status = $conn->query("UPDATE tbl_users SET is_disabled = 'no', is_active = 'yes' WHERE user_id = $user_id; ")or die(jm_error('Activation failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
            
            if ($update_account_status) {
             
            
                
                redirect("panel.php?load_users=true&activated_user=".$target_user);
            }

        }

        jemor_log('activated', $user_type, $target_user);

      

        

    }

}

//NOTIFICATION IF A USER'S ACCOUNT IS ALREADY ACTIVATED
if (isset($_GET['activated_user']) && isset($_SESSION['prevent_reload_data'])) {
    $activated_user = html_ent($_GET['activated_user']);
    set_alert_success($activated_user . ' ' . ' account has been reactivated');
    unset($_SESSION['prevent_reload_data']);
}

function autoGeneratedPassword() {

    global $conn;

    if (isset($_POST['gen_password_btn'])) {
        $user_id = escape_string($_POST['user_id']);

        $user_type_query = $conn->query("SELECT user_type, first_name, last_name FROM tbl_users WHERE user_id = $user_id ") or die("Failed query on user type ".$conn->error.__LINE__);
        $row = $user_type_query->fetch_assoc();
        $user_type = $row['user_type'];
        $complete_name = ucwords($row['first_name'] . " " .$row['last_name']);
    
        //52 letters compost of lower and uppercase form
    
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
        'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
        'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
        'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    
    
    //Numbers from 0 to 9
    
        $numbers = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
    
    //Symbols, other symbols can be added
        $symbols = ['*', '#', '$'];
    
        //An array that will hold the characters
        $gen_chars = [];
    
        for ($i = 0; $i < 3; $i++ ) {
           //code
           $x = rand(1, count($letters) - 1);
           array_push($gen_chars, $letters[$x]);
        }
    
        for ($i = 0; $i < 3; $i++ ) {
            //code
            $x = rand(1, count($numbers) - 1);
            array_push($gen_chars, $numbers[$x]);
         }
    
         for ($i = 1; $i < 3; $i++ ) {
            //code
            $x = rand(0, count($symbols) - 1);
            array_push($gen_chars, $symbols[$x]);
         }
    
       
    
         //shuffle the array
         shuffle($gen_chars);
    
         //convert the array into a string
         $generated_password = implode($gen_chars);
    
         //encrypt the password and put it in another variable
         $enc_generated_password = password_hash($generated_password, PASSWORD_BCRYPT);
    
         $update_password_query = $conn->query("UPDATE tbl_users set password_e = '$enc_generated_password' WHERE user_id = $user_id; ");
    
         if ($update_password_query) {
            jemor_log("password_reset", $user_type, $complete_name);
            redirect("panel.php?edit_user_info=true&user_id=".$user_id."&password_reset=ok&pass=".$generated_password);
            $_SESSION["prevent_reload"] = "set";
         }
    
    }
}





function passwordResetManual() {

    global $conn;
    
    if (isset($_POST['m_password_btn'])) {
        $user_id = escape_string($_POST['user_id']);
        $new_password = escape_string($_POST['m_password']);

        $non_encrypted_pass = $new_password;

        $user_type_query = $conn->query("SELECT user_type, first_name, last_name FROM tbl_users WHERE user_id = $user_id ") or die("Failed query on user type ".$conn->error.__LINE__);
        $row = $user_type_query->fetch_assoc();
        $user_type = $row['user_type'];
        $complete_name = ucwords($row['first_name'] . " " .$row['last_name']);

        if (empty($new_password) || strlen($new_password) < 2) {
            set_alert_danger("Password cannot be empty and must at least 4 characters");
        } else {
            $new_password = password_hash($new_password, PASSWORD_BCRYPT);

            $update_password_query = $conn->query("UPDATE tbl_users set password_e = '$new_password' WHERE user_id = $user_id ");

            if ($update_password_query) {
                jemor_log("password_reset", $user_type, $complete_name);
                redirect("panel.php?edit_user_info=true&user_id=".$user_id."&password_reset=ok&pass=".$non_encrypted_pass);
                $_SESSION["prevent_reload"] = "set";
            }
        }

        
    }
}


if (isset($_GET["password_reset"]) && isset($_SESSION["prevent_reload"])) {
    $new_pass = html_ent($_GET["pass"]);
    set_alert_success("Password reset successful! New password is: ".$new_pass);
    unset($_SESSION["prevent_reload"]);
}




function changePassword() {

    if (isset($_POST['btn_change_password'])) {

        global $conn;
    
        $pw_change_errors = [];
    
        $current_user_id = $_GET['user_id'];
    
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
                    
                    $query_update_password = $conn->query("UPDATE tbl_users SET password_e = '$new_password_e' WHERE user_id = $current_user_id");
    
                    if ($query_update_password) {
                        redirect("panel.php?update_profile=true&password_change_ok=true&user_id=".$current_user_id);
                        $_SESSION['prevent_reload_data'] = 'set';
                    } else {
                        redirect("panel.php?update_profile=true&password_change_ok=false&user_id=".$current_user_id);
                        $_SESSION['prevent_reload_data'] = 'set';
                    }
    
                } else {
                    redirect("panel.php?update_profile=true&new_password_match=false&user_id=".$current_user_id);
                    $_SESSION['prevent_reload_data'] = 'set';
                }
            } else {
                redirect("panel.php?update_profile=true&old_password_failed=true&user_id=".$current_user_id);
                $_SESSION['prevent_reload_data'] = 'set';
            }
        }
    }
    
    
    if (isset($_GET['password_change_ok']) && $_GET['password_change_ok'] == 'false' ) {
        set_alert_danger('Password query failed during an attempt to change password from the database');
        unset($_SESSION['prevent_reload_data']);
    }
    
    if (isset($_GET['password_change_ok']) && isset($_SESSION['prevent_reload_data']) && $_GET['password_change_ok'] == 'true' ) {
       
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





function update_profile() {

    global $conn;

    $errorArray = [];
    
    if (isset($_POST['btn_profile_update'])) {

        $user_id = html_ent($_GET['user_id']);

        
        $profile_pic = $_FILES['profile_pic']['name'];
        $profile_pic_tmp = $_FILES['profile_pic']['tmp_name'];

        $first_name = escape_string($_POST['first_name']);
        $last_name = escape_string($_POST['last_name']);

        $address_id = escape_string($_POST['address_id']);

        $contact_no = escape_string($_POST['contact_no']);
        $contact_no2 = escape_string($_POST['contact_no2']);
        $house_no = escape_string($_POST['house_no']);
        $street = escape_string($_POST['street']);
        $brgy = escape_string($_POST['brgy']);
        $city = escape_string($_POST['city']);
        $province = escape_string($_POST['province']);
        $zipcode = escape_string($_POST['zipcode']);
        $sex = escape_string($_POST['sex']);
        $facebook = escape_string($_POST['facebook']);
        $website = escape_string($_POST['website']);
        $instagram = escape_string($_POST['instagram']);
        $twitter = escape_string($_POST['twitter']);
        $last_update = time();
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];
        $dob = "";
        
 

        if (!empty($month) && !empty($day) && !empty($year)) {
            $dob =  $month . "-" . $day . "-" . $year;
            // $dob = strtotime($dob);
        }

    

        $query_existing = $conn->query("SELECT * FROM tbl_users WHERE user_id = $user_id");
        $existing_record = $query_existing->fetch_assoc();

        if (empty($first_name)) {
            array_push($errorArray, "empty_first_name");
        }

        if (empty($last_name)) {
            array_push($errorArray, "empty_first_name");
        }

        if (empty($contact_no)) {
            array_push($errorArray, "empty_contact_no");
        }



        //Detect changes implement if time allows
  
        //update query if there is no error
        if (empty($errorArray)) {
            if (empty($profile_pic)) {
                $combined_update_no_pic = $conn->query("UPDATE tbl_users 
                                    JOIN tbl_address ON tbl_users.address_id = tbl_address.address_id
                                    SET 
                                        tbl_users.first_name = '$first_name',
                                        tbl_users.last_name = '$last_name',
                                        tbl_users.contact_no = '$contact_no',
                                        tbl_users.contact_no2 = '$contact_no2',
                                        tbl_users.sex = '$sex',
                                        tbl_users.facebook = '$facebook',
                                        tbl_users.website = '$website',
                                        tbl_users.instagram = '$instagram',
                                        tbl_users.twitter = '$twitter',
                                        tbl_users.last_update = '$last_update',
                                        tbl_users.dob = '$dob',
                                        tbl_address.house_no = '$house_no',
                                        tbl_address.street = '$street',
                                        tbl_address.brgy = '$brgy',
                                        tbl_address.city = '$city',
                                        tbl_address.province = '$province',
                                        tbl_address.zipcode = '$zipcode'
                                    WHERE tbl_users.user_id = $user_id AND tbl_address.address_id = $address_id") 
                                    or die("Failed to query user: ".$conn->error.__LINE__);

                if ($combined_update_no_pic) {

                    $_SESSION['prevent_reload_data'] = 'set';

     
                        redirect("panel.php?update_profile=true&user_id=".$user_id."&updated=true");
                   
                    
                    
                }

            } else {


                $profile_pic_dir = "../assets/images/users/";

                $new_profile_pic_filename = "id_" . $user_id. "_" . filenameAppend() .$profile_pic;

                $combined_update= $conn->query("UPDATE tbl_users 
                JOIN tbl_address ON tbl_users.address_id = tbl_address.address_id
                SET 
                    tbl_users.profile_pic = '$new_profile_pic_filename',

                    tbl_users.first_name = '$first_name',
                    tbl_users.last_name = '$last_name',
                    tbl_users.contact_no = '$contact_no',
                    tbl_users.contact_no2 = '$contact_no2',
                    tbl_users.sex = '$sex',
                    tbl_users.facebook = '$facebook',
                    tbl_users.website = '$website',
                    tbl_users.instagram = '$instagram',
                    tbl_users.twitter = '$twitter',
                    tbl_users.last_update = '$last_update',
                    tbl_users.dob = '$dob',
                    tbl_address.house_no = '$house_no',
                    tbl_address.street = '$street',
                    tbl_address.brgy = '$brgy',
                    tbl_address.city = '$city',
                    tbl_address.province = '$province',
                    tbl_address.zipcode = '$zipcode'
                WHERE tbl_users.user_id = $user_id AND tbl_address.address_id = $address_id") 
                or die("Failed to query user: ".$conn->error.__LINE__);

                if ($combined_update) {
                    //delete existing photo
                    $current_pic = $existing_record['profile_pic'];
                    $target_path = $profile_pic_dir.$current_pic;

                    if (file_exists($target_path)) {
                        unlink($target_path);
                    }

                    //add existing photo
                    move_uploaded_file($profile_pic_tmp, $profile_pic_dir . $new_profile_pic_filename);
                    $_SESSION['prevent_reload_data'] = 'set';
        
                        
                        redirect("panel.php?update_profile=true&user_id=".$user_id."&updated=true");
                    
                }
            }
        }
    }
}

if (isset($_GET['updated']) && isset($_GET['update_profile']) && isset($_SESSION['prevent_reload_data'])) {
    set_alert_success('Profile updated.');
    unset($_SESSION['prevent_reload_data']);
}

if (isset($_GET['edited']) && isset($_GET['edit_user_info']) && isset($_SESSION['prevent_reload_data'])) {
    set_alert_success('Profile has been edited.');
    unset($_SESSION['prevent_reload_data']);
}

?>


