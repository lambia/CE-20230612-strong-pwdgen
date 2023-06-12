<?php

include './functions.php';

if (isset($_GET["pwdlen"])) {
    $pwdLength = $_GET["pwdlen"];
    
    $result = generatePassword($pwdLength);

    session_start();
    $_SESSION["password"] = $result;

    header("Location: ./success.php");
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

            <?php if($result){ ?>
            <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    <?php echo $result ?>
                </div>
            </div>
            <?php } ?>

            <div class="col-12">
                <form action="index.php" method="get">

                    <label for="pwdlen"></label>
                    <input type="number" name="pwdlen" id="pwdlen" placeholder="Lunghezza password" min="8" max="32">

                    <div id="pulsantiera" class="mt-2">
                        <button type="submit" class="btn btn-primary">Invia</button>
                        <button type="reset" class="btn btn-secondary">Pulisci form</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>