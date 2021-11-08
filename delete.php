<?php
require_once "inc/header.php";
require_once "inc/functions.php";

$input  = json_decode(file_get_contents("php://input"));
$id = filter_var($input->id,FILTER_SANITIZE_STRING);


try {
    $db = openDb();
    $query = $db->prepare("delete from item where id=(:id)");
    $query->bindValue(":id", $id,PDO::PARAM_STR);
    $query->execute();

    header("HTTP/1.1. 200 OK");
    $data = array("id" => $id);
    print json_encode($data);
}catch(PDOException $pdoex) {
    returnError($pdoex); 
}
