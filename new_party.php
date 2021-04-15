<?php
require 'php/classes/DB_Connection.php';
$db_connection = new db_connection();
if(isset($_POST["submit"])){
    //var_dump($_POST);
    $sql = "INSERT INTO `party` (`name`, `sumary`, `mvp`, `website`) VALUES (?, ?, ?, ?)";
    $params = [$_POST['name'],$_POST['sumary'],$_POST['mvp'],$_POST['website']];
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
            <th>name</th><th>sumary</th><th>mvp</th><th>website</th>
        </tr> 
        <tr>
            <td><input style="width:90%" name='name' type='text'></td>
            <td><input style="width:90%" name='sumary' type='text'></td>
            <td><input style="width:90%" name='mvp' type='text'></td>
            <td><input style="width:90%" name='website' type='text'></td>
        </tr>      
    </table>
    <button type='submit' name='submit' value='submit'>submit</button>
</form>
    
</body>
</html>