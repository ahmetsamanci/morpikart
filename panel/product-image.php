<?php
require 'includes/head.php';
$productID = $_GET["product"];
if(is_numeric($productID) && !empty($productID))
{
    $query = $db->query("SELECT * FROM products WHERE id = '{$productID}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        
    }
    else
    {
        echo '
        <div class="content mt-3">
          <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            Bu ürünün bilgileri bulunamadı. Lütfen ürünü yeniden yükleyin.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>
         </div>';
          exit();
    }
}
else
{
    echo '
    <div class="content mt-3">
      <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        Bu ürünün bilgileri bulunamadı. Lütfen ürünü yeniden yükleyin.
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
      </div>
     </div>';
      exit();
}

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
        $uclu = ""; $uclu_resim = "";
        $cercevetek = ""; $cercevetek_resim = "";
        $besli = ""; $besli_resim = "";
        $genisuclu = ""; $genisuclu_resim = ""; 
        $uclukare = ""; $uclukare_resim = "";
        $tekdikey = ""; $tekdikey_resim = "";
        $altilikare = ""; $altilikare_resim = "";
        $siralibesli = ""; $siralibesli_resim = "";
        $sekizli = ""; $sekizli_resim = "";
        $ikikare = ""; $ikikare_resim = "";
        
         
         
        
        $uclu = $_FILES["uclu"]["name"];
        $resim_kaynak    = $_FILES["uclu"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $uclu);
 	    $uclu_resim = $rasgele_isim. "-".$uclu."";
        
        $cercevetek      = $_FILES["cercevetek"]["name"];
        $resim_kaynak    = $_FILES["cercevetek"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $cercevetek);
 	    $cercevetek_resim = $rasgele_isim. "-".$cercevetek."";
         
        $besli = $_FILES["besli"]["name"]; 
        $resim_kaynak    = $_FILES["besli"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $besli);
 	    $besli_resim = $rasgele_isim. "-".$besli."";
        
        $genisuclu = $_FILES["genisuclu"]["name"];
        $resim_kaynak    = $_FILES["genisuclu"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $genisuclu);
 	    $genisuclu_resim = $rasgele_isim. "-".$genisuclu.""; 
        
        $uclukare = $_FILES["uclukare"]["name"];
        $resim_kaynak    = $_FILES["uclukare"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $uclukare);
 	    $uclukare_resim = $rasgele_isim. "-".$uclukare.""; 
         
        $tekdikey = $_FILES["tekdikey"]["name"];
        $resim_kaynak    = $_FILES["tekdikey"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $tekdikey);
 	    $tekdikey_resim = $rasgele_isim. "-".$tekdikey.""; 
         
        $altilikare = $_FILES["altilikare"]["name"]; 
        $resim_kaynak    = $_FILES["altilikare"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $altilikare);
 	    $altilikare_resim = $rasgele_isim. "-".$altilikare.""; 
        
        $siralibesli = $_FILES["siralibesli"]["name"];
        $resim_kaynak    = $_FILES["siralibesli"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $siralibesli);
 	    $siralibesli_resim = $rasgele_isim. "-".$siralibesli."";  
        
        $sekizli = $_FILES["sekizli"]["name"];
        $resim_kaynak    = $_FILES["sekizli"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $sekizli);
 	    $sekizli_resim = $rasgele_isim. "-".$sekizli."";   
        
        $ikikare = $_FILES["ikikare"]["name"];
        $resim_kaynak    = $_FILES["ikikare"]["tmp_name"];
    	$resim_hedef     = "../images/products/";
        $rasgele_isim = rand(1,99999);
 	    $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $ikikare);
 	    $ikikare_resim = $rasgele_isim. "-".$ikikare."";  
        
        
         $query = $db->prepare("INSERT INTO product_images SET
         product_id = ?,
         uclu = ?,
         cercevetek = ?,
         besli = ?,
         genisuclu = ?,
         uclukare = ?,
         tekdikey = ?,
         altilikare = ?,
         siralibesli = ?,
         sekizli = ?,
         ikikare = ?");
        $insert = $query->execute(array(
            $productID,
            $uclu_resim,
            $cercevetek_resim,
            $besli_resim,
            $genisuclu_resim,
            $uclukare_resim,
            $tekdikey_resim,
            $altilikare_resim,
            $siralibesli_resim,
            $sekizli_resim,
            $ikikare_resim
        ));
        if ( $insert )
        {
            
          echo '
          <script type="text/javascript">
            window.location = "products.php"
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
 
    
 ?>
<style type="text/css">
.card label{font-weight: bold;}
</style>
 
 <form method="post" action="" enctype="multipart/form-data">
	<div class="card">
	  <div class="card-header"><strong>Ürün</strong><small> Resimleri</small></div>
	  <div class="card-body card-block">
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün Üç Parça Resimi</label><input type="file" id="file-input" name="uclu" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün Çerçeveli Yatay Tek Parça Resimi</label><input type="file" id="file-input" name="cercevetek" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün 5 Parça Resimi</label><input type="file" id="file-input" name="besli" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün Üç Geniş Parçalı Resimi</label><input type="file" id="file-input" name="genisuclu" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün Üç Kare Parçalı Resimi</label><input type="file" id="file-input" name="uclukare" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün Çerçevesiz Dikey Tek Parça Resimi</label><input type="file" id="file-input" name="tekdikey" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün Altı Kare Parçalı Resimi</label><input type="file" id="file-input" name="altilikare" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün 5 Sıralı Parça Resimi</label><input type="file" id="file-input" name="siralibesli" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün 8 Parça Resimi</label><input type="file" id="file-input" name="sekizli" class="form-control-file"/></div>
        <div class="form-group"><label for="product" class=" form-control-label">Ürünün İki Kare Parça Resimi</label><input type="file" id="file-input" name="ikikare" class="form-control-file"/></div>
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