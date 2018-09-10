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

<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
                <h2 class="m-b-10">
                    <?=$dil["title_siparislerim"]?>
                </h2>
                <small style="font-size: 16px;"><?=$dil["menu_sepet"]?> ID: #51456456</small>
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2"><?=$dil["title_urun"]?></th>
							<th class="column-3"><?=$dil["title_tutar"]?></th>
							<th class="column-4 p-l-50"><?=$dil["title_durum"]?></th>
							<th class="column-5"><?=$dil["title_tarih"]?></th>
						</tr>
                        
                        <?php
                        
                             $query = $db->query("SELECT * FROM orders WHERE order_ip='{$visitorIP}'", PDO::FETCH_ASSOC);
                                 if ( $query->rowCount() )
                                 {
                                    $statu = "Bilinmiyor";
                                      foreach( $query as $row ){
                                        switch ($row['order_statu'])
                                        {
                                           case 0: $statu = "Beklemede"; break;
                                           case 1: $statu = "Kargolandı"; break;
                                           case 2: $statu = "İade"; break;
                                        }
                                        
                                        $product = $row['order_products'];
                                           echo '
                                           <tr class="table-row">
                							<td class="column-1">
            								 <div>
                                              <img src="images/icons/cargo-icon.png" width="50%">       
            								 </div>
                							</td>
                							<td class="column-2">';
                                            
                                            $product = explode(",",$product);
                                            foreach($product as $title)
                                            {
                                                if(is_numeric(strpos($title," -")))
                                                {
                                                    $colNo = strpos($title," -");
                                                    echo '<a href="product-detail.php?product='.substr($title,0,$colNo).'">'.substr($title,$colNo+3).'</a><br/>';
                                                }
                                            }
                                            
                                            echo '</td>
                							<td class="column-3">'.TL($row['order_total']).' TL</td>
                							<td class="column-4">'.$statu.'</td>
                							<td class="column-5">'.substr($row['order_date'],8,2).'.'.substr($row['order_date'],5,2).'.'.substr($row['order_date'],0,4).'</td>
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