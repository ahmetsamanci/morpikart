<?php require'includes/config.php'; ?>
<?php if(!isset ($_SESSION["userid"])){echo '<script type="text/javascript">window.location = "index.php"</script>';}?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<body class="animsition">
	<!-- Header -->
<?php require'includes/bar.php'; ?>

<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">
				<form method="post" action="">
					<h4 class="m-text26 p-b-36 p-t-15">
						<?=$dil["title_sifredegis"]?>
					</h4>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="oldpass" placeholder="<?=$dil["text_eskisifre"]?>" required>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="newpass" placeholder="<?=$dil["text_yenisifre"]?>" required>
					</div>

					<div class="w-size25">
						<!-- Button -->
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="changepass">
							<?=$dil["btn_kaydet"]?>
						</button>
					</div>
					<?php
							 if(isset ($_POST["changepass"]))
							 {
								 $oldpass = md5($_POST["oldpass"]);
                                 $newpass = $_POST["newpass"];
                                 
                                 if($oldpass == $_SESSION["userpass"])
                                 {
                                    if(strlen($newpass) >= 8)
                                    {
                                        $newpass = md5($newpass);
                                        $changeusername = $_SESSION["userid"];
                                        $query = $db->prepare("UPDATE users SET
                                        user_password = :password
                                        WHERE user_id = :user");
                                        $update = $query->execute(array(
                                             "password" => $newpass,
                                             "user" => $changeusername
                                        ));
                                        if ( $update ){
                                             $_SESSION["userpass"] = $newpass;
                                             echo '<script type="text/javascript">
    										 window.location = "profile.php"
    										 </script>';
                                        }
                                    }
                                    else
                                    {
                                        echo '
										 <div class="errormessage">
										  '.$dil["text_eksikarakter"].'
										 </div>';
                                    }
                                 }
                                 else
                                 {
                                    echo '
                                     <div class="errormessage">
									  '.$dil["text_eskisifreyanlis"].'
									 </div>';
                                 }
							 }
						?>
				</form>
			</div>
            <div class="col-md-6 p-b-30">
                <h4 class="m-text26 p-b-36 p-t-15">
					<?=$dil["title_dikkat"]?>
                    <p class="p-t-10 p-l-10">
                     <?=$dil["text_uyarimetni"]?>
                    </p>
				</h4>
			</div>
        </div>
    </div>
</section>
                

<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>