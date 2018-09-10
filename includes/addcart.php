<?php
     try 
	 {
	     $db = new PDO("mysql:host=176.53.36.2;dbname=rodosbil_demo;charset=utf8", "rodosbil_webmast", "crea2033");
	 } 
	 catch ( PDOException $e ){
	 	 print $e->getMessage();
	 }
     
     $ip = $_POST["ip"];    
     $user = $_POST["user"];    
     $product = $_POST["product"]; 
     $size = $_POST["size"];    
     $piece = $_POST["piece"];   
     $total = $_POST["total"];   
     $lang = $_POST["lang"];    



     

     
     if(empty($product))
     {
        echo 'deger alinamadi - ';
        if($ip != "" && $lang != "" && $user != "")
        {
            echo 'diğer değerlerde';
        }
        else
        {
            echo 'diğer değerler alındı.';
        }
     }
     elseif(!is_numeric($product))
     {
        echo 'deger sayisal degil';
     }
     else
     {
         $query = $db->prepare("INSERT INTO cart SET
         cart_ip = ?,
         cart_user = ?,
         cart_product = ?,
         cart_product_size = ?,
         cart_piece = ?,
         cart_total = ?,
         cart_lang = ?");
         $insert = $query->execute(array(
              $ip,$user,$product,$size,$piece,$total,$lang
         ));
         if ( $insert )
         {
             echo 'ok';
         }
         else
         {
            if($lang != "en")
            {
                echo 'Bilinmeyen bir hata oluştu, lütfen daha sonra tekrar deneyin.';
            }
            else
            {
                echo 'An unknown error has occurred, please try again later.';
            }
         }
     }
     
     
?>