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
     if(isset ($_POST["newSlider"]))
     {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $butontitle = $_POST["butontitle"];
        $butonlink = $_POST["butonlink"];
        $created = $_SESSION["adminName"];
        
        $resim_isim      = $_FILES["resim"]["name"]; 
		$resim_turu      = $_FILES["resim"]["type"]; 
		$resim_boyut_orj = $_FILES["resim"]["size"]; 
		$resim_boyut_str = strBoyut($_FILES["resim"]["size"]); 
		$resim_kaynak    = $_FILES["resim"]["tmp_name"];
		$resim_hedef     = "../images/sliders/";
        
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
             
             $query = $db->prepare("INSERT INTO sliders SET
             slider_title = ?,
             slider_image = ?,
             slider_description = ?,
             slider_link_title = ?,
             slider_link = ?,
             slider_created = ?");
            $insert = $query->execute(array(
                $title,$resim_isim_yeni,$description,$butontitle,$butonlink,$created
            ));
            if ( $insert )
            {
              echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$title.' başlıklı slider eklendi.
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
	  <div class="card-header"><strong>Slider</strong><small> Yeni</small></div>
	  <div class="card-body card-block">
		<div class="form-group"><label for="service" class=" form-control-label">Başlık</label><input type="text" name="title" id="service" placeholder="Slider Başlığı" class="form-control"></div>
		<div class="form-group"><label for="description" class=" form-control-label">Resim</label><input type="file" id="file-input" name="resim" class="form-control-file"/></div>
		<div class="form-group"><label for="explanation" class=" form-control-label">Açıklama</label><textarea name="description" id="textarea-input" rows="2" placeholder="HTML kodları geçerli" class="form-control"></textarea></div>
		<div class="form-group"><label for="icon" class=" form-control-label">Buton Başlığı</label><input type="text" name="butontitle" id="icon" placeholder="Buton üzerinde görünecek başlık" class="form-control"></div>
		<div class="form-group"><label for="image" class=" form-control-label">Buton Adresi</label><input type="text" name="butonlink" id="image" placeholder="Adres" class="form-control"></div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="newSlider">
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