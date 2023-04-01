<?php
$letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
    'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

$numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
  
$genChars = [];

//   let randPassword = "";



//Function to generate 3 random letters, 3 random numbers, and 3 random symbols
function generatePassword(){
  
  for ($i = 0; $i < 5; $i++) {
    $randomIndex = rand(0, count($letters) - 1);
    array_push($genChars, $randomIndex);
  
  }

  for (let i = 0; i < 3; i++) {
    const x = Math.floor(Math.random() * numbers.length);
    genChars.push(numbers[x]);
  }

  for (let i = 0; i < 3; i++) {
    const x = Math.floor(Math.random() * symbols.length);
    genChars.push(symbols[x]);
  }


  //shuffle randomly the sequencially generated password to improve security
  $rand_filename = shuffle($genChars);
  return $rand_filename;

}