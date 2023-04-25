<?php

include "php/connection.php"; include "php/functions.php";

$password = '12345';

$new_password_e = password_hash($password, PASSWORD_BCRYPT);

$query_update_password = $conn->query("UPDATE tbl_users SET password_e = '$new_password_e' WHERE username = 'jemor_237753'");


if ($query_update_password) {
    echo "successfully reset the password";
}




?>