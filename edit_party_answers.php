<?php
require 'php/classes/DB_Connection.php';
$db_connection = new db_connection();
if(isset($_POST["submit"])){
    //var_dump($_POST);
    $sqlDeleteOld = "DELETE FROM `party_answers` WHERE `party_id` = ?";
    $params = [$_GET['id']];
    $db_connection->Query($sqlDeleteOld,$params);
    foreach($_POST as $key => $answer){
    
        $sqlNew = "INSERT INTO `party_answers` (`question_id`, `party_id`, `agrees`, `disagrees`) VALUES (?, ?, ?, ?)";
        $params = [$key,$_GET['id'],(($answer == "agree")?1:0),(($answer == "disagree")?1:0)];
        $db_connection->Query($sqlNew,$params);

    }
}  
$party = $db_connection->fetchAllQuery("SELECT `party_id`,`name`,`sumary`,`mvp`,`website` FROM `party` WHERE `party_id` = ? ",[$_GET['id']]); 
$party_answers = $db_connection->fetchAllQuery("SELECT `question`.`question`,`question`.`question_id`, party_answers.agrees, party_answers.disagrees FROM `question` INNER JOIN party_answers on `question`.`question_id` = `party_answers`.`question_id` WHERE party_answers.party_id = ? ",[$_GET['id']]); 

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
        <th>question</th><th>mee eens</th><th>mee on eens</th>
    </tr>
        <?php 
            foreach($party_answers as $question){
                //var_dump($question);
                echo "<tr>";
                echo "<td>".$question["question"]."</td>";
                echo "<td><input name='".$question['question_id']."' type='radio' value='agree' required ".(($question['agrees'] == 1)?"checked='True'":"")."></td>";
                echo "<td><input name='".$question['question_id']."' type='radio' value='disagree' required ".(($question['disagrees'] == 1)?"checked='True'":"")."></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <button type='submit' name='submit' value='submit'>submit</button>
</form>
    
</body>
</html>