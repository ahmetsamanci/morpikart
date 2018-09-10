<?php require'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<body class="animsition">
	<!-- Header -->
<?php
 require'includes/bar.php';
 if(!isset ($_SESSION["userid"]))
 {
	 echo '<script type="text/javascript">window.location = "index.php"</script>';
 }
 else
 {
	 $userID = $_SESSION["userid"];
	 $query = $db->query("SELECT * FROM users WHERE user_id = '{$userID}'")->fetch(PDO::FETCH_ASSOC);
	 if ( $query ){
		 $userPass = $query["user_password"];
		 $userCountry = $query["user_country"];
		 $userAdress = $query["user_adress"];
		 $userCity = $query["user_city"];
		 $userDistrict = $query["user_district"];
		 $userMail = $query["user_mail"];
		 $userPhone = $query["user_phone"];
		 $userDate = $query["user_date"];
 	 }
     
     if($userCountry == "" && $_SESSION["dil"] != "en")
     {
        $userCountry = "TR";
     }
 }
?>

	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
					 <form method="POST" action="">
						<h4 class="m-text26 p-b-36 p-t-15">
							 <?=$dil["title_hesapbilgi"]?>
						</h4>
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="<?=$_SESSION["userid"]?>" readonly>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phonenumber" placeholder="<?=$dil["text_telefon"]?>" value="<?=@$userPhone?>" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="E-Posta Adresiniz" value="<?=@$userMail?>" readonly>
						</div>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="phoneUpdate">
								<?=$dil["btn_kaydet"]?>
							</button>
						</div>
						 <div style="height: 15px;"></div>
					 </form>
						 <hr>
						  <div class="w-size25">
							<!-- Button -->
							<a href="changepassword.php">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 m-b-15">
								<?=$dil["btn_sifredegistir"]?>
							</button></a>
                            <a href="orders.php">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								<?=$dil["title_siparislerim"]?>
							</button></a>
						</div>
					 
					 <?php
						 
						 if(isset ($_POST["phoneUpdate"]))
						 {
							 $newUserPhone = $_POST["phonenumber"];
							 if(!empty($newUserPhone))
							 {
								 $query = $db->prepare("UPDATE users SET
								 user_phone = :newPhone
								 WHERE user_id = :user");
								 $update = $query->execute(array(
									 "newPhone" => $newUserPhone,
									 "user" => $userID
								 ));
								 if ( $update ){
									  echo '<script type="text/javascript">window.location = "profile.php"</script>';
								 }
								 else
								 {
									 echo '
									 <div class="errormessage">
									 '.$dil["text_guncelle_hata"].'
									 </div>';
								 }
							 }
						 }
					 ?>
					 
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form method="POST" action="">
						<h4 class="m-text26 p-b-36 p-t-15">
							<?=$dil["title_adresbilgi"]?>
						</h4>
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="country" placeholder="<?=$dil["text_ulke"]?>" value="<?=@$userCountry?>" list="countries" required>
							<?php include("includes/countries.php"); ?>
							
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="<?=$dil["text_sehir"]?>" value="<?=@$userCity?>" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="district" placeholder="<?=$dil["text_ilce"]?>" value="<?=@$userDistrict?>" required>
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="<?=$dil["login_adres"]?>" required><?=@$userAdress?></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="addressUpdate" type="submit">
								<?=$dil["btn_kaydet"]?>
							</button>
						</div>
						
						<?php
						 
						 if(isset ($_POST["addressUpdate"]))
						 {
							 $newCity = $_POST["city"];
							 $newDistrict = $_POST["district"];
							 $newAddress = $_POST["address"];
							 echo $newCountry = $_POST["country"];
							 if(!empty($newCity))
							 {
								 $query = $db->prepare("UPDATE users SET
								 user_country =:newCountry,
								 user_adress = :newAdress,
								 user_city = :newCity,
								 user_district = :newDist
								 WHERE user_id = :user");
								 $update = $query->execute(array(
									 "newCountry" => $newCountry,
									 "newAdress" => $newAddress,
									 "newCity" => $newCity,
									 "newDist" => $newDistrict,
									 "user" => $userID
								 ));
								 if ( $update ){
									  echo '<script type="text/javascript">window.location = "profile.php"</script>';
								 }
								 else
								 {
									 echo '
									 <div class="errormessage">
									 '.$dil["text_guncelle_hata"].'
									 </div>';
								 }
							 }
						 }
					 ?>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>