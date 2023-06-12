<?php 

function generatePassword($length) {
    $result = "";

    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $uppercase = strtoupper($lowercase);
    $numbers = "0123456789";
    $symbol = "!?&%$<>^+-*/()[]{}@#_=";

    $allowedChar = $lowercase . $uppercase . $numbers . $symbol;

    $charNumber = strlen($allowedChar);

    for ($i=0; $i < $length; $i++) { 
        $randoNum = rand(0, $charNumber-1 );
        $currentChar = $allowedChar[$randoNum];
        $result .= $currentChar;
    }

    return htmlspecialchars($result);
}

?>