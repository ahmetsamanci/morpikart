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
     if(isset ($_POST["newCat"]))
     {
        $title_tr = $_POST["cat_title_tr"];
        $title_en = $_POST["cat_title_en"];
        $desc_tr = $_POST["cat_desc_tr"];
        $desc_en = $_POST["cat_desc_en"];
        
        $resim_isim      = $_FILES["resim"]["name"]; 
		$resim_turu      = $_FILES["resim"]["type"]; 
		$resim_boyut_orj = $_FILES["resim"]["size"]; 
		$resim_boyut_str = strBoyut($_FILES["resim"]["size"]); 
		$resim_kaynak    = $_FILES["resim"]["tmp_name"];
		$resim_hedef     = "../images/categories/";
        
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
             
             $query = $db->prepare("INSERT INTO categories SET
             categori_title = ?,
             categori_image = ?,
             categori_description = ?,
             categori_title_en = ?,
             categori_description_en = ?");
            $insert = $query->execute(array(
                $title_tr,$resim_isim_yeni,$desc_tr,$title_en,$desc_en
            ));
            if ( $insert )
            {
              $category_id = $db->lastInsertId();
              echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$title_tr.' başlıklı kategori eklendi.
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';              
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
	  <div class="card-header"><strong>Kategori</strong><small> Yeni</small></div>
	  <div class="card-body card-block">
		<div class="form-group"><label for="categori" class=" form-control-label">Kategori Başlığı</label><input type="text" name="cat_title_tr" id="service" placeholder="Bülten Başlığı" class="form-control" required></div>
		<div class="form-group"><label for="image" class=" form-control-label">Kategori Resmi <small>720x660</small></label><input type="file" id="file-input" name="resim" class="form-control-file"/></div>
		<div class="form-group"><label for="explanation" class=" form-control-label">Açıklama</label><textarea name="cat_desc_tr" id="textarea-input" rows="2" placeholder="Kategori Açıklaması" class="form-control" required></textarea></div>
	  </div>
      </div>
      <div class="card">
       <div class="card-header"><strong>Çeviri</strong> <small>İngilizce</small></div>
       <div class="card-body card-block">
        <div class="form-group"><label for="categori" class=" form-control-label">Kategori Başlığı <small>İngilizce</small></label><input type="text" name="cat_title_en" id="input" placeholder="Bülten Başlığı" class="form-control"></div>
        <div class="form-group"><label for="explanation" class=" form-control-label">Açıklama <small>İngilizce</small></label><textarea name="cat_desc_en" id="textarea-input" rows="2" placeholder="Kategori Açıklaması" class="form-control"></textarea></div>
        
        
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="newCat">
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