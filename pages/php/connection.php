<?php

ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

// session_destroy();

define("DBHOST","127.0.0.1:3306");
define("DBUSER","xjmor");
define("DBPASS","77J3r0m3");
define("DBNAME","u239917174_elib_db");


$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 






   
          


//echo "essfullyConnected successfully";


?>