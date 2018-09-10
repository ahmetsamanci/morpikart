<?php 
require "includes/config.php";
$statu = 1;
$id = $_POST["deger"];

$query = $db->prepare("UPDATE todo SET
do_statu = ?
WHERE id = ?");
$insert = $query->execute(array($statu,$id));
if ( $insert ){
    echo 'ok';
}
else
{
    echo 'hata';
}
?>
