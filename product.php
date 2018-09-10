<?php require'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<?php
    $pageUrl = "product.php";
    
    // Filtreler
    require 'includes/filters.php';
?>
<body class="animsition">
	<!-- Header -->
<?php require'includes/bar.php'; ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			<?=$dil["sayfalar_shop"]?>
		</h2>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							<?=$dil["title_kategori"]?>
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php?category=0" class="s-text13 active1">
								    <?php
                                         if($_SESSION["dil"] != "en")
                                         {
                                            echo 'Hepsi';
                                         }
                                         else
                                         {
                                            echo 'All';
                                         }
                                    ?>
								</a>
							</li>
                            <?php
                            $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() )
                                 foreach( $query as $row )
                                 {
                                     echo '
                                     <li class="p-t-4">
    								 <a href="product.php?category='.$row["id"].'" class="s-text13 active1'; if($_SESSION["filterCategory"] == $row["id"]){echo ' catactive';} echo '">';
                                     
                                     if($_SESSION["dil"] != "en")
                                     {
                                         echo $row['categori_title'];
                                     }
                                     else
                                     {
                                         echo $row['categori_title_en'];
                                     }
                                     
                                     echo '</a></li>';
                                 }
                            ?>
						</ul>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="<?=$dil["text_arama"]?>">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
                    
                    <div class="leftbar p-r-20 p-r-0-sm m-t-50">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							<?=$dil["title_filtre"]?>
						</h4>

						<ul class="p-b-54">
					    <?php
                             $filterCount = 0;
                             if($_SESSION["filterCategory"] != "")
                             {
                                $filterCount++;
                                echo '<li class="p-t-4" id="filter">';
                                if($_SESSION["dil"] != "en")
                                {
                                    echo $_SESSION["filterCatTR"];
                                }
                                else
                                {
                                    echo $_SESSION["filterCatEN"];
                                }
                                
                                echo '</li>';
                             }
                             
                             if($_SESSION["filterRank"] != "")
                             {
                                $filterCount++;
                                
                                if($_SESSION["dil"] != "en")
                                {
                                    echo $ranks[$_SESSION["filterRank"] - 1];
                                }
                                else
                                {
                                    echo $ranksEn[$_SESSION["filterRank"] - 1];
                                }
                             }
                             
                             if($_SESSION["filterPrice"] != "")
                             {
                                $filterCount++;
                                echo '<li class"p-t-4">'.$priceranks[$_SESSION["filterPrice"] - 1].'</li>';
                             }
                             
                             
                             if($filterCount == 0)
                             {
                                echo '<li class="p-t-4">'.$dil["text_filtreyok"].'</li>';
                             }
                        
                        if($filterCount != "0")
                        {
                            echo '
                            <form method="POST" action="">
                                <button id="clearFilters" name="clearFilters">'.$dil["btn_filtretemizle"].'</button>
                            </form>';
                        }
                        
                        ?>
						</ul>
					</div>
				</div>
                
                
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <form method="POST" action="">
								<select class="selection-2" name="sortrank" onchange='this.form.submit()'>
									<option value="1"><?=$dil["text_siralama"]?></option>
                                    <option value="1"><?=$dil["text_akillisiralama"]?></option>
									<option value="2"><?=$dil["text_populersiralama"]?></option>
									<option value="3"><?=$dil["text_soneklenenler"]?></option>
								</select>
                            </form>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <form method="POST" action="">
								<select class="selection-2" name="sortprice" onchange='this.form.submit()'>
									<option><?=$dil["text_fiyataraligi"]?></option>
									<option value="1">50 TL</option>
									<option value="2">50 TL - 100 TL</option>
									<option value="3">100 TL - 150 TL</option>
									<option value="4">150 TL - 200 TL</option>
									<option value="5">200+ TL</option>

								</select>
                            </form>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							<!-- 186 üründen 12 ürün gösteriliyor -->
						</span>
					</div>

					<!-- Product -->
					<div class="row">
                    
                    <?php
                    
                    $query = $db->query($sorgu, PDO::FETCH_ASSOC);
                    if ( $query->rowCount() ){
                         foreach( $query as $row ){
                             echo '
                             
                             <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							 <div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative';
                                if($row['product_discount'] != "0" && $row['product_discount'] != "")
                                {
                                    echo ' block2-labelsale';
                                }
                                else
                                {
                                    $tarih1 = strtotime($row['created_at']);                                     
                                    
                                    $tarih2 = strtotime(date("Y-m-d H:i:s")); 
                                    if(($tarih2 - $tarih1) / (60*60*24) <= 7)
                                    {
                                        echo ' block2-labelnew '.($tarih2 - $tarih1) / (60*60*24). 'gün';
                                    } 
                                }
                                
                                
                                echo '" id="product-bg">
									<img src="images/products/'.$row["product_image"].'" min-height="720" alt="IMG-PRODUCT">
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?product='.$row['id'].'" class="block2-name dis-block s-text3 p-b-5">';
                                    
                                    if($_SESSION["dil"] != "en")
                                    {
                                        echo $row['product_title'];
                                    }
                                    else
                                    {
                                        echo $row['product_title_en'];
                                    }
                                    
                                    
                                    echo '</a>';
                                    
                                    if($row['product_discount'] != "" && $row['product_discount'] != "0")
                                    {
                                        echo '
                                        <span class="block2-oldprice m-text7 p-r-5">
                                        '.$row['product_price'].' TL
                                        </span>
                                        <span class="block2-newprice m-text8 p-r-5">
										<span class="total-tutar">'.$row['product_discount'].'</span> TL
									    </span>';
                                    }
                                    else
                                    {
                                        echo '
                                        <span class="block2-newprice m-text8 p-r-5">
                                        <span class="total-tutar">'.TL(TL($standardPrice)).'</span> TL
                                        </span>';
                                    }
                                    
                                    
                                    echo '
								</div>
							</div>
						</div>';
                         }
                    }
                    else
                    {
                        echo '
                        <div id="no-item">
                         <h2 class="p-t-10">Ups!</h2>
                         <p class="p-t-10">'.$dil["text_urunbulunamadi"].'</p>
                        </div>
                        ';
                    }
                         
                         
                         
                         
                    
                    ?>
                    
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
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
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>
</body>
</html>
