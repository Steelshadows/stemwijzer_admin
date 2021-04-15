<?php
require 'php/classes/DB_Connection.php';
$db_connection = new db_connection();
if(isset($_POST["submit"])){
    var_dump($_POST);
    $sql = "UPDATE `party` SET `name` = ? , `sumary` = ? , `mvp` = ? , `website` = ? WHERE `party`.`party_id` = ?";
    $params = [$_POST['name'],$_POST['sumary'],$_POST['mvp'],$_POST['website'],$_GET['id']];
    $db_connection->Query($sql,$params);
}  
$parties = $db_connection->fetchAllQuery("SELECT `party_id`,`name`,`sumary`,`mvp`,`website` FROM `party` WHERE `party_id` = ? ",[$_GET['id']]); 
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
        <th>id</th><th>name</th><th>sumary</th><th>mvp</th><th>website</th>
    </tr>
        <?php 
            foreach($parties as $party){
                echo "<tr>";
                echo "<td>".$party["party_id"]."</td>";
                echo "<td><input name='name' type='text' value='".$party["name"]."'></td>";
                echo "<td><input name='sumary' type='text' value='".$party["sumary"]."'></td>";
                echo "<td><input name='mvp' type='text' value='".$party["mvp"]."'></td>";
                echo "<td><input name='website' type='text' value='".$party["website"]."'></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <button type='submit' name='submit' value='submit'>submit</button>
</form>
    
</body>
</html>