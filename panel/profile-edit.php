<?php require 'includes/head.php';

$adminID = $_SESSION["adminID"];
$query = $db->query("SELECT * FROM admin WHERE id='{$adminID}'", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
	 foreach( $query as $row ){
		 $_SESSION["adminAvatar"] = $row["admin_avatar"];
	 }
}

function strBoyut($bayt) {
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
 <div class="col-md-4">
	 <div class="col-lg-12">
		<div class="card">
		  <div class="card-header">
			<strong>Şifre</strong> Değiştir
		  </div> 
		  <div class="card-body card-block">
			<form action="" method="post" class="form-horizontal">
			<div class="alert alert-warning" role="alert">Tekrar giriş gerektirir.</div>
			  <div class="row form-group">
				<div class="col col-md-3"><label for="hf-email" class=" form-control-label">Aktif Şifre</label></div>
				<div class="col-12 col-md-9"><input type="password" id="hf-email" placeholder="Aktif Şifre" class="form-control" name="aktif_sifre"></div>
			  </div>
			  <form action="" method="post" class="form-horizontal">
			  <div class="row form-group">
				<div class="col col-md-3"><label for="hf-email" class=" form-control-label">Yeni Şifre</label></div>
				<div class="col-12 col-md-9"><input type="password" id="hf-email" placeholder="Yeni Şifre" class="form-control" name="yeni_sifre"></div>
			  </div>
			  <form action="" method="post" class="form-horizontal">
			  <div class="row form-group">
				<div class="col col-md-3"><label for="hf-email" class=" form-control-label">Yeni Şifre Tekrar</label></div>
				<div class="col-12 col-md-9"><input type="password" id="hf-email" placeholder="Yeni Şifre Tekrar" class="form-control" name="yeni_sifre_tekrar"></div>
			  </div>
			<?php
				 if(isset ($_POST["sifreDegistir"]))
				 {
					 @$as = md5($_POST["aktif_sifre"]);
					 @$ys = md5($_POST["yeni_sifre"]);
					 @$yst = md5($_POST["yeni_sifre_tekrar"]);
					 if($as != "" && $ys != "" && $yst != "")
					 {
						 if($as == $_SESSION["adminPassword"])
						 {
							 if($ys == $yst)
							 {
								 $changePassID = $_SESSION["adminID"];
								 $query = $db->prepare("UPDATE admin SET
								 admin_password = ? WHERE id = ?");
								 $update = $query->execute(array($yst,$changePassID));
								 
								 if ( $update ){
								 	 echo '<div class="alert alert-primary" role="alert">Şifre başarıyla değiştirildi. Lütfen <b>tekrar giriş yapın.</b></div>';
								 }
							 }
							 else{
								 echo '<div class="alert alert-danger" role="alert">Yeni şifreler uyuşmuyor.</div>';
							 }
						 }
						 else{
							 echo '<div class="alert alert-danger" role="alert">Aktif şifre yanlış. Lütfen şuan da kullandığınız şifre ile tekrar deneyin.</div>';
						 }
					 }
					 else{
						 echo '<div class="alert alert-danger" role="alert">Lütfen tüm formu doldurun.</div>';
					 }
				 }
			?>
		  </div>
		  <div class="card-footer">
			<button type="submit" class="btn btn-primary btn-sm" name="sifreDegistir">
			  <i class="fa fa-dot-circle-o"></i> Değiştir
			</button>
		  </div>
		 </div>
		 </form>
                    
	 </div>
 </div>
 
 <div class="col-md-4">
<div class="card">
	<div class="card-header">
		<i class="fa fa-user"></i><strong class="card-title pl-2">Avatarı</strong> Değiştir
	</div>
	<div class="card-body">
		<div class="mx-auto d-block">
		<div class="alert alert-warning" role="alert">Tekrar giriş gerektirir.</div>
			<img class="rounded-circle mx-auto d-block" src="images/avatar/<?=$adminAvatar?>">
			<h5 class="text-sm-center mt-2 mb-1"><?=$_SESSION["adminName"]?></h5>
			<div class="location text-sm-center">
			<?php
				 $units = $_SESSION["adminUnit"];
				 $unitList = explode(",",$units);
				 foreach($unitList as $list){
					 $query = $db->query("SELECT * FROM services WHERE id = '{$list}'")->fetch(PDO::FETCH_ASSOC);
					 if ( $query ){
						 echo $query['service_name'].'<br/>';
					 }
				 }?>
			</div>
		</div>
		<hr>
		<div class="card-text text-sm-center">
		<form action="" method="post" enctype="multipart/form-data" id="thisForm">
			 <div class="row form-group">
				<div class="col col-md-3"><label for="file-input" class=" form-control-label">Resim seçin</label></div>
				<div class="col-12 col-md-9">
				 <input type="file" id="file-input" name="resim" class="form-control-file"/>
				</div>
             </div>
			 <?php
					 if(isset ($_POST["resimyukle"]))
					 {
						 $resim_isim      = $_FILES["resim"]["name"]; 
						 $resim_turu      = $_FILES["resim"]["type"]; 
						 $resim_boyut_orj = $_FILES["resim"]["size"]; 
						 $resim_boyut_str = strBoyut($_FILES["resim"]["size"]); 
						 $resim_kaynak    = $_FILES["resim"]["tmp_name"]; 
						 $resim_hedef     = "images/avatar/"; 
						 
						 
						 if($resim_kaynak == "")
						 {
						     echo '<div class="alert alert-danger" role="alert">Resim kaynağı bulunamadı.</div>';
                         
						 }
						 elseif(($resim_turu != "image/jpeg") and ($resim_turu != "image/png") and ($resim_turu != "image/gif"))
						 { 
						     echo '<div class="alert alert-danger" role="alert">Resim uzantısı geçerli değil.</div>';
                         
						 }
						 elseif($resim_boyut_orj > 10240000)
						 {
							 echo '<div class="alert alert-danger" role="alert">Resim 10 MB\'ın üzerinde</div>';
                         
						 }
						 else
						 {
							 $changedAvatarID = $_SESSION["adminID"];
						 	 $rasgele_isim = rand(1,10000);
						 	 $resim_upload = move_uploaded_file($resim_kaynak,$resim_hedef.'/'.$rasgele_isim . "-" . $resim_isim);
						 	 $resim_isim_yeni = $rasgele_isim. "-".$resim_isim."";
							 
							 $query = $db->prepare("UPDATE admin SET
							 admin_avatar = :avatar
							 WHERE id = :id");
							 $update = $query->execute(array(
							 	 "avatar" => $resim_isim_yeni,
							 	 "id" => $changedAvatarID
							 ));
							 if ( $update ){
							 	 echo '<div class="alert alert-success" role="success">Profil resmi değiştirildi.</div>';
							 }
							 else
							 {
								 echo '<div class="alert alert-danger" role="alert">Bilinmeyen bir sorun oluştu.</div>';
							 }
						 }
					 }
				?>
		 
		</div>
		 <div class="card-footer">
		  <button type="submit" class="btn btn-primary btn-sm" name="resimyukle">
		   <i class="fa fa-dot-circle-o"></i> Değiştir
		  </button>
		 </div>
		 </form>
	</div>
</div>
  </div>
 
</div>
<?php require 'includes/footer.php'; ?>