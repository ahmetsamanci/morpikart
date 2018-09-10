<?php
require 'includes/head.php';

function strBoyut($bayt)
{
	 if($bayt < 1024)
	 {
		 return "$bytes byte";
	 }
	 else
	 {
		 $kb = $bayt / 1024;
		 if ($kb < 1024)
		 {
			 return sprintf("%01.2f", $kb)." KB";
		 }
		 else
		 {
			 $mb = $kb / 1024;
			 if($mb < 1024)
			 {
				 return sprintf("%01.2f", $mb)." MB";
			 }
			 else
			 {
				 $gb = $mb / 1024;
				 return sprintf("%01.2f", $gb)." GB"; 
			 }
		 }
	 }
}
?>
<div class="content mt-3">
 <div class="col-lg-12">
 <?php
     if(isset ($_POST["newProduct"]))
     {
        $title_tr = $_POST["title_tr"];
        $title_en = $_POST["title_en"];
        $description_tr = $_POST["description_tr"];
        $description_en = $_POST["description_en"];
        $size = "All";
        $stock = $_POST["stock"];
        $category = $_POST["category"];
        $price = "999999";
        $zero = "0";
        
        
        
        $resim_isim      = $_FILES["resim"]["name"]; 
		$resim_turu      = $_FILES["resim"]["type"]; 
		$resim_boyut_orj = $_FILES["resim"]["size"]; 
		$resim_boyut_str = strBoyut($_FILES["resim"]["size"]); 
		$resim_kaynak    = $_FILES["resim"]["tmp_name"];
		$resim_hedef     = "../images/products/";
        
         if($resim_kaynak == "")
	     {
		     echo '<div class="alert alert-danger" role="alert">Resim kaynağı bulunamadı.</div>';
         
		 }
		 elseif(($resim_turu != "image/jpeg") and ($resim_turu != "image/png") and ($resim_turu != "image/gif"))
		 { 
		     echo '<div class="alert alert-danger" role="alert">Resim uzantısı geçerli değil.</div>';
         
		 }
		 elseif($resim_boyut_orj > 15728640)
		 {
			 echo '<div class="alert alert-danger" role="alert">Resim 15 MB\'ın üzerinde</div>';
         
		 }
		 else
		 {
             $rasgele_isim = rand(1,10000);
		 	 $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $resim_isim);
		 	 $resim_isim_yeni = $rasgele_isim. "-".$resim_isim."";
             
             $query = $db->prepare("INSERT INTO products SET
             product_title = ?,
             product_description = ?,
             product_size = ?,
             product_stok = ?,
             product_category = ?,
             product_view = ?,
             product_price = ?,
             product_discount = ?,
             product_image = ?,
             product_title_en = ?,
             product_description_en = ?");
            $insert = $query->execute(array(
                $title_tr,
                $description_tr,
                $size,
                $stock,
                $category,
                $zero,
                $price,
                $zero,
                $resim_isim_yeni,
                $title_en,
                $description_en
            ));
            if ( $insert )
            {
                
              echo '
              <script type="text/javascript">
                window.location = "product-image.php?product='.$db->lastInsertId().'"
              </script>';
            }
            else
            {
              echo '
              <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                 Bilinmeyen bir sorun oluştu. Daha sonra tekrar deneyin.
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';
             }
         }
     }
 
 ?>
 <form method="post" action="" enctype="multipart/form-data">
	<div class="card">
	  <div class="card-header"><strong>Ürün</strong><small> Yeni</small></div>
	  <div class="card-body card-block">
		<div class="form-group"><label for="product" class=" form-control-label">Ürün</label><input type="text" name="title_tr" id="title" placeholder="Ürün Başlığı" class="form-control" required></div>
		<div class="form-group"><label for="product" class=" form-control-label">Ürün detayı</label><textarea name="description_tr" id="description_tr" rows="2" placeholder="Ürün detayları" class="form-control"></textarea></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürün boyutu</label><select class="form-control" name="size"><option selected>Hepsi</option></select></div>
        <div class="form-group"><label for="product" class=" form-control-label">Stok sayısı</label><input type="number" class="form-control" value="100" name="stock" required></div>
        <div class="form-group"><label for="product" class=" form-control-label">Kategori</label>
         <select class="form-control" name="category">
          <option value="" selected disabled required>Seçim yapın</option>
          <?php
             $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
             if ( $query->rowCount() ){
                 foreach( $query as $row ){
                    echo '<option value="'.$row['id'].'">'.$row['categori_title'].'</option>';
                 }
             }
          ?>
         </select>
        </div>
        <div class="form-group"><label for="product" class=" form-control-label">Resim</label><input type="file" id="file-input" name="resim" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürün<small> (İngilizce)</small></label><input type="text" name="title_en" id="title_en" placeholder="Ürün Başlığı (İngilizce)" class="form-control"></div>
		<div class="form-group"><label for="product" class=" form-control-label">Ürün detayı<small> (İngilizce)</small></label><textarea name="description_en" id="description_en" rows="2" placeholder="Ürün detayları (İngilizce)" class="form-control"></textarea></div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="newProduct">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
	  </div>
	</div>
  </form>
  
 </div>
</div>
<?php require 'includes/footer.php'; ?>