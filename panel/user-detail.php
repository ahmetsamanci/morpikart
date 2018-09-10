<?php 

require 'includes/head.php';

$bidIP = $_GET["user"];

$query = $db->query("SELECT * FROM users WHERE id='{$bidIP}'", PDO::FETCH_ASSOC);

if ( $query->rowCount() ){

	 foreach( $query as $row ){
	   
       $orderName = $row['user_name'];
       $orderCountry = $row['user_country'];
       $orderCity = $row['user_city'];
       $orderDist = $row['user_district'];
       $orderAdres = $row['user_adress'];
       $orderMail = $row['user_mail'];
       $orderPhone = $row['user_phone'];
       $orderDate = $row['user_date'];

	 }
}

else{

     echo '<div class="content mt-3">

      <div class="alert alert-danger" role="alert">Geçerli kayıt bulunamadı!</div>

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

        <div class="col-md-6 mustericard"><?=$orderName?></div>

        <div class="col-md-6 mustericard cardbaslik">Adres</div>

        <div class="col-md-6 mustericard"><?php echo $orderAdres.' / '.$orderDist.' / '.$orderCity.' / '.$orderCountry; ?></div>

        <div class="col-md-6 mustericard cardbaslik">Tutar</div>

        <div class="col-md-6 mustericard"><?=TL($orderTotal)?> TL</div>

        <div class="col-md-6 mustericard cardbaslik">Tarih</div>

        <div class="col-md-6 mustericard"><?=$orderDate?></div>




    </div>

   </div>

   

   <div class="card">

    <div class="card-header">

        <strong class="card-title">İletişim Bilgileri</strong>

    </div>

    <div class="card-body">

        <div class="col-md-6 mustericard cardbaslik">Telefon</div>

        <div class="col-md-6 mustericard"><?=$orderPhone?></div>

        <div class="col-md-6 mustericard cardbaslik">E-Posta</div>

        <div class="col-md-6 mustericard"><?=$orderMail?></div>

    </div>

   </div>

   

   <div class="card">

    <div class="card-header">

        <strong class="card-title">İşlemler</strong>

    </div>

    <div class="card-body">

      <a href="#"><button class="btn btn-success">Kullanıcı Şifresini Sıfırla</button></a>

    </div>

   </div>

   

  </div>

  

  

  <div class="col-md-8">

   <div class="card">

    <div class="card-header">

        <strong class="card-title">Sipariş Bilgileri</strong>

    </div>

<style type="text/css">
 .orders .col-md-12{border-bottom: 1px solid rgba(0,0,0,0.2); margin-bottom: 12px; padding-bottom: 12px; padding-top: 12px;}
</style>
    <div class="card-body">

        <p class="card-text">
        <div class="row orders">
        <?php             
             $query = $db->query("SELECT * FROM orders WHERE order_mail='{$orderMail}'", PDO::FETCH_ASSOC);
             if ( $query->rowCount() ){
                
            	 foreach( $query as $row )
                 {
                   $uorID = $row['id'];
                   $uorCity = $row['order_city'];
                   $uorTotal = $row['order_total'];
                   $uorStatu = $row['order_statu'];
                   $uorDate = $row['order_date'];
                   
                   echo '<div class="col-md-12">';
                   echo '<div class="col-md-3">'.$uorCity.'</div>';
                   echo '<div class="col-md-2">'.TL($uorTotal).' TL</div>';
                   echo '<div class="col-md-2">';
                   
                   switch($uorStatu)
                   {
                    case 0: echo 'Bekliyor'; break;
                    case 1: echo 'Tamamlandı'; break;
                    case 2: echo 'Bilinmiyor'; break;
                    default: echo 'Geçersiz'; break;
                   }
                   
                   echo '</div>';
                   echo '<div class="col-md-3">'.substr($uorDate,0,10).'</div>';
                   echo '<div class="col-md-2"><a href="order-detail.php?order='.$uorID.'"><button class="btn btn-primary">Görüntüle</button></a></div>';
                   echo '</div>';
            	 }
            }
        ?>
        </div>
        </p>

    </div>

   </div>

  </div>

  

 </div>

</div>





<?php require 'includes/footer.php'; ?>