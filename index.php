<?php
require 'php/classes/DB_Connection.php';
$db_connection = new db_connection();

$parties = $db_connection->fetchAllQuery("SELECT `party_id`,`name`,`sumary`,`mvp`,`website` FROM `party`");   
$questions = $db_connection->fetchAllQuery("SELECT `question_id`,`question` FROM `question`");   
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
<table style="width:100%">
    <tr>
        <th>id</th><th></th><th>name</th><th>sumary</th><th>mvp</th><th>website</th>
    </tr>
    <?php 
        foreach($parties as $party){
            echo "<tr>";
            echo "<td>".$party["party_id"]."</td>";
            echo "<td> <a href='edit_party.php?id=".$party["party_id"]."'>&#9998</a> </td>";
            echo "<td>".$party["name"]."</td>";
            echo "<td>".$party["sumary"]."</td>";
            echo "<td>".$party["mvp"]."</td>";
            echo "<td>".$party["website"]."</td>";
            echo "</tr>";
        }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td><a href='new_party.php'>add new party</a> </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<table style="width:100%">
  <tr>
    <th>id</th><th></th><th>question</th>
  </tr>
    <?php 
        foreach($questions as $question){
            echo "<tr>";
            echo "<td>".$question["question_id"]."</td>";
            echo "<td> <a href='edit_question.php?id=".$question["question_id"]."'>&#9998</a> </td>";
            echo "<td>".$question["question"]."</td>";
            echo "</tr>";
        }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td><a href='new_question.php'>add new question</a> </td>
    </tr>
</table>
</ul>
    
</body>
</html>