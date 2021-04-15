<?php
require 'php/classes/DB_Connection.php';
$error = null;
if(isset($_COOKIE['error'])) {
    $error = $_COOKIE['error'];
   setcookie('error', null, -1);
}
$message = null;
if(isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
   setcookie('message', null, -1);
}
$db_connection = new db_connection();

if(isset($_POST['submit'])){
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>Gezondheidsmeter: login</title>
</head>
<body>
    <?php include "includes/html/navbar.php" ?>
    <?php if(isset($message)){ ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>  
    <div class="login">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <?php if($error !== null){ ?>
                <label class="form-error"><?= $error ?></label>
           <?php } ?>
            <label for="username" class="form-label">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" class="form-control">
            <label for="password_repeat" class="form-label">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-control">
            <input type="submit" value="inloggen" name="submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>