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
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<!-- <div class="item-slick1 item1-slick1" style="background-image: url(images/master-slide-02.jpg);"> -->
                <?php
                $query = $db->query("SELECT * FROM sliders", PDO::FETCH_ASSOC);
                if ( $query->rowCount() ){
                     foreach( $query as $row ){
                        
                        if($_SESSION["dil"] != "en")
                        {
                            $slideTitle = $row['slider_title'];
                            $slideDesc = $row['slider_description'];
                            $linkTitle = $row['slider_link_title'];
                        }
                        else
                        {
                            $slideTitle = $row['slider_title_en'];
                            $slideDesc = $row['slider_description_en'];
                            $linkTitle = $row['slider_link_title_en'];
                        }
                        
                          echo '
                          
                          <div class="item-slick1 item1-slick1" style="background-image: url(images/sliders/'.$row['slider_image'].');">
        					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
        						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
        							'.$slideTitle.'
        						</span>
        
        						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
        							'.$slideDesc.'
        						</h2>
        
        						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
        							<!-- Button -->
        							<a href="'.$row['slider_link'].'" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
        								'.$linkTitle.'
        							</a>
        						</div>
        					</div>
        				</div>
                          
                          ';
                     }
                }
                ?>

			</div>
		</div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/categories/category_country.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?category=7" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php if($_SESSION["dil"] != "en"){echo 'Ülkeler';}else{ echo 'Country & City';} ?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/categories/category_space.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?category=6" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php if($_SESSION["dil"] != "en"){echo 'Uzay';}else{ echo 'Space';} ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/categories/category_graffiti.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?category=2" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php if($_SESSION["dil"] != "en"){echo 'Graffiti';}else{ echo 'Graffıtı';} ?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/categories/category_animals.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?category=3" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php if($_SESSION["dil"] != "en"){echo 'Hayvanlar';}else{ echo 'Animals';} ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/categories/all.png" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php if($_SESSION["dil"] != "en"){echo 'Tümü';}else{ echo 'All';} ?>
							</a>
						</div>
					</div>

					<!-- block2 -->
					<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="images/icons/bg-01.jpg" alt="IMG">
					     
						 <?php
							 if(isset ($_SESSION["userid"]))
							 {
								  echo '
								 <div class="block2-content sizefull ab-t-l flex-col-c-m">
									<h4 class="m-text4 t-center w-size3 p-b-8">
										'.$dil["text_kategorilist"].'
									</h4>

									<p class="t-center w-size4">
										'.$dil["text_kategorilistaciklama"].'
									</p>

									<div class="w-size2 p-t-25">
										<!-- Button -->
										<a href="categories.php" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
											'.$dil["title_kategori"].'
										</a>
									</div>
								 </div>
								 ';
							 }
							 else
							 {
								 echo '
								 <div class="block2-content sizefull ab-t-l flex-col-c-m">
									<h4 class="m-text4 t-center w-size3 p-b-8">
										'.$dil["text_kacirmayin"].'
									</h4>

									<p class="t-center w-size4">
										'.$dil["text_kacirmayin_aciklama"].'
									</p>

									<div class="w-size2 p-t-25">
										<!-- Button -->
										<a href="login.php" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
											'.$dil["btn_girisyap"].'
										</a>
									</div>
								 </div>
								 ';
							 }
						 ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					<?=$dil["title_onecikanlar"]?>
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                
                <?php
                    $query = $db->query("SELECT * FROM products ORDER BY product_view DESC Limit 7", PDO::FETCH_ASSOC);
                    if ( $query->rowCount() ){
                        foreach( $query as $row ){
                            echo '
                            <div class="item-slick2 p-l-15 p-r-15">
        						<div class="block2">
        							<div class="block2-img wrap-pic-w of-hidden pos-relative relat-block">
        								<img src="images/products/'.$row['product_image'].'" alt="';if($_SESSION["dil"] != "en"){echo $row['product_title'];}else{echo $row['product_title_en'];} 
                                            echo '">
        							</div>
        
        							<div class="block2-txt p-t-20">
        								<a href="product-detail.php?product='.$row['id'].'" class="block2-name dis-block s-text3 p-b-5">
        									';if($_SESSION["dil"] != "en"){echo $row['product_title'];}else{echo $row['product_title_en'];} 
                                            echo '
        								</a>
        
        								<span class="block2-price m-text6 p-r-5">
        									'.TL($standardPrice).' TL
        								</span>
        							</div>
        						</div>
        					</div>
                            
                            ';
                        }
                    }
                ?>
				</div>
			</div>

		</div>
	</section>

<?php
    $monthitemTitle = "";
    $montitemLink = "";
    $monthImage = "";

    $query = $db->query("SELECT * FROM products ORDER BY product_view ASC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        if($_SESSION["dil"] != "en")
        {
            $monthitemTitle = $query['product_title'];
        }
        else
        {
            $monthitemTitle = $query['product_title_en'];
        }
        $montitemLink = $row['id'];
        $monthImage = $row['product_image'];
    }
?>

	<!-- Banner2 -->
	<section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="images/products/<?=$monthImage?>" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								<?=$dil["text_ayinurunu"]?>
							</span>

							<h3 class="l-text1 fs-35-sm">
								<?=$monthitemTitle?>
							</h3>

							<a href="product-detail.php?product=<?=$montitemLink?>" class="s-text4 hov2 p-t-20 ">
								<?=$dil["text_urunugoruntule"]?>
							</a>
						</div>
					</div>
				</div>
                
<?php
    $randItem = "";
    $randItemLink = "";
    $randItemImage = "";

    $query = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        if($_SESSION["dil"] != "en")
        {
            $randItem = $query['product_title'];
        }
        else
        {
            $randItem = $query['product_title_en'];
        }
        $randItemLink = $row['id'];
        $randItemImage = $row['product_image'];
    }
?>

				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="images/products/<?=$randItemImage?>" alt="<?=$randItem?>">

						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								<?=$dil["text_encoktercihedilen"]?>
							</span>

							<h3 class="l-text1 fs-35-sm">
								<?=$randItem?>
							</h3>

							<a href="product-detail.php?product=<?=$randItemLink?>" class="s-text4 hov2 p-t-20 ">
								<?=$dil["text_urunugoruntule"]?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>
