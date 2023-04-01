


<?php

$letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
    'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z','_','a_z'];

$numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

$genChars = [];

for ($i = 0; $i < 5; $i++) {
    $randomIndex = rand(0, count($letters) - 1);
    array_push($genChars, $randomIndex);
}

print_r($genChars);


?>