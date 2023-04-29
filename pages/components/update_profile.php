<style>


.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8;
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}


 </style>

<?php

$user_id = $_GET['user_id'];

$current_user_query = $conn->query("SELECT tbl_users.*, tbl_address.*
FROM tbl_users
INNER JOIN tbl_address ON tbl_users.address_id = tbl_address.address_id;

") or die("Failed to query current user ".$conn->error.__LINE__);
$user_info = $current_user_query->fetch_assoc();
$edited_last = $user_info['last_update'];
// print_r($user_info);

?>

<img src="" alt="">

<div class="container rounded bg-white mt-5 mb-5">
        <div class="row">

    <!-- /.reset password modal-start -->
    <form action="panel.php?update_profile=true" method="POST">
        <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title " id="myCenterModalLabel">Password Change Box</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body p-4">
                   
                        <div class="input-group">
                            <input  type="password" class="form-control change_password_textbox" placeholder="Enter old password" value=""
                                 id="oldPassword" name="old_password">
                        </div>
                    
                        <div class="input-group mt-2">
                            <input  type="password" class="form-control change_password_textbox" placeholder="Enter a new password"
                                id="newPassword" name="new_password">
                                <!-- <i class="fas fa-eye" id="jmEye"></i> -->

                                <div class="input-group-prepend">
                                    <div id="passwordEye2">
                                    <div class="input-group-text h-100" id="passwordEye"><i class="fas fa-eye-slash"></i></div>
                                    </div>
                                </div>
       
                        </div>

                        <div class="input-group mt-2">
                            <input  type="password" class="form-control change_password_textbox" placeholder="Retype your new password"
                                 id="retypeNewPassword" name="retype_new_password">
                                 
                        </div>


                        <div class="mt-5 text-center mb-2">
                            <button class="btn btn-info"  id="btnChangePassword" type="button" style="width: 100%">Confirm</button>
                        </div>

                        

                        <button name="btn_change_password" id="btnSubmitNewPassword"></button>
                                
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </form>

       
            <div class="col-md-3 border-right">

            <form action="panel.php?update_profile=true&user_id=<?php echo $_GET['user_id']; ?>&save=true" method="post" enctype="multipart/form-data">
                <input name="address_id" type="hidden" value="<?php echo $user_info['address_id']; ?>">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img id="currentProfilePic" class="mt-5 mb-4" width="150px" src="../assets/images/users/<?php echo $user_info['profile_pic']; ?>">

                
                <span class="font-weight-bold mb-4"><?php echo ucwords($user_info['first_name'] . " " . $user_info['last_name']); ?></span>
                <small id="filenamePreview"></small>
            
         
                <div class="col-md-12 changePhotoWrapper">
                <!-- <button class="btn btn-primary" id="btnChangePic">Change Photo</button> -->
                <label for="photoChange" class="btn btn-dark changePhotoWrapper jm-btn-gradient"  style="width: 100%" data-bs-toggle="tooltip" title="Recommended format: .jpg, .jpeg, .png and in square layout">Change Picture</label>

                <input type="File" name="profile_pic" id="photoChange" style="display: none" onchange="previewNewProfilePic(event)" class="btn btn-info btn-sm jm-activate" >

  
                <button type="button" class="btn btn-dark mt-3 jm-btn-gradient" data-bs-toggle="modal" data-bs-target="#centermodal" id="displayModal">Change Password</button>
                </div>

                </div>
                </div>
                <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    
                    <div class="row mt-2">

                        <div class="col-md-6"><label class="labels">Name</label>
                            <input name="first_name" type="text" class="form-control" placeholder="first name" value="<?php echo ucwords($user_info['first_name']); ?>">
                        </div>

                        <div class="col-md-6"><label class="labels">Surname</label>
                            <input name="last_name" type="text" class="form-control" value="<?php echo ucwords($user_info['last_name']); ?>" placeholder="surname">
                        </div>

                    </div>
                    <div class="row mt-3">

                        <div class="col-md-12"><label class="labels">Contact #1</label>
                            <input name="contact_no" type="text" class="form-control" placeholder="enter contact number" value="<?php echo $user_info['contact_no']; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">Contact #2</label>
                            <input name="contact_no2" type="text" class="form-control" placeholder="enter contact number" value="<?php echo $user_info['contact_no2']; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">House No./Bldg. Room No.</label>
                            <input name="house_no" type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $user_info['house_no']; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">Street</label>
                            <input name="street" type="text" class="form-control" placeholder="House No. or Bldg Room No. " value="<?php echo $user_info['street']; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">Brgy</label>
                            <input name="brgy" type="text" class="form-control" placeholder="House No. or Bldg Room No. " value="<?php echo $user_info['brgy']; ?>">
                        </div>

                    
                        <div class="col-md-12"><label class="labels">City/Town</label>
                            <input name="city" type="text" class="form-control" placeholder="enter city or town" value="<?php echo $user_info['city']; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">Province</label>
                            <input name="province" type="text" class="form-control" placeholder="enter province" value="<?php echo $user_info['province']; ?>">
                        </div>

                        <div class="col-md-12"><label class="labels">Zipcode</label>
                            <input name="zipcode" type="text" class="form-control" placeholder="enter zipcode" value="<?php echo $user_info['zipcode']; ?>">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="p-3 py-5">
                   
                    <div class="">
                            <div class="">
                                <h4 class="card-title">Other information</h4>
                
                                <div class="form-group mb-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Sex:</label>
                                    <select name="sex" class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                       
                                        <option <?php if(empty($user_info['sex'])) { echo 'selected'; };?> value="">Choose...</option>
                                        <option <?php if($user_info['sex'] == "M") { echo 'selected'; };?> value="M">Male</option>
                                        <option <?php if($user_info['sex'] == "F") { echo 'selected'; };?> value="F">Female</option>
                                        <!-- <option value="3">custom</option> -->
                                    </select>
                                </div>


                                <div class="col-md-12"><label class="labels">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" value="<?php echo $user_info['facebook']; ?>">
                                    <!-- <i><a href="#">Visit</a></i> -->
                                </div>

                                <div class="col-md-12"><label class="labels">Website</label>
                                    <input name="website" type="text" class="form-control" placeholder="enter personal website" value="<?php echo $user_info['website']; ?>">
                                </div>
                                
                                <div class="col-md-12"><label class="labels">Instagram</label>
                                    <input name="instagram" type="text" class="form-control" placeholder="enter your instagram url " value="<?php echo $user_info['instagram']; ?>">
                                </div>

                                <div class="col-md-12"><label class="labels">Twitter</label>
                                    <input name="twitter" type="text" class="form-control" placeholder="enter your twitter url" value="<?php echo $user_info['twitter']; ?>">
                                </div>

                                <?php
                                    $dob = $user_info["dob"];
                                    $month = "";
                                    $day = "";
                                    $year = "";

                                    if (!empty($dob)) {
                                        $month = substr($dob, 0, 2);
                                        $day = substr($dob, 3, 2);
                                        $year = substr($dob, 6, 4);
                                    }
                                    

                                ?>
                              
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                    <label for="month" class="form-label">Month</label>
                                    <select name="month" class="form-select" id="month">
                                        <option value="">Select</option>
                                        <option <?php if (!empty($month) && $month == "01") { echo 'selected'; }?> value="01">Jan</option>
                                        <option <?php if (!empty($month) && $month == "02") { echo 'selected'; }?> value="02">Feb</option>
                                        <option <?php if (!empty($month) && $month == "03") { echo 'selected'; }?> value="03">Mar</option>
                                        <option <?php if (!empty($month) && $month == "04") { echo 'selected'; }?> value="04">Apr</option>
                                        <option <?php if (!empty($month) && $month == "05") { echo 'selected'; }?> value="05">May</option>
                                        <option <?php if (!empty($month) && $month == "06") { echo 'selected'; }?> value="06">June</option>
                                        <option <?php if (!empty($month) && $month == "07") { echo 'selected'; }?> value="07">July</option>
                                        <option <?php if (!empty($month) && $month == "08") { echo 'selected'; }?> value="08">Aug</option>
                                        <option <?php if (!empty($month) && $month == "09") { echo 'selected'; }?> value="09">Sept</option>
                                        <option <?php if (!empty($month) && $month == "10") { echo 'selected'; }?> value="10">Oct</option>
                                        <option <?php if (!empty($month) && $month == "11") { echo 'selected'; }?> value="11">Nov</option>
                                        <option <?php if (!empty($month) && $month == "12") { echo 'selected'; }?> value="12">Dec</option>
                                    </select>
                              
                                    </div>

                                    <div class="col-md-4">
                                    <label for="day" class="form-label">Day</label>
                                    <select name="day" class="form-select" id="day">
                                        <option value="">Select</option>
                                       <?php for($i = 1; $i <= 31; $i++): ?>
                                    <option <?php if ($i == $day) { echo 'selected'; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                       
                                    </div>

                                    <div class="col-md-4">
                                    <label for="year" class="form-label">Year</label>
                                    <select name="year" class="form-select" id="year">
                                    <option value="">Select</option>
                                        <?php

                                        $current_year = date("Y");
                                        $current_year = intval($current_year); 
                                        ?>
                                       
                                        <?php for($i = $current_year; $i >= 1960; $i--): ?>
                                        <option <?php if ($i == $year) { echo 'selected'; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                        
                                    </select>
                                        
                                    </div>

                                  
                                </div>

                        <div class="mb-3 mt-4" id="last_update">Updated last: <?php 
                           
                           $datetime = date("F j, Y, g:i a", $edited_last);
                           echo $datetime;
                           
                           
                           ?>

                                <div class="mb-3 mt-4">
                                    <button class="btn btn-primary jm-btn-gradient" name="btn_profile_update">Save</button>
                                </div>

                            
                              
                            </div>

                            
                        </div>
                     
                </div>
                </div>
            </form>  
        </div>
    </div>
    </div>
    </div>


<script>

let btnChangePassword = document.getElementById("btnChangePassword");
let newPassword = document.getElementById("newPassword");
let oldPassword = document.getElementById("oldPassword");
let retypeNewPassword = document.getElementById("retypeNewPassword");
let btnSubmitNewPassword = document.getElementById("btnSubmitNewPassword");
let passwordEye2 = document.getElementById("passwordEye2");


// //temporary
// let displayModal = document.getElementById("displayModal");

// window.onload = function () {
//     displayModal.click();
// }


                        
const gen_password = document.querySelector("#gen_password");

passwordEye2.addEventListener("click", () => {
    if (newPassword.type == "text") {
        newPassword.type = "password";
       
        passwordEye2.innerHTML = '<div class="input-group-text h-100" id="passwordEye"><i class="fas fa-eye-slash"></i></div>';
    } else {
        newPassword.type = "text";
      
        passwordEye2.innerHTML = '<div class="input-group-text h-100" id="passwordEye"><i class="fas fa-eye"></i></div>';
    }
})


btnChangePassword.addEventListener("click", () => {

let errorArray = [];

if(newPassword.value.trim() == "") {
   errorArray.push({ 
    targetInput: "newPassword",  
    appendedClass: "is-invalid" 
   });
}

if(oldPassword.value.trim() == "") {
  errorArray.push({ 
    targetInput: "oldPassword",  
    appendedClass: "is-invalid" 
   });
}

if(retypeNewPassword.value.trim() == "") {
  errorArray.push({ 
    targetInput: "oldPassword",  
    appendedClass: "is-invalid" 
   });
}


if (errorArray.length == 0) {
    btnSubmitNewPassword.click();
} else {

    for (let i = 0; i < errorArray.length; i++) {
            if (errorArray[i].targetInput == "newPassword") {
                newPassword.classList.add(errorArray[i].appendedClass);
                console.log("yes firstname is empty");
            }

            if (errorArray[i].targetInput == "oldPassword") {
                oldPassword.classList.add(errorArray[i].appendedClass);
            console.log("yes lastname is empty");
            }

            if (errorArray[i].targetInput == "oldPassword") {
                retypeNewPassword.classList.add(errorArray[i].appendedClass);
            console.log("retype password empty");
            }

        }
}

});

function previewNewProfilePic(event) {

var image = URL.createObjectURL(event.target.files[0]);
var currentProfilePic = document.getElementById("currentProfilePic");
currentProfilePic.setAttribute("src",image);

var photoChange = document.getElementById("photoChange");
var filenamePreview = document.getElementById("filenamePreview");
var filename = photoChange.files[0].name

filenamePreview.textContent = filename;    



}

</script>






