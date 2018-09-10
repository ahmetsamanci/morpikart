<?php
	 session_start();
	 require 'includes/lang.php';
	 
	 try 
	 {
	     $db = new PDO("mysql:host=176.53.36.2;dbname=rodosbil_demo;charset=utf8", "rodosbil_webmast", "crea2033");
	 } 
	 catch ( PDOException $e ){
	 	 print $e->getMessage();
	 }
     
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     function TL($pay){
		 $total = number_format($pay, 2, ',', '.');
		 return $total;
	 }
	 
	 require 'includes/settings.php';
	 
?>