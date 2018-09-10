<?php 

require 'includes/head.php';

$bidIP = $_GET["Bid"];

$query = $db->query("SELECT * FROM offers WHERE id='{$bidIP}'", PDO::FETCH_ASSOC);

if ( $query->rowCount() ){

	 foreach( $query as $row ){

	   $workTitle = $row['work_title'];
       $name = $row['customer_name'];
       $phone = $row["customer_phone"];
       $mail = $row['customer_mail'];
       $degree = $row['customer_degree'];
       $company = $row['customer_company'];
       $website = $row['customer_website'];
       $work_type = $row['customer_work_type'];
       $ip = $row['customer_ip'];
       $message = $row['customer_message'];
       $statu = $row['customer_statu'];
       $bid = $row['customer_bid'];
       $date = $row['date'];

	 }

     

     $query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);

     if ( $query->rowCount() ){

        $servicesArray = array();

        foreach( $query as $row ){
            
            $newService = array($row['service_name'],$row['id']);
            array_push($servicesArray,$newService);

        }

     }
}

else{

     echo '<div class="content mt-3">

      <div class="alert alert-danger" role="alert">Geçerli kayıt bulunamadı!</div>

     </div>';

     exit;

}



if($bid != 0){

    echo '<div class="content mt-3">

      <div class="alert alert-danger" role="alert">Bu kayıt için teklif yapıldı.</div>

     </div>';

     exit;

}

?>



<style type="text/css">

 .mustericard{

    border-bottom: 1px solid rgba(0,0,0,0.1);

    padding: 8px 0px;

    min-height: 42px;

 }

 @media screen and (max-width:700px){

    .cardbaslik{background: #F7F7F7; border: 0px;}

    .mustericard{padding-left: 6px; min-height: auto;}  

 }

</style>



<div class="content mt3"><br/><br/>

 <div class="col-md-12">

  <div class="col-md-4">

   <div class="card">

    <div class="card-header">

        <strong class="card-title">Müşteri Bilgileri</strong>

    </div>

    <div class="card-body">

        <div class="col-md-6 mustericard cardbaslik">Müşteri Adı</div>

        <div class="col-md-6 mustericard"><?=$name?></div>

        <div class="col-md-6 mustericard cardbaslik">Şirket</div>

        <div class="col-md-6 mustericard"><?php if($company != "0"){echo $company;}else{echo 'Bireysel';}?></div>

        <div class="col-md-6 mustericard cardbaslik">Ünvan</div>

        <div class="col-md-6 mustericard"><?=$degree?></div>

        <div class="col-md-6 mustericard cardbaslik">Web Site</div>

        <div class="col-md-6 mustericard"><?php if($website != "")echo '<a href="'.$website.'">'.$website.'</a>';?></div>

        <div class="col-md-6 mustericard cardbaslik">Hizmet</div>

        <div class="col-md-6 mustericard">
        <?php
            $sayi = count($servicesArray);
            for($sayac = 0; $sayac<=$sayi; $sayac++)
            {
                if($workTitle == $servicesArray[$sayac][1]) 
                 echo $servicesArray[$sayac][0];
            }
        ?>
        </div>

        <div class="col-md-6 mustericard cardbaslik">Tür</div>

        <div class="col-md-6 mustericard">
        <?php

        $query = $db->query("SELECT * FROM service_types WHERE service_id = '{$workTitle}' and id='{$work_type}'")->fetch(PDO::FETCH_ASSOC);
        if ( $query ){
            echo $query['type_name'];
        }
        else{
            echo 'Geçerli tür yok';
        }
        
        ?></div>

        <div class="col-md-6 mustericard cardbaslik">IP Adresi</div>

        <div class="col-md-6 mustericard"><?=$ip?></div>

        <div class="col-md-6 mustericard cardbaslik" style="border: 0px;">Tarih</div>

        <div class="col-md-6 mustericard" style="border: 0px;"><?=$date?></div>

    </div>

   </div>

   

   <div class="card">

    <div class="card-header">

        <strong class="card-title">İletişim Bilgileri</strong>

    </div>

    <div class="card-body">

        <div class="col-md-6 mustericard cardbaslik">Telefon</div>

        <div class="col-md-6 mustericard"><?=$phone?></div>

        <div class="col-md-6 mustericard cardbaslik">E-Posta</div>

        <div class="col-md-6 mustericard"><?=$mail?></div>

    </div>

   </div>

   

   <div class="card">

    <div class="card-header">

        <strong class="card-title">İşlemler</strong>

    </div>

    <div class="card-body">

      <a href="#"><button class="btn btn-primary">Dönüş Yapıldı</button></a>

      <a href="#"><button class="btn btn-success">İş Oluştur</button></a>

      <a href="#"><button class="btn btn-danger">Olumsuz</button></a>

    </div>

   </div>

   

  </div>

  

  

  <div class="col-md-8">

   <div class="card">

    <div class="card-header">

        <strong class="card-title">Müşteri Mesajı</strong>

    </div>

    <div class="card-body">

        <p class="card-text"><?php if($message != ""){echo $message;}else{echo 'Müşterinin bir mesaj yok';} ?></p>

    </div>

   </div>

  </div>

  

 </div>

</div>





<?php require 'includes/footer.php'; ?>