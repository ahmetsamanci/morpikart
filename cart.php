<?php require'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
</head>
<body class="animsition">
<?php
     @$dp = $_GET["dp"];
     $cargo = 10.00;
     
     if($dp != "")
     {
        if(is_numeric($dp))
        {
            $query = $db->prepare("DELETE FROM cart WHERE id = :id");
            $delete = $query->execute(array(
               'id' => $dp
            ));;
        }
        echo '<script type="text/javascript"> window.location = "cart.php"</script>';
     }
?>
	<!-- Header -->
<?php require'includes/bar.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			<?=$dil["sayfalar_cart"]?>
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"><?=$dil["title_sepet_kaldir"]?></th>
							<th class="column-2"><?=$dil["title_urun"]?></th>
							<th class="column-3"><?=$dil["title_tutar"]?></th>
							<th class="column-4 p-l-50"><?=$dil["title_adet"]?></th>
							<th class="column-5"><?=$dil["title_toplam"]?></th>
						</tr>
                        
                        <?php
                             $query = $db->query("SELECT * FROM cart WHERE cart_ip='{$cartIp}'", PDO::FETCH_ASSOC);
                                 if ( $query->rowCount() )
                                 {
                                    $cartPrice = 0;
                                      foreach( $query as $row ){
                                           $cartPrice = $cartPrice + $row['cart_piece'];
                                           $cartProduct = $row["cart_product"];
                                           
                                           
                                           $productDetails = $db->query("SELECT * FROM products WHERE id = '{$cartProduct}'")->fetch(PDO::FETCH_ASSOC);
                                           if ( $productDetails ){
                                                $productImage = $productDetails["product_image"];
                                                $productTitle_tr = $productDetails["product_title"];
                                                $productTitle_en = $productDetails["product_title_en"];
                                                
                                                if($_SESSION["dil"] != "en")
                                                {
                                                    $productTitle = $productTitle_tr;
                                                }
                                                else
                                                {
                                                    $productTitle = $productTitle_en;
                                                }
                                           }
                                           
                                           echo '
                                           <tr class="table-row">
                    							<td class="column-1"><a href="cart.php?dp='.$row['id'].'">
                    								<div class="cart-img-product b-rad-4 o-f-hidden">
                                                         <img src="images/products/'.$productImage.'" alt="'.$productTitle.'" style="min-height: 50px">       
                    								</div></a>
                    							</td>
                    							<td class="column-2">'.$productTitle.'<br/>'.$row['cart_product_size'].'</td>
                    							<td class="column-3">'.TL($row['cart_piece']).' TL</td>
                    							<td class="column-4"><input class="size8 m-text18 t-center" value="1" disabled></td>
                    							<td class="column-5">'.TL($row['cart_piece']).' TL</td>
                    						</tr>
                                           ';
                                           
                                      }
                                 }
                                 else
                                 {
                                    echo '
                                    <div class="size15 trans-0-4">
                    					<a href="product.php"><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    						'.$dil["btn_alisverisedon"].'
                    					</button></a>
                    				</div>
                                    ';
                                 }
                        ?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="window.location.reload();">
						<?=$dil["btn_sepetiguncelle"]?>
					</button>
				</div>
			</div>

			<!-- Total -->
            <?php
            if($cartPrice != "0")
            {
                echo '
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
                        '.$dil["title_odeme"].'
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						'.$dil["text_geneltutar"].'
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						'.TL($cartPrice).' TL
					</span>
				</div>
				
				
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						'.$dil["text_kargoucreti"].'
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						10.00 TL
					</span>
					
					<span class="m-text22 w-size19 w-full-sm">
						'.$dil["text_geneltutar"].'
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						';
                        
                        echo TL($cartPrice+$cargo);
                        
                        
                        echo ' TL
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="pay.php"><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						'.$dil["btn_siparisgonder"].'
					</button></a>
				</div>
			</div>';
            }
            ?>
		</div>
	</section>



<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>
