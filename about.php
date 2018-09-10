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
			<?=$dil["sayfalar_about"]?>
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="images/deryaozalit.jpg" alt="<?=$settings[0]['setting_key']?>" title="<?=$settings[0]['setting_key']?>">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						<?=$dil["title_hikayemiz"]?>
					</h3>

					<p class="p-b-28">
						<?=$settings[2]['setting_key']?>
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10">
						<p class="p-b-11">
                            Derya Ozalit ‘i kendi sektöründe öne çıkaran şüphesiz A’ dan Z’ye hizmet
                            anlayışıdır. Bu anlayış fikir / tasarım aşamasıyla başlar, 
                            Kurumsal Kimlik, Stand, Dijital Baskı, Roll-Up, Display Hizmetler, 
                            Matbu, Kırtasiye ‘ye varana dek hizmetinizi / ürününüzü farkettirerek 
                            satılmasını sağlayan tüm unsurları içerir.
                        </p>

						<span class="s-text7">
							- <?=$settings[0]['setting_key']?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>