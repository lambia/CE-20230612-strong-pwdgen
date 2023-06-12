<?php 

function generatePassword($length, $repetition, $subset_azlower, $subset_azupper, $subset_numbers, $subset_symbols) {
    $result = "";

    $mb = true; //Se usiamo caratteri speciali come "£" oppure "è" il valore dovrà essere TRUE
    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $uppercase = strtoupper($lowercase);
    $numbers = "0123456789";
    $symbols = "!?&%$<>^+-*/()[]{}@#_=";

    //Popoliamo la lista di caratteri ammessi in base a quelli scelti dall'utente
    $allowedChar = "";
    if($subset_azlower) { $allowedChar .= $lowercase;   }
    if($subset_azupper) { $allowedChar .= $uppercase;   }
    if($subset_numbers) { $allowedChar .= $numbers;     }
    if($subset_symbols) { $allowedChar .= $symbols;     }

    //Se i filtri usati non prevedeono nessun carattere, li usiamo tutti
    if (!$allowedChar) {    $allowedChar = $lowercase . $uppercase . $numbers . $symbols; }

    //Chiamiamo il metodo che genera una stringa e la restituisce
    $result = generateString($length, $repetition, $allowedChar, $mb);

    //Convertiamo eventuali caratteri speciali
    //In HTML ad esempio "<" è l'apertura di un tag, per scrivere un "<" si usa "&lt;"
    $result = htmlspecialchars($result);

    return $result;
}

function generateString($length, $repetition, $allowedChar, $mb) {
    $result = "";

    //Una volta generata la stringa con i possibili caratteri, creiamo un array di caratteri.
    //Usando caratteri "multi-byte" come '£' oppure 'è' dovremo usare mb_str_split invece di str_split (v. $mb)
    $characters = stringToArray($allowedChar, $mb);

    //Contiamo quanti sono gli elementi degll'array di caratteri
    //con $stringa = "£"; usare strlen($stringa) restituisce 2
    //con $array = ["£"]; usare count($array) restituisce 1
    //questo perchè per £ visualizziamo UN carattere ma nella stringa ne vengono usati in realtà 2
    //creando un elemento di array per ogni carattere invece possiamo contarli facilmente
    $charNumber = count($characters);
    
    //Se non abbiamo sufficienti caratteri, la password sarà più breve
    if($charNumber < $length) {
        $length = $charNumber;
    }

    //Nel misurare la stringa dovremo usare adesso mb_strlen invece di strlen
    while(getStringLength($result, $mb) < $length) {
        $randoNum = rand(0, $charNumber-1 );
        //Recuperiamo il singolo carattere dall'array dei caratteri
        $currentChar = $characters[$randoNum];
        
        if( $repetition || !str_contains($result, $currentChar) ) {
            $result .= $currentChar;
        }
    }

    return htmlspecialchars($result);
}

//Nota, in realtà mb_strlen va bene anche per le stringhe normali, è solo un esempio
function getStringLength($stringa, $multibyte) {
    if($multibyte) {
        return mb_strlen($stringa);
    }

    //Se non entriamo nell'if (cioè $multibyte è false), allora vogliamo restituire l'altro metodo
    return strlen($stringa);
}

//Versione con ternario
function stringToArray($stringa, $multibyte) {
    return $multibyte ? mb_str_split($stringa) : str_split($stringa);
}

?>