<?php 
require "includes/config.php";
$toDo = $_POST["bar"];

$query = $db->prepare("INSERT INTO todo SET
do_message = ?");
$insert = $query->execute(array($toDo));
if ( $insert ){
    $last_id = $db->lastInsertId();
}
?>
