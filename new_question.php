<?php
require 'php/classes/DB_Connection.php';
$db_connection = new db_connection();
if(isset($_POST["submit"])){
    //var_dump($_POST);
    $sql = "INSERT INTO `question` (`question`) VALUES ( ? )";
    $params = [$_POST['question']];
    $db_connection->Query($sql,$params);
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>stemwijzer admin</title>
</head>

<body>
<script src="js/data_functions.js"></script>
<form method="post">
    <table style="width:100%">
    <tr>
        <th>question</th>
    </tr>
       
        <tr>
        <td><input style='width:100%;' name='question' type='text' value=''></td>
        </tr>
            
        
    </table>
    <button type='submit' name='submit' value='submit'>submit</button>
</form>
    
</body>
</html>