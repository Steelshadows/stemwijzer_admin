<?php 
header("Content-Type: application/json");
if(isset($_GET["action"])){
    $data = json_decode(stripslashes(file_get_contents("php://input")),true);
    $funcName = $_GET["action"];    
    echo json_encode($funcName($data));
}
