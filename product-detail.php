<?php require'includes/config.php'; ?>
<?php require'includes/product.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<body class="animsition">
	<!-- Header -->
<?php require'includes/bar.php'; ?>
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.php" class="s-text16">
			<?=$dil["menu_anasayfa"]?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.php" class="s-text16">
			<?=$dil["menu_magaza"]?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.php?category=<?=$category?>" class="s-text16">
			<?=$categoryName?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?=$title?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3" id="canvas">
                    
						<div class="item-slick3" data-thumb="images/thumb-item-01.png">
                        <div id="deneme">
							<div class="wrap-pic-w">
								<img src="images/products/<?=$image?>" class="solo">
							</div>
                        </div>
						</div>

						<div class="item-slick3" data-thumb="images/thumb-item-02.png">
							<div class="wrap-pic-w">
								 <img src="images/products/<?=$image_uclu?>" class="solo">
							</div>
						</div>

						<div class="item-slick3" data-thumb="images/thumb-item-03.png">
							<div class="wrap-pic-w">
								 <img src="images/products/<?=$image_cercevetek?>" class="solo">
							</div>
						</div>
						
						<div class="item-slick3" data-thumb="images/thumb-item-06.png">
							<div class="wrap-pic-w">
                                <img src="images/products/<?=$image_besli?>" class="solo">
                            </div>
						</div>
						
						<div class="item-slick3" data-thumb="images/thumb-item-08.png">
							<div class="wrap-pic-w">
								<img src="images/products/<?=$image_genisuclu?>" class="solo">
							</div>
						</div>
                        
                        <div class="item-slick3" data-thumb="images/thumb-item-09.png">
							<div class="wrap-pic-w">
                                <img src="images/products/<?=$image_uclukare?>" class="solo">
                            </div>
						</div>
                        
                        <div class="item-slick3" data-thumb="images/thumb-item-10.png">
							<div class="wrap-pic-w">
                                <img src="images/products/<?=$image_tekdikey?>" class="solo">
                            </div>
						</div>
                        
                        <div class="item-slick3" data-thumb="images/thumb-item-11.png">
							<div class="wrap-pic-w">
                                <img src="images/products/<?=$image_altilikare?>" class="solo">
                            </div>
						</div>
                        
                        <div class="item-slick3" data-thumb="images/thumb-item-12.png">
							<div class="wrap-pic-w">
								 <img src="images/products/<?=$image_siralibesli?>" class="solo">
							</div>
						</div>
						
						<div class="item-slick3" data-thumb="images/thumb-item-13.png">
							<div class="wrap-pic-w">
                                <img src="images/products/<?=$image_sekizli?>" class="solo">
                            </div>
						</div>

						<div class="item-slick3" data-thumb="images/thumb-item-14.png">
							<div class="wrap-pic-w">
								<img src="images/products/<?=$image_ikili?>" class="solo">
							</div>
						</div>
					</div>
				</div>
                
                <div class="product-down">
                 <img src="images/arrow-down-b.png" alt="<?=$dil["text_kaydir"]?>" title="<?=$dil["text_kaydir"]?>">
                </div>
                
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?=$title?>
				</h4>

              <!-- Fiyatlar -->
				<span class="m-text17 product-totals totalSolo">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                <span class="m-text17 product-totals totalThree">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                 <span class="m-text17 product-totals totalFrame">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                 <span class="m-text17 product-totals totalFive">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                <span class="m-text17 product-totals totalWideThree">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                <span class="m-text17 product-totals totalSquareThree">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                 <span class="m-text17 product-totals totalVertical">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                 <span class="m-text17 product-totals totalSix">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                <span class="m-text17 product-totals totalInLineFive">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                 <span class="m-text17 product-totals totalEight">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                <span class="m-text17 product-totals totalTwo">
					<span class="nt"><?=TL($price)?></span> TL
				</span>
                
                
              <!-- Fiyatlar Bitiş -->

				<p class="s-text8 p-t-10">
				 <?=$catDescription?>
                </p>
                
				<div class="p-t-33 p-b-60">
				
					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center"> 
							<?=$dil["text_boyut"]?>
						</div>
						
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="sizeSelection" name="size" id="sizeSelection">
                             <option><?=$dil["text_boyutsec"]?></option>
                             
                            </select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="addcart">
									<?=$dil["btn_sepeteekle"]?>
								</button>
							</div>
						</div>
					</div>
				</div>
                
                <!-- Ek Açıklama
				<div class="p-b-45">
					<span class="s-text8 m-r-35">Ürün Detay Bilgileri</span>
					<span class="s-text8">Ürün Sahibi Bilgileri</span>
				</div> -->

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?=$dil["text_aciklama"]?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?=$description?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?=$dil["title_iptal"]?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?=$dil["text_kargo"]?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					<?=$dil["title_benzerurunler"]?>
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                
                <?php
                
                $query = $db->query("select * from products where product_category='{$category}' LIMIT 10", PDO::FETCH_ASSOC);
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

									<div class="block2-overlay trans-0-4">
										
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?product='.$row['id'].'" class="dis-block s-text3 p-b-5">';
                                    
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
										<span>'.$row['product_discount'].'</span> TL
									    </span>';
                                    }
                                    else
                                    {
                                        echo '
                                        <span class="block2-newprice m-text8 p-r-5">
                                        <span>'.TL($standardPrice).'</span> TL
                                        </span>';
                                    }
                                    
                                    
                                    echo '
								</div>
							</div>
						</div>';
                         }
                    }
                
                ?>
				</div>
			</div>

		</div>
	</section>
	
