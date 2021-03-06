<?php
require 'php/classes/DB_Connection.php';
$db_connection = new db_connection();
if(isset($_POST["submit"])){
    //var_dump($_POST);
    $sql = "UPDATE `question` SET `question` = ? WHERE `question`.`question_id` = ? ";
    $params = [$_POST['question'],$_GET['id']];
    $db_connection->Query($sql,$params);
}  
$parties = $db_connection->fetchAllQuery("SELECT `question_id`,`question` FROM `question` WHERE `question_id` = ? ",[$_GET['id']]); 
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
        <th>id</th><th>question</th>
    </tr>
        <?php 
            foreach($parties as $party){
                echo "<tr>";
                echo "<td>".$party["question_id"]."</td>";
                echo "<td><input style='width:100%;' name='question' type='text' value='".$party["question"]."'></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <button type='submit' name='submit' value='submit'>submit</button>
</form>
    
</body>
</html>