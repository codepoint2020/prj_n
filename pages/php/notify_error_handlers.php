<?php

$add_user_required_field_meet = false;

// <!-- ==================================================== -->
// <!-- VARIABLE TEST AREA -->
// <!-- ========================END============================ -->

// <!-- ==================================================== -->
// <!--VARIABLES-->
// <!-- ========================END============================ -->



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

//no trim
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

?>