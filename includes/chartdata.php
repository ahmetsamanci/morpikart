<?php
     try 
	 {
	     $db = new PDO("mysql:host=176.53.36.2;dbname=rodosbil_demo;charset=utf8", "rodosbil_webmast", "crea2033");
	 }
     
     
     
	 catch ( PDOException $e ){
	 	 print $e->getMessage();
	 }
     
     function TL($pay){
		 $total = number_format($pay, 2, ',', '.');
		 return $total;
	 }
     
     $deger = $_POST["ilce"];
     
     $query = $db->query("SELECT * FROM chart WHERE chart_id ='{$deger}'", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
        
         if($_SESSION["dil"] != "en")
         {
           echo '<option value="Boyut seçin">Boyut Seçin</option>';
         }
         else
         {
           echo '<option value="Select size">Select size</option>';
         }
        
         foreach( $query as $row ){
              if($_SESSION["dil"] != "en")
              {
                echo '<option value="'.$row['chart_total'].'">'.$row['chart_title'].' '.$row['chart_value'].'</option>';
              }
              else
              {
                echo '<option value="'.$row['chart_total'].'">'.$row['chart_title_en'].' '.$row['chart_value'].'</option>';
              }
              
         }
    }
    else{
        echo '<option>Hata</option>';
    }
?>