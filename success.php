<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your new password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>This is your new password</h1>
            </div>

            <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    <?php echo $_SESSION['password'] ?>
                </div>
            </div>

            <div class="col-12">
                <a href="./index.php">Genera nuova password</a>
            </div>
        </div>
    </div>



</body>

</html>