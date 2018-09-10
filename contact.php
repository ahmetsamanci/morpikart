<?php require'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<body class="animsition">
	<!-- Header -->
<?php require'includes/bar.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			<?=$dil["sayfalar_contact"]?>
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.9485282995156!2d29.086700315742856!3d41.02638202625881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac859088234e7%3A0xc0a531553df99232!2zQXRhdMO8cmsgTWFoYWxsZXNpLCDDh2F2dcWfYmHFn8SxIENkLiBObzoyMCwgMzQ3NjQgw5xtcmFuaXllL8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1534146156996" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form method="POST" action="">
                        
                        <?php
                             if(isset ($_POST["messageButton"]))
                             {
                                $name = $_POST["name"];
                                $number = $_POST["number"];
                                $email = $_POST["email"];
                                $message = $_POST["message"];
                                
                                $query = $db->prepare("INSERT INTO contact SET
                                contact_name = ?,
                                contact_email = ?,
                                contact_phone = ?,
                                contact_message = ?,
                                contact_view = ?,
                                contact_ip = ?");
                                $insert = $query->execute(array(
                                     $name,$email,$number,$message,"0","Yok"
                                ));
                                if ( $insert ){
                                    echo '<h2>
                                    '.$dil["text_mesajalindi"].'
                                    </h2>';
                                }
                                else
                                {
                                    echo '<div class="errormessage">
                                     '.$dil["text_bilinmeyen_hata"].'
                                    </div>';
                                }
                             }
                        ?>
                        
						<h4 class="m-text26 p-b-36 p-t-15">
							<?=$dil["title_iletisimegecin"]?>
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="<?=$dil["login_ad"]?>" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="number" placeholder="<?=$dil["text_telefon"]?>">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="<?=$dil["text_eposta"]?>" required>
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="<?=$dil["text_mesaj"]?>" required></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="messageButton">
								<?=$dil["btn_gonder"]?>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

	
<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>
<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>


