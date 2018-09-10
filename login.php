<?php require'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<body class="animsition">
<?php
 require'includes/bar.php';
 if(isset ($_SESSION["userid"]))
 {
	 echo '<script type="text/javascript">window.location = "index.php"</script>';
 }
?>


<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<form method="post" action="">
						<h4 class="m-text26 p-b-36 p-t-15">
							<?=$dil["btn_girisyap"]?>
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="username" placeholder="Kullanıcı Adınız" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Şifre" required>
						</div>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="signin">
								<?=$dil["btn_girisyap"]?>
							</button>
						</div>
						<?php
								 if(isset ($_POST["signin"]))
								 {
									 $username = $_POST["username"];
									 $password = $_POST["password"];
                                     $password = md5($password);
									 
									 $query = $db->query("SELECT * FROM users WHERE user_id = '{$username}' and user_password = '{$password}' ")->fetch(PDO::FETCH_ASSOC);
									 if ( $query )
									 {
										 $_SESSION["userid"]   = $username;
										 $_SESSION["usermail"] = $query['user_mail'];
										 $_SESSION["username"] = $query['user_name'];
                                         $_SESSION["userpass"] = $password;
										 
										 echo '<script type="text/javascript">
										 window.location = "index.php"
										 </script>';
									 }
									 else
									 {
										 echo '
										 <div class="errormessage">
										  '.$dil['text_yanlis_hesap'].'
										 </div>';
									 }
								 }
							?>
					</form>
				</div>

				<div class="col-md-6 p-b-30">
					<form method="post" action="">
						<h4 class="m-text26 p-b-36 p-t-15">
							<?=$dil["btn_uyeol"]?>
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="username" placeholder="<?=$dil["login_kadi"]?>" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="<?=$dil["login_sifre"]?>" required>
						</div>
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="user" placeholder="<?=$dil["login_ad"]?>" required>
						</div>
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="<?=$dil["text_eposta"]?>" required>
						</div>

						

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="newAccount">
								<?=$dil["btn_tamamla"]?>
							</button>
						</div>
						
						
						<?php
								 if(isset ($_POST["newAccount"]))
								 {
									 $username = $_POST["username"];
									 $password = md5($_POST["password"]);
									 $user = $_POST["user"];
									 $email = $_POST["email"];
									 
									 
									 $query = $db->query("SELECT * FROM users WHERE user_id = '{$username}' or user_mail = '{$email}' ")->fetch(PDO::FETCH_ASSOC);
									 if ( $query )
									 {
										 echo '
										 <div class="errormessage">
										  '.$dil['text_kullaniliyor'].'
										 </div>';
									 }
									 else
									 {
										 $query = $db->prepare("INSERT INTO users SET
										 user_id = ?,
										 user_name = ?,
										 user_password = ?,
                                         user_country = ?,
										 user_adress = ?,
										 user_city = ?,
										 user_district = ?,
										 user_mail = ?,
										 user_phone = ?");
										 $insert = $query->execute(array(
											 $username,$user,$password,"","","","",$email,""
										 ));
										 if ( $insert ){
											 $_SESSION["userid"] = $username;
											 $_SESSION["usermail"] = $email;
											 $_SESSION["username"] = $user;
                                             $_SESSION["userpass"] = $password;
                                             
                                             
											 echo '<script type="text/javascript">
											 window.location = "profile.php"
											 </script>';
										 }
										 else
										 {
											 echo '
											 <div class="errormessage">
											 '.$dil["text_bilinmeyen_hata"].'
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