<!-- ============================================================== -->
<!-- IMPORT(S): Php scripts, Header-->
<!-- ============================================================== -->
<?php 

include "php/connection.php";
include "php/common_variables.php";
include "php/functions.php";
include "php/objects.php";

signin_user();

?>


<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php echo $window_title; ?></title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link href="../dist/css/jm.style.css" rel="stylesheet">
   

</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(../assets/images/big/auth-bg_art.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="../assets/images/big/icon2.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <p class="text-center">Enter your account information
                        <?php 
                        if (isset($_SESSION['is_in']) && $_SESSION['is_in'] == "false") {
                            echo '<code>Invalid username or password</code>';
                            unset($_SESSION['is_in']);
                        }
                        ?>
                        </p>
                       
                        <form class="mt-4" method="POST" action="authentication.php">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Username</label>
                                        <input class="form-control" id="uname" name="uname" type="text"
                                            placeholder="enter your username" value="<?php echo isset($_SESSION['entered_name']) ?   $_SESSION['entered_name'] : ""; ?>">
                                            <span id="uname_required"></span>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" type="password" name="user_password"
                                            placeholder="enter your password">
                                            <span id="pwd_required"></span>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-lg-12 text-center">
                                    <button class="btn w-100 btn-dark"  id="signInTrigger" type="button">Sign In</button>

                                    <button id="signIn" name="btn_signin"></button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Don't have an account? <a href="#" class="text-danger">Sign Up</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
    
</body>

</html>


<script>

//FORM VALIDATION
let signInTrigger = document.getElementById("signInTrigger");
let signIn = document.getElementById("signIn");
let uname = document.getElementById("uname");
let pwd = document.getElementById("pwd");
let uname_required = document.getElementById("uname_required");
let pwd_required = document.getElementById("pwd_required");

let errorArray = [];

signInTrigger.addEventListener("click", () => {


    if(uname.value.trim() == "") {
        errorArray.push({ 
            targetInput: "uname",  
            appendedClass: "is-invalid", 
            display_required: "<code>Required</code>"
        });
    }

    if(pwd.value.trim() == "") {
        errorArray.push({ 
            targetInput: "pwd",  
            appendedClass: "is-invalid",
            display_required: "<code>Required</code>"
        });
    }


    if (errorArray.length == 0) {
        signIn.click();
    } else {
        for (let i = 0; i < errorArray.length; i++) {
            if (errorArray[i].targetInput == "uname") {
                uname.classList.add(errorArray[i].appendedClass);
                uname_required.innerHTML = errorArray[i].display_required;
               
            }

            if (errorArray[i].targetInput == "pwd") {
                pwd.classList.add(errorArray[i].appendedClass);
                pwd_required.innerHTML = errorArray[i].display_required;
            }
        }
    } 

    errorArray = [];

   
})




</script>

