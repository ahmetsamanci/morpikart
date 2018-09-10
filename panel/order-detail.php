<?php 

require 'includes/head.php';

$bidIP = $_GET["order"];

$query = $db->query("SELECT * FROM orders WHERE id='{$bidIP}'", PDO::FETCH_ASSOC);

if ( $query->rowCount() ){

	 foreach( $query as $row ){

	   $orderIp = $row['order_ip'];
       $orderName = $row['order_name'];
       $orderCountry = $row['order_country'];
       $orderCity = $row['order_city'];
       $orderDist = $row['order_dist'];
       $orderAdres = $row['order_address'];
       $orderMail = $row['order_mail'];
       $orderPhone = $row['order_phone'];
       $orderProducts = $row['order_products'];
       $orderTotal = $row['order_total'];
       $orderStatu = $row['order_statu'];
       $orderDate = $row['order_date'];

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

        <div class="col-md-6 mustericard cardbaslik">Durum</div>

        <div class="col-md-6 mustericard">
        <?php
            switch($orderStatu)
            {
                case 0: echo 'Bekliyor'; break;
                case 1: echo 'Kargoda'; break;
                case 2: echo 'Bilinmiyor'; break;
            }
        ?>
        </div>

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
    
    <form method="POST" action="">
        <button class="btn btn-success" name="cargoButton" <?php if($orderStatu == 1){echo ' disabled';} ?>>Kargoya Verildi</button>

        <button class="btn btn-danger" name="hangerButton" <?php if($orderStatu == 1){echo ' disabled';} ?>>Askıda</button>
        <?php
             if(isset ($_POST["cargoButton"]))
             {
                $query = $db->prepare("UPDATE orders SET
                order_statu = :statu
                WHERE id = :id");
                $update = $query->execute(array(
                     "statu" => "1",
                     "id" => $bidIP
                ));
                if ( $update ){
                     echo 'Sipariş durumu güncellendi';
                }
             }
             
             if(isset ($_POST["hangerButton"]))
             {
                $query = $db->prepare("UPDATE orders SET
                order_statu = :statu
                WHERE id = :id");
                $update = $query->execute(array(
                     "statu" => "3",
                     "id" => $bidIP
                ));
                if ( $update ){
                     echo 'Sipariş durumu güncellendi';
                }
             }
        ?>
    </form>

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
             $products = explode(",",$orderProducts);
             foreach($products as $product)
             {
                $productTitle = "Bilinmiyor";
                $colNo = strpos($product," -");
                $productID = substr($product,0,$colNo);
                $productSize = substr($product,$colNo+2);
                
                $titleSearch = $db->query("SELECT * FROM products WHERE id='{$productID}'")->fetch(PDO::FETCH_ASSOC);
                if ( $titleSearch ){
                    $productTitle = $titleSearch['product_title'];
                }
                else{
                    $productTitle = "Ürün kaldırıldı";
                }
                
                echo '<div class="col-md-12">';
                
                
                
                echo '
                <div class="col-md-2"><a href="#">'.$productTitle.'</a></div>';
                echo '<div class="col-md-4"><button class="btn btn-primary">Görseli İndir</button></div>';
                echo '<div class="col-md-4">'.$productSize.'</div>';
                echo '</div>';
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