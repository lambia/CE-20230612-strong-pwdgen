<?php 

function generatePassword($length, $repetition, $subset_azlower, $subset_azupper, $subset_numbers, $subset_symbols) {
    $result = "";

    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $uppercase = strtoupper($lowercase);
    $numbers = "0123456789";
    $symbols = "!?&%$<>^+-*/()[]{}@#_=";

    $allowedChar = "";

    if($subset_azlower) {
        $allowedChar .= $lowercase;
    }
    if($subset_azupper) {
        $allowedChar .= $uppercase;
    }
    if($subset_numbers) {
        $allowedChar .= $numbers;
    }
    if($subset_symbols) {
        $allowedChar .= $symbols;
    }

    if ($allowedChar == "") {
        $allowedChar = $lowercase . $uppercase . $numbers . $symbols;
    }

    $charNumber = strlen($allowedChar);

    //Se non abbiamo sufficienti caratteri, la password sarà più breve
    if($charNumber < $length) {
        $length = $charNumber;
    }

    while(strlen($result) < $length) {
        $randoNum = rand(0, $charNumber-1 );
        $currentChar = $allowedChar[$randoNum];
        
        if( $repetition || !str_contains($result, $currentChar) ) {
            $result .= $currentChar;
        }
    }

    return htmlspecialchars($result);
}

?>