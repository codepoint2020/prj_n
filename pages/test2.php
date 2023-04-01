


<?php



function filenameAppend() {

    $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
    'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z','_','Az','Ab'];

    $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9','11'];

    $genChars = [];

    for ($i = 0; $i < 5; $i++) {
        $randomIndex = rand(0, count($letters) - 1);
        array_push($genChars, $letters[$randomIndex]);
    }

    for ($i = 0; $i < 3; $i++) {
        $randomNumbers = rand(0, count($numbers) - 1);
        array_push($genChars, $numbers[$randomNumbers]);
    }


    $newFilename = implode('',$genChars);

    return $newFilename;

}

echo filenameAppend();

    








?>