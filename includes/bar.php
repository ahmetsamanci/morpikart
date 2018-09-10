	 <header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
                <?php
                    if($settings[5]['setting_key'] != "")
                    {
                        echo '<a href="'.$settings[5]['setting_key'].'" class="topbar-social-item fa fa-facebook"></a>';
                    }
                    
                    if($settings[6]['setting_key'] != "")
                    {
                        echo '<a href="'.$settings[6]['setting_key'].'" class="topbar-social-item fa fa-twitter"></a>';
                    }
                    
                    if($settings[7]['setting_key'] != "")
                    {
                        echo '<a href="'.$settings[7]['setting_key'].'" class="topbar-social-item fa fa-youtube-play"></a>';
                    }
                ?>
				</div>

				<span class="topbar-child1">
					<?=$topNotice?>
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?=$settings[4]['setting_key']?>
						<span class="langtit">
							 <form method="POST" action="">
							  <span class="title"><?=$dil["btn_dil"]?></span> 
							  <button type="submit" name="langtr" <?php if($_SESSION["dil"] == "tr"){echo 'class="active"';} ?> title="Türkçe">TR</button>
							  <button type="submit" name="langen" <?php if($_SESSION["dil"] == "en"){echo 'class="active"';} ?> title="English">EN</button>
							  <?php
								 if(isset ($_POST["langtr"]))
								 {
									 $_SESSION["dil"] = "tr";
									 echo '<script type="text/javascript">window.location = "index.php" </script>';
								 }
								 
								 if(isset ($_POST["langen"]))
								 {
									 $_SESSION["dil"] = "en";
									 echo '<script type="text/javascript">window.location = "index.php" </script>';
								 }
							  ?>
							 </form>
						</span>
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php"><?=$dil["menu_anasayfa"]?></a>
							</li>

							<li>
								<a href="product.php"><?=$dil["menu_magaza"]?></a>
							</li>

							<li class="sale-noti">
								<a href="product.php"><?=$dil["menu_firsatlar"]?></a>
							</li>

							<li>
								<a href="cart.php"><?=$dil["menu_sepet"]?></a>
							</li>							

							<li>
								<a href="about.php"><?=$dil["menu_hakkinda"]?></a>
							</li>

							<li>
								<a href="contact.php"><?=$dil["menu_iletisim"]?></a>
							</li>
							<?php 
							 if(isset ($_SESSION["userid"]))
							 {
								 echo '
								 <li>
									 <a href="profile.php">'.$dil["menu_hesabim"].'</a>
								 </li>';
							 }
							 else
							 {
								 echo '
								 <li>
									 <a href="login.php">'.$dil["menu_hesap"].'</a>
								 </li>';
							 }
							?>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
				
				<?php 
					 if(isset ($_SESSION["userid"]))
					    echo '
    					<a href="logout.php" class="header-wrapicon1 dis-block">
    						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON" title="'.$dil["btn_cikisyap"].'">
    					</a>';
				 ?>
     
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
                        <?php
                             $cartIp = GetIP();
                             // Number items in Cart
                            $carts = $db->prepare("SELECT COUNT(*) FROM cart where cart_ip='{$cartIp}'");
                            $carts->execute();
                            $cartNumber = $carts->fetchColumn();
                            echo $cartNumber;
                        ?>
                        </span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
                            
                            <?php
                                 
                                 $query = $db->query("SELECT * FROM cart WHERE cart_ip='{$cartIp}'", PDO::FETCH_ASSOC);
                                 if ( $query->rowCount() ){
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
                                           <li class="header-cart-item">
            									<a href="cart.php?dp='.$row['id'].'"><div class="header-cart-item-img">
            										<img src="images/products/'.$productImage.'" alt="'.$productTitle.'" style="min-height: 50px">
            									</div></a>
            
            									<div class="header-cart-item-txt">
            										<a href="#" class="header-cart-item-name">
            											'.substr($productTitle,0,70).'
            										</a>
            
            										<span class="header-cart-item-info">
            											1 x '.$row['cart_piece'].' TL
            										</span>
            									</div>
            								</li>
                                           ';
                                           
                                      }
                                 }
                                 else
                                 {
                                    echo $dil['text_sepetbos'];
                                    $cartPrice = 0;
                                 }
                            ?>
							</ul>

							<div class="header-cart-total">
								<?=$dil["text_tutar"]?>: <?=TL($cartPrice)?> TL
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										<?=$dil["menu_sepet"]?>
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="pay.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										<?=$dil["btn_odeme"]?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/logo.png" alt="<?=$settings[0]['setting_key']?> Logo">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<?php
                            if(isset ($_SESSION["userid"]))
    					    echo '
        					<a href="logout.php" class="header-wrapicon1 dis-block">
        						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON" title="'.$dil["btn_cikisyap"].'">
        					</a>';
                        ?>
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?=$cartNumber?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
                            
                            <?php
                                 
                                 $query = $db->query("SELECT * FROM cart WHERE cart_ip='{$cartIp}'", PDO::FETCH_ASSOC);
                                 if ( $query->rowCount() ){
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
                                           <li class="header-cart-item">
            									<a href="cart.php?dp='.$row['id'].'"><div class="header-cart-item-img">
            										<img src="images/products/'.$productImage.'" alt="'.$productTitle.'" style="min-height: 50px">
            									</div></a>
            
            									<div class="header-cart-item-txt">
            										<a href="#" class="header-cart-item-name">
            											'.substr($productTitle,0,70).'
            										</a>
            
            										<span class="header-cart-item-info">
            											1 x '.TL($row['cart_piece']).' TL
            										</span>
            									</div>
            								</li>
                                           ';
                                           
                                      }
                                 }
                            ?>
							</ul>

							<div class="header-cart-total">
							<?=$dil["text_tutar"]?>	<?=TL($cartPrice)?> TL 
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										<?=$dil["menu_sepet"]?>
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="pay.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										<?=$dil["btn_odeme"]?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
					<form method="POST" action="" class="moblang">
					  <button type="submit" name="langtr" <?php if($_SESSION["dil"] == "tr"){echo 'class="active"';} ?> title="Türkçe">TR</button>
					  <button type="submit" name="langen" <?php if($_SESSION["dil"] == "en"){echo 'class="active"';} ?> title="English">EN</button>
					  <?php
						 if(isset ($_POST["langtr"]))
						 {
							 $_SESSION["dil"] = "tr";
							 echo '<script type="text/javascript">window.location = "index.php" </script>';
						 }
						 
						 if(isset ($_POST["langen"]))
						 {
							 $_SESSION["dil"] = "en";
							 echo '<script type="text/javascript">window.location = "index.php" </script>';
						 }
					  ?>
					</form>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							<?=$topNotice?>
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								<?=$settings[4]['setting_key']?>
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<?php
                                if($settings[5]['setting_key'] != "")
                                {
                                    echo '<a href="'.$settings[5]['setting_key'].'" class="topbar-social-item fa fa-facebook"></a>';
                                }
                                
                                if($settings[6]['setting_key'] != "")
                                {
                                    echo '<a href="'.$settings[6]['setting_key'].'" class="topbar-social-item fa fa-twitter"></a>';
                                }
                                
                                if($settings[7]['setting_key'] != "")
                                {
                                    echo '<a href="'.$settings[7]['setting_key'].'" class="topbar-social-item fa fa-youtube-play"></a>';
                                }
                            ?>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php"><?=$dil["menu_anasayfa"]?></a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php"><?=$dil["menu_magaza"]?></a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php"><?=$dil["menu_firsatlar"]?></a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.php"><?=$dil["menu_sepet"]?></a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.php"><?=$dil["menu_hakkinda"]?></a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php"><?=$dil["menu_iletisim"]?></a>
					</li>
				</ul>
			</nav>
		</div>
	</header>