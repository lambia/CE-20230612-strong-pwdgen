<?php 
$stringa = "£èL";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multibyte Examples</title>
    <style>
        body { background: #222; color: white; font-family: sans-serif; padding: 1rem;}
        * { box-sizing: border-box; margin: 0; padding: 0;}
        h1, h2, h3 { padding-top: 1rem; padding-bottom: 0.5rem;}
    </style>
</head>
<body>
    
    <h2>Debugging</h2>

    <h3>Lunghezza stringa</h3>
    <p>Stringa: <?php echo $stringa ?></p>
    <p>Lunghezza stringa: <?php echo strlen($stringa) ?></p>
    <p>Lunghezza reale stringa: <?php echo mb_strlen($stringa) ?></p>

    <h3>Singoli caratteri</h3>
    <p>Se la stringa di 3 caratteri è lunga 5, controlliamo i 5 valori</p>
    <p>Carattere in posizione [0]: <?php echo $stringa[0] ?></p>
    <p>Carattere in posizione [1]: <?php echo $stringa[1] ?></p>
    <p>Carattere in posizione [2]: <?php echo $stringa[2] ?></p>
    <p>Carattere in posizione [3]: <?php echo $stringa[3] ?></p>
    <p>Carattere in posizione [4]: <?php echo $stringa[4] ?></p>

    <h3>Intero carattere multibyte</h3>
    <p>Stampiamo ENTRAMBI i caratteri</p>
    <p>Sterlina: <?php echo $stringa[0] . $stringa[1] ?>
    <p>"E" grave: <?php echo $stringa[2] . $stringa[3] ?>
    
    <h3>Cerco la posizione dei caratteri con strpos</h3>
    <p>Posizione £: <?php echo strpos($stringa, "£") ?> su <?php echo strlen($stringa) ?> totali</p>
    <p>Posizione è: <?php echo strpos($stringa, "è") ?> su <?php echo strlen($stringa) ?> totali</p>

    <h2>Funzioni Multibyte</h2>

    <h3>Singoli caratteri</h3>
    <?php 
        $array = mb_str_split($stringa);
        foreach($array as $i => $char) {
            echo "<p>Carattere[$i]: $char</p>";
        }
    ?>

    <h3>Cerco la posizione dei caratteri</h3>
    <p>Posizione £: <?php echo mb_strpos($stringa, $array[0]) ?> su <?php echo mb_strlen($stringa) ?> totali</p>
    <p>Posizione è: <?php echo mb_strpos($stringa, $array[1]) ?> su <?php echo mb_strlen($stringa) ?> totali</p>

</body>
</html>