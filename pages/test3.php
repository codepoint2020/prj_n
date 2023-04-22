
<?php 
  include "php/connection.php";
  include "php/common_variables.php";
  include "php/functions.php";
  include "php/objects.php";

  include "components/head.php";


$current_date = date('F j, Y, g:i a');

$current_date_in_unix_format = strtotime($current_date);
$current_date_in_unix_format_plus_1_month = strtotime("+ 1 months");

echo "<br>";
echo "current_date_in_unix_format_plus_1_month: " .$current_date_in_unix_format_plus_1_month."<br>";
echo "this is another date: " . date('F j, Y, g:i a', $current_date_in_unix_format_plus_1_month) . "<br>";
echo "<hr>";
echo "just a strtotime: =====> " . date('F j, Y',strtotime("+ 1 months")) ."<br>";


echo "CURRENT DATE: " .$current_date."<br>";
echo "CURRENT DATE IN UNIX FORMAT: " .$current_date_in_unix_format."<br><hr>";


$current_date_for_calculation = date('Y-m-d');

echo "Current date for calculation: " .$current_date_for_calculation;

$expiration_date = "2023-04-01";

echo "<br>";

echo "Expiration date: ". $expiration_date . "<br>";

echo "<br>";



$diff = date_diff(date_create($current_date_for_calculation), date_create($expiration_date));

echo "This account will be active for: " . $diff->format('%y year(s), %m month(s), %d day(s)');

if ($current_date_for_calculation >= $expiration_date ) {

  echo "Account is already expired";
} else {

  echo "Account is still active";
}

echo "<br>";
echo "and it will expire on " . date('Y-m-d G:i:s',strtotime($expiration_date));




















