<?php

include './functions.php';

if (isset($_GET["pwdlen"])) {
    $pwdLength = $_GET["pwdlen"];
    $repetition = $_GET["repetition"];

    $subset_azlower = $_GET["subset_azlower"];
    $subset_azupper = $_GET["subset_azupper"];
    $subset_numbers = $_GET["subset_numbers"];
    $subset_symbols = $_GET["subset_symbols"];

    $result = generatePassword($pwdLength, $repetition, $subset_azlower, $subset_azupper, $subset_numbers, $subset_symbols);

    session_start();
    $_SESSION["password"] = $result;

    // header("Location: ./success.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong PwdGen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Strong PwdGen</h1>
            </div>

            <?php if ($result) { ?>
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <?php echo $result ?>
                    </div>
                </div>
            <?php } ?>

            <div class="col-12">
                <form action="index.php" method="get">

                    <div class="row my-2">
                        <div class="col-8">
                            <label for="pwdlen">Lunghezza della password</label>

                        </div>
                        <div class="col-4">
                            <input type="number" name="pwdlen" id="pwdlen" placeholder="Lunghezza password" min="8" max="32" value="8">
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-8">
                            <label for="repetition">Consenti ripetizioni di uno o più caratteri</label>

                        </div>
                        <div class="col-4">
                            <select name="repetition" class="form-select" aria-label="Seleziona se sarà possibile utilizzare più volte un carattere">
                                <option selected value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-8">
                        <label>Insiemi di caratteri da utilizzare</label>
                        </div>
                        <div class="col-4">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subset_azlower" value="1" checked>
                                <label class="form-check-label" for="subset_azlower">
                                    Lettere a-z
                                </label>
                            </div>
                            
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subset_azupper" value="1" checked>
                            <label class="form-check-label" for="subset_azupper">
                                Lettere A-Z
                            </label>
                            </div>
                            
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subset_numbers" value="1">
                            <label class="form-check-label" for="subset_numbers">
                                Numeri
                            </label>
                            </div>
                            
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subset_symbols" value="1">
                            <label class="form-check-label" for="subset_symbols">
                                Simboli
                            </label>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Invia</button>
                            <button type="reset" class="btn btn-secondary">Pulisci form</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>