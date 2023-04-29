<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
    <H1>TEST</H1>
    <?php
$date_string = '1-2-2023';
$unix_timestamp = strtotime($date_string);
echo $unix_timestamp;
echo "<br>";

echo date("m-d-Y", $unix_timestamp);
echo "<br>";

$month = date("m", $unix_timestamp);
echo $month;
echo "<br>";
$day = date("d", $unix_timestamp);
echo $day;
echo "<br>";

$year = date("Y", $unix_timestamp);
echo $year;

echo "<br>";


echo date("m-d-Y", 534528000);

?>
</body>
</html>