
  <?php 
  include "php/connection.php";
  include "php/common_variables.php";
  include "php/functions.php";
  include "php/objects.php";

  include "components/head.php";

// echo "Current date and time: " . date("Y-m-d H:i:s");


// $current_time = time(); // get current Unix timestamp
// $six_months_later = strtotime('+6 months'); // add 6 months to current timestamp

// $time_diff = $six_months_later - $current_time; // calculate time difference

// echo "<br>";

// echo $time_diff . " = " . $six_months_later . " - " . $current_time;

// echo "<br>";
// echo 'The time difference between now and 6 months later is: ' . $time_diff . ' seconds.';

$current_date = date('F j, Y, g:i a');

$current_date_in_unix_format = strtotime($current_date);
$current_date_in_unix_format_plus_1_month = strtotime("+ 1 months");



echo "CURRENT DATE: " .$current_date."<br>";
echo "CURRENT DATE IN UNIX FORMAT: " .$current_date_in_unix_format."<br><hr>";

// echo ;
// echo "<br>";
// echo "CURRENT DATE IN UNIX FORMAT";
// echo "<br>";
// echo $current_date_in_unix_format;
// echo "<br>";
// echo "CURRENT DATE + 1 month";
// echo "<br>";
// echo date('F j, Y, g:i a',$current_date_in_unix_format_plus_1_month);
// echo "<br>";
// echo "=========================";

// echo "<br>";

// echo "Current date: " . $current_date = date('Y-m-d');

// echo "<br>";

// function add_months_to_current_date($months) {
    
//     $exp_date = date('Y-m-d', strtotime("+$months months"));
//     return $exp_date;
// }

// Example usage
// $new_date = add_months_to_current_date(1);
// echo "####New date: $new_date<br>";





$current_date_for_calculation = date('Y-m-d');

echo "Current date for calculation: " .$current_date_for_calculation;

$expiration_date = date('Y-m-d',$current_date_in_unix_format_plus_1_month);

echo "<br>";

echo "Expiration date: ". $expiration_date . "<br>";

echo "<br>";

// $current_date_for_calculation = "2023-05-01";

$diff = date_diff(date_create($current_date_for_calculation), date_create($expiration_date));

echo "This account will be active for: " . $diff->format('%y year(s), %m month(s), %d day(s)');

if ($current_date_for_calculation == $expiration_date ) {
  echo "<br>";
  echo "Account is already expired";
} else {
  echo "<br>";
  echo "Account is still active";
}

echo "<br>";
echo "and it will expire on " . date('Y-m-d G:i:s',strtotime($expiration_date));


// $month = trim(substr($birthdate, 0, 2)); 
// $day = trim(substr($birthdate, 3, 2));
// $year = trim(substr($birthdate, 6, 4)); 

// $fixBirthdate = $year."-".$month."-".$day; 

// $diff = date_diff(date_create($fixBirthdate), date_create($date_set_lis));

// $updated_age = $diff->format('%y');



// $date1 = date_create('2022-01-01');
// $date2 = date_create('2023-04-01');

// $diff = date_diff($date1, $date2);

// echo "The difference between $date1 and $date2 is: " . $diff->format('%y year(s), %m month(s), %d day(s)');



