<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>
<script type="text/javascript">
		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
                var userip = $("#session_ip").val();
                var userid = $("#session_user").val();
                var userlang = $("#session_lang").val();
                var productsize = $('#sizeSelection').find(":selected").text();
                var carttotal = $("#sizeSelection").val();
                var product = $('#sizeSelection').find(":selected").text();
                var productID = $("#product_id").val();
                
                var backmess = "";
                
                if(userlang == "tr")
                {
                    backmess = "sepete eklendi!";
                }
                else
                {
                    backmess = "is added to cart!";
                }
                
                $.ajax({
                    type:"POST",
                    url: "includes/addcart.php",
                    data: {"ip": userip, "user": userid, "product": productID, "size": productsize, "piece": carttotal, "total": carttotal, "lang": userlang},            
                    success: function(x){
                        if(x == "ok")
                        {
                            swal(nameProduct, "sepete eklendi !", "success");
                        }
						else if(x == "hata")
                        {
							swal(nameProduct, "bilinmeyen hata!" + x, "warning");					
						}
                        else if(x == "deger alinamadi")
                        {
							swal(nameProduct, "deger alinamadi!", "warning");					
						}
                        else
                        {
                            swal(nameProduct, x, "warning");
                        }
                    }
                });
                
				swal(nameProduct, backmess, "success");
                var CartCountInc = $(".header-icons-noti").html();
                CartCountInc = $.trim(CartCountInc);
                CartCountInc++;
                $(".header-icons-noti").html(CartCountInc);
			});
		});
        
        
        
        $(".totalSolo").show();
        var ilce = "totalSolo";
                $('#sizeSelection').html("");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
        
        
        $("document").ready(function() {
            
            $("#totalSolo").click(function() {
                $(".totalSolo").delay(300).fadeIn();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalSolo";
                $('#sizeSelection').html("");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
                
            })
            
            $("#totalThree").click(function() {
                
                $(".totalSolo").fadeOut();
                $(".totalThree").delay(300).fadeIn();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalThree";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
                
            })
            
            $("#totalFrame").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").delay(300).fadeIn();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalFrame";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalFive").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").delay(300).fadeIn();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalFive";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalWideThree").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").delay(300).fadeIn();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalWideThree";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalSquareThree").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").delay(300).fadeIn();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalSquareThree";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalVertical").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").delay(300).fadeIn();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalVertical";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalSix").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").delay(300).fadeIn();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalSix";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalInLineFive").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").delay(300).fadeIn();
                $(".totalEight").fadeOut();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalInLineFive";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalEight").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").delay(300).fadeIn();
                $(".totalTwo").fadeOut();
                
                var ilce = "totalEight";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });
            })
            
            $("#totalTwo").click(function() {
                $(".totalSolo").fadeOut();
                $(".totalThree").fadeOut();
                $(".totalFrame").fadeOut();
                $(".totalFive").fadeOut();
                $(".totalWideThree").fadeOut();
                $(".totalSquareThree").fadeOut();
                $(".totalVertical").fadeOut();
                $(".totalSix").fadeOut();
                $(".totalInLineFive").fadeOut();
                $(".totalEight").fadeOut();
                $(".totalTwo").delay(300).fadeIn();
                
                var ilce = "totalTwo";
                $('#sizeSelection').html("");
                $('#sizeSelection').html("Seçim yapın");
                $.ajax({
                    type:'POST',
                    url:'includes/chartdata.php',
                    data:'ilce='+ilce,
                    success: function(msg){
                        $('#sizeSelection').html(msg);
                    }
                });

            })
            
            
            $("#sizeSelection").change(function(){
                var Secilen = $("#sizeSelection").val();
                $(".nt").html("");
                $(".nt").html(Secilen+".00");
            })
        })
        
</script>


    
<input type="hidden" value="<?=$_SESSION["dil"]?>" id="session_lang"/>
<input type="hidden" value="<?=GetIp()?>" id="session_ip"/>
<input type="hidden" value="<?php if(empty($_SESSION["userid"])){echo 'Visitor';}else{echo $_SESSION['adminid'];}?>" id="session_user"/>
<input type="hidden" value="<?=$_GET["product"]?>" id="product_id"/>
</body>
</html>