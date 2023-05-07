<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TEST 5</title>
</head>
<body>

<?php


$string = 'id_75_sdfdsadf_df3d_71_8721565485fdfd_.png';

$firstUnderscoreIndex = -1;
$secondUnderscoreIndex = -1;

// Find the first and second underscore indexes
for ($i = 0; $i < strlen($string); $i++) {
    if ($string[$i] === '_') {
        if ($firstUnderscoreIndex === -1) {
            $firstUnderscoreIndex = $i;
        } else {
            $secondUnderscoreIndex = $i;
            break; // Stop the loop once the second underscore is found
        }
    }
}

// Extract the data between the first and second underscores
if ($firstUnderscoreIndex !== -1 && $secondUnderscoreIndex !== -1) {
    $result = substr($string, $firstUnderscoreIndex + 1, $secondUnderscoreIndex - $firstUnderscoreIndex - 1);
    echo $result; // Output: 75
} else {
    echo "Underscore characters not found.";
}



?>
  
</body>
</html>