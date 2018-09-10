<?php require 'includes/head.php'; ?>
<div class="content mt-3">
 <div class="col-lg-12">
 <?php
 
 $updatedAdmin = $_SESSION["adminName"];
 
 // Notice 
 
 if(!empty($pageSettings[17]['setting_key']))
 {
    $notice = $pageSettings[17]['setting_key'];
    
    $notices = explode(")",$notice);
    
    $topNoticeTR = substr($notices[0],3);
    $topNoticeEN = substr($notices[1],4);
    
    
    
 }
 
 // Notice End
 
 if(isset ($_POST["settingUpdateSubmit"]))
 {
    $pName = $_POST["pName"];
    $pSlogan = $_POST["pSlogan"];
    $pAdres = $_POST["pAdres"];
    $pMail = $_POST["pMail"];
    $pTelefon = $_POST["pTelefon"];
    $pGoogleMap = $_POST["pGoogleMap"];
    $pHakkimizda = $_POST["pHakkimizda"];
    $pTanitim = $_POST["pTanitim"];
    
    $settingsDefaults = array(
        1 => $pName,
        2 => $pSlogan ,
        3 => $pHakkimizda,
        4 => $pAdres,
        5 => $pMail,
        11 => $pTanitim,
        17 => $pGoogleMap,
        18 => $pTelefon
    );    
    
    for($syc=1; $syc<=18;$syc++)
    {
        if($settingsDefaults[$syc] != "")
        {               
            $query = $db->prepare("UPDATE settings SET
    	    setting_key = ?,
            setting_updated = ?
            WHERE id = ?");
         	$update = $query->execute(
            array($settingsDefaults[$syc],$updatedAdmin,$syc));
        }
    }
    
     if ( $update ){
     echo '
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
        Genel Ayarlar güncellendi.
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
      </div>';
    }
    else{
        echo '
          <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             Bilinmeyen bir sorun oluştu. Daha sonra tekrar deneyin.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>';
    }
 }
 elseif(isset ($_POST["metaSettingUpdate"]))
 {
    $metaTags = $_POST["mTags"];
    $metaDesc = $_POST["mDescription"];
    $settingsDefaults = array(
         15 => $metaDesc,
         16 => $metaTags);
         
    for($msyc = 15; $msyc<17; $msyc++)
    {
        $query = $db->prepare("UPDATE settings SET
    	    setting_key = ?,
            setting_updated = ?
            WHERE id = ?");
            
    	$update = $query->execute(
        array($settingsDefaults[$msyc],$updatedAdmin,$msyc));
    }
    
    if ( $update ){
         echo '
          <div class="alert  alert-success alert-dismissible fade show" role="alert">
            Meta Ayarları güncellendi.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>';
    }
    else{
        echo '
          <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             Bilinmeyen bir sorun oluştu. Daha sonra tekrar deneyin.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>';
    }
         
 }
 elseif(isset ($_POST["socialSettingUpdate"]))
 {
    $facebook = $_POST["sFacebook"];
    $twitter = $_POST["sTwitter"];
    $youtube = $_POST["sYoutube"];
    $linkedin = "Kullanılmıyor";
 
    $settingsDefaults = array(7=>$facebook,8=>$twitter,9=>$youtube,10=>$linkedin);
    $settingsDefaults = str_replace(" ","",$settingsDefaults);
    trim($settingsDefaults);
         
    for($msyc = 7; $msyc<11; $msyc++)
    {
        $saveNewSocialAdress = str_replace(" ","",$settingsDefaults[$msyc]);
        $saveNewSocialAdress = trim($saveNewSocialAdress);
        
        $query = $db->prepare("UPDATE settings SET
    	    setting_key = ?,
            setting_updated = ?
            WHERE id = ?");
    	$update = $query->execute(array($saveNewSocialAdress,$updatedAdmin,$msyc));
    }
    
    if ( $update ){
         echo '
          <div class="alert  alert-success alert-dismissible fade show" role="alert">
            Genel Ayarlar güncellendi.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>';
    }
    else{
        echo '
          <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             Bilinmeyen bir sorun oluştu. Daha sonra tekrar deneyin.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>';
    }
 }
 elseif(isset ($_POST["indexTextUpdate"])){
    $gecis1 = $_POST["gecis1"];
    $gecis2 = $_POST["gecis2"];
    
    $saveNewNotice = "TR(".$gecis1.") EN(".$gecis2.")";
    
    $query = $db->prepare("UPDATE settings SET
    setting_key = :setting
    WHERE setting_title = :id");
    $update = $query->execute(array(
         "setting" => $saveNewNotice,
         "id" => "Başlık Duyurusu"
    ));
    if ( $update ){
         echo '
          <div class="alert  alert-success alert-dismissible fade show" role="alert">
            Duyuru güncellendi.
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
          </div>';
    }
    else{
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
 </div>

 <div class="col-lg-12">
	<div class="card">
	  <div class="card-header">
		<strong>Genel</strong> Ayarlar
	  </div>
	  <div class="card-body card-block">
		<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row form-group">
			<div class="col col-md-3"><label class=" form-control-label">Düzenleyen</label></div>
			<div class="col-12 col-md-9">
			  <p class="form-control-static"><?=$_SESSION["adminName"]?></p>
			</div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Sayfa adı</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" placeholder="Sayfa adı" name="pName" class="form-control" value="<?=$pageSettings[0]['setting_key'];?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Sayfa sloganı</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" placeholder="Sayfa sloganı" name="pSlogan" class="form-control" value="<?=$pageSettings[1]['setting_key'];?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Adres</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" placeholder="Tam adres" name="pAdres" class="form-control" value="<?=$pageSettings[3]['setting_key'];?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
			<div class="col-12 col-md-9"><input type="email" id="email-input" placeholder="Genel mail" name="pMail" value="<?=$pageSettings[4]['setting_key'];?>" class="form-control"></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Telefon</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" placeholder="Telefon numarası" name="pTelefon" class="form-control" value="<?=$pageSettings[16]['setting_key'];?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Harita Adresi</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" placeholder="Google Maps adresi" name="pGoogleMap" class="form-control" value="<?=$pageSettings[15]['setting_key'];?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Hakkımızda(Kısa)</label></div>
			<div class="col-12 col-md-9"><textarea id="textarea-input" rows="3" placeholder="Arama motorlarında geçerli olacak kısa açıklama" name="pHakkimizda" class="form-control"><?=$pageSettings[2]['setting_key'];?></textarea></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Hakkımızda(Uzun)</label></div>
			<div class="col-12 col-md-9"><textarea id="textarea-input" rows="10" placeholder="Şirket için genel bilgi girin. HTML geçerlidir." name="pTanitim" class="form-control"><?=$pageSettings[9]['setting_key'];?></textarea></div>
		  </div>
		  
		  <div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="settingUpdateSubmit">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
          </form>
	</div>
  </div>
</div>

<div class="col-lg-12">
	<div class="card">
	  <div class="card-header">
		<strong>Meta</strong> Ayarları
	  </div>
	  <div class="card-body card-block">
		<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Etiketler</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" name="mTags" placeholder="Meta için etiketleri virgülle ayırın" class="form-control" value="<?=$pageSettings[14]['setting_key'];?> "><small class="help-block form-text">Arama motorlarında gösterilir</small></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Açıklama</label></div>
			<div class="col-12 col-md-9"><textarea name="mDescription" id="mDescription" rows="4" placeholder="Meta için açıklama girin" class="form-control"><?=$pageSettings[13]['setting_key'];?></textarea><small class="help-block form-text">Arama motorlarında gösterilir</small></div>
		  </div>
		  
		  <div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="metaSettingUpdate">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
        </form>
	</div>
  </div>
</div>

<div class="col-lg-6">
	<div class="card">
	  <div class="card-header">
		<strong>Sosyal Medya</strong> Ayarları
	  </div>
	  <div class="card-body card-block">
		<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Facebook</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" name="sFacebook" placeholder="Facebook hesabı" class="form-control" value="<?=trim($pageSettings[5]['setting_key'])?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Twitter</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" name="sTwitter" placeholder="Twitter hesabı" class="form-control" value="<?=trim($pageSettings[6]['setting_key'])?> "></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="text-input" class=" form-control-label">Youtube</label></div>
			<div class="col-12 col-md-9"><input type="text" id="text-input" name="sYoutube" placeholder="Youtube kanalı" class="form-control" value="<?=trim($pageSettings[7]['setting_key'])?> "></div>
		  </div>
		  
		  <div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="socialSettingUpdate">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
        </form>
	</div>
  </div>
</div>

<div class="col-lg-6">
	<div class="card">
	  <div class="card-header">
		<strong>Duyuru</strong> Ayarları
	  </div>
	  <div class="card-body card-block">
		<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		  <div class="row form-group">
			<div class="col col-md-3"><label for="gecis1" class=" form-control-label">Duyuru (Türkçe)</label></div>
			<div class="col-12 col-md-9"><input type="text" id="gecis1" name="gecis1" placeholder="Türkçe Metin" class="form-control" value="<?=$topNoticeTR?>" required></div>
		  </div>
		  <div class="row form-group">
			<div class="col col-md-3"><label for="gecis2" class=" form-control-label">Duyuru (İngilizce)</label></div>
			<div class="col-12 col-md-9"><input type="text" id="gecis2" name="gecis2" placeholder="İngilizce Metin" class="form-control" value="<?=$topNoticeEN?>" required></div>
		  </div>
		  
		  <div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="indexTextUpdate">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
        </form>
	</div>
  </div>
</div>

</div>

<?php require 'includes/footer.php'; ?>