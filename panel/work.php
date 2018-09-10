<?php 
require 'includes/head.php';
$workIP = $_GET["Work"];
$query = $db->query("SELECT * FROM works WHERE id='{$workIP}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
	 foreach( $query as $row ){
	   $mail = $row['work_customer'];
       $customer = $row['work_customer_name'];
       $service = $row['work_service'];
       $type = $row['work_type'];
       $payment = $row['work_payment'];
       $statu = $row['work_statu']; 
       $url = $row['work_url'];
       $description = $row['work_description'];
       $company = $row['work_company'];
       $degree = $row['work_customer_degree'];
       $customer_site = $row['work_customer_site'];
       $ip = $row['work_customer_ip'];
       $phone = $row['work_customer_phone'];
       $date = $row['work_date'];
	 }
     
     $query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
     if ( $query->rowCount() ){
        $servicesArray = array();
        foreach( $query as $row ){
            array_push($servicesArray, $row['service_name']);
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
        <div class="col-md-6 mustericard"><?=$customer?></div>
        <div class="col-md-6 mustericard cardbaslik">Şirket</div>
        <div class="col-md-6 mustericard"><?=$company?></div>
        <div class="col-md-6 mustericard cardbaslik">Ünvan</div>
        <div class="col-md-6 mustericard"><?=$degree?></div>
        <div class="col-md-6 mustericard cardbaslik">IP Adresi</div>
        <div class="col-md-6 mustericard"><?=$ip?></div>
        <div class="col-md-6 mustericard cardbaslik">Web Site</div>
        <div class="col-md-6 mustericard"><?php if($customer_site != "")echo '<a href="'.$website.'">'.$website.'</a>';?></div>
        <div class="col-md-6 mustericard cardbaslik" style="border: 0px;">Tarih</div>
        <div class="col-md-6 mustericard" style="border: 0px;"><?=$date?></div>
    </div>
   </div>
   
   <div class="card">
    <div class="card-header">
        <strong class="card-title">Hizmet Detayı</strong>
    </div>
    <div class="card-body">
        <div class="col-md-6 mustericard cardbaslik">Hizmet</div>
        <div class="col-md-6 mustericard"><?php $workTitle = $service -1; echo $servicesArray[$service]; ?></div>
        <div class="col-md-6 mustericard cardbaslik">Tür</div>
        <div class="col-md-6 mustericard"><?=$type?></div>
        <div class="col-md-6 mustericard cardbaslik">Ödeme</div>
        <div class="col-md-6 mustericard"><?=$payment?> TL</div>
        <div class="col-md-6 mustericard cardbaslik">Çalışma</div>
        <div class="col-md-6 mustericard"><?=$url?></div>
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
      <a href="#"><button class="btn btn-primary">Demo Kabul Edildi</button></a>
      <a href="#"><button class="btn btn-success">İş Tamamlandı</button></a>
      <a href="#"><button class="btn btn-danger">İptal Edildi</button></a>
    </div>
   </div>
   
  </div>
  
  
  <div class="col-md-8">
   <div class="card">
    <div class="card-header">
        <strong class="card-title">Müşteri Mesajı</strong>
    </div>
    <div class="card-body">
        <p class="card-text"><?php if($description != ""){echo $description;}else{echo 'Müşterinin bir mesaj yok';} ?></p>
    </div>
   </div>
  </div>
  
 </div>
</div>


<?php require 'includes/footer.php'; ?>