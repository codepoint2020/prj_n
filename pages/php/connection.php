<?php

ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

// session_destroy();

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","elib_db");


$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once("functions.php");

// echo "Connected successfully";


?>