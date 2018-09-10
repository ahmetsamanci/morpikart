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
			<?=$dil["sayfalar_kategori"]?>
		</h2>
	</section>
	
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row" id="category">
            <?php
                $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                if ( $query->rowCount() ){
                     foreach( $query as $row ){
                        $catTitle = "";
                        $catDesc = "";
                        
                        if($_SESSION["dil"] != "en")
                        {
                            $catTitle = $row['categori_title'];
                            $catDesc = $row['categori_description'];
                        }
                        else
                        {
                            $catTitle = $row['categori_title_en'];
                            $catDesc = $row['categori_description_en'];
                        }
                          
                          echo '
                          <div class="col-md-4">
                            <img src="images/categories/'.$row["categori_image"].'">
                            <a href="product.php?category='.$row["id"].'"><h4>'.$catTitle.'</h4></a>
                            <p>'.$catDesc.'</p>
                          </div>';
                     }
                }
            ?>
			</div>
		</div>
	</section>
	

<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>