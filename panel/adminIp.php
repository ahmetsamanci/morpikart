<?php
function GetIP(){  
		 if (!empty($_SERVER['HTTP_CLIENT_IP']))  
		 {  
			 $ip=$_SERVER['HTTP_CLIENT_IP'];  
		 }  
		 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		 {  
			 $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];  
		 }  
		 else  
		 {  
			 $ip=$_SERVER['REMOTE_ADDR'];  
		 }  
		 return $ip;
	 }
     
     $ip = GetIp();
?>
<html>
<head>
 <meta charset="UTF-8"/>
 <title>Admin IP Tanımlama</title>
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <style type="text/css">
  body{background: black; color: white;}
  div{width: 600px;margin: auto; text-align: center; padding: 20px;}
  select,button{font-size: 16px;padding: 8px;width: 80%; margin-bottom: 15px;}
  button{background: blue; color: white; border: 1px solid transparent; font-weight: bold; cursor: pointer;}
  @media screen and (max-width:700px){
    div{width: 96%; padding: 2%;}
  }
 </style>
</head>
<body>

<?php 
require 'includes/config.php';
?>

<div>
 <form method="post" action="">
 <h1><?=$ip?></h1>
  <select name="admin">
   <option selected disabled>Admin seçin</option>
   <option>Sezer ÖZCAN</option>
   <option>Ümit HAS</option>
  </select><br/>
  <select name="platform">
   <option selected disabled>Platform Seçin</option>
   <option>Bilgisayar</option>
   <option>Mobil</option>
   <option>Diğer</option>
  </select><br/>
  <button type="submit" name="gonder">Kaydet</button>
  <?php
     if(isset ($_POST["gonder"]))
     {
        $platform = $_POST["platform"];
        $admin = $_POST["admin"];
        if($platform != "" && $admin != "")
        {
            $admin = $admin.' ('.$platform.')';
            $query = $db->prepare("INSERT INTO blockip SET
            block_ip = ?,
            block_owner = ?,
            block_created = ?");
            $insert = $query->execute(array(
                 $ip, $admin, "System"
            ));
            if ( $insert ){
                $last_id = $db->lastInsertId();
                echo '<script language="javascript">alert("Kayıt başarılı!")</script>';    
            }
            else{
                echo '<script language="javascript">alert("Kaydedilemedi! Tekrar deneyin")</script>';    
            }
        }
        else
        {
            echo '<script language="javascript">alert("Kaydedilmedi! Platform veya admin seçilmedi")</script>';    
        }
     }
  ?>
 </form>
</div>

</body>
</html>