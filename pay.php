<?php require'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php require 'includes/meta.php'; ?>
<?php require 'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/extra.css">
</head>
<body class="animsition">
	<!-- Header -->
<?php
    require'includes/bar.php';
    $cartTotal = 0;
    $cartProducts = "";
    $query = $db->query("SELECT * FROM cart WHERE cart_ip='{$cartIp}'", PDO::FETCH_ASSOC);
    if ( $query->rowCount() )
    {
        $itemCount = 0;
        foreach( $query as $row ){
            $itemCount++;
            $cartTotal = $cartTotal + $row['cart_total'];
            $cartedProduct = $row["cart_product"].' - '.$row["cart_product_size"];
            
            if($itemCount == 1)
            {
                $cartProducts = $cartedProduct;
            }
            else
            {
                $cartProducts = $cartProducts.','.$cartedProduct;
            }
        }
    }
    
    if($cartTotal == 0)
    {
        echo '<script type="text/javascript">window.location = "cart.php"</script>';
    }
    
    
    // pay with no account
    
    if(isset ($_POST["payNoAccount"]))
    {
        $noName = $_POST["ordername"];
        $noCountry = $_POST["country"];
        $noCity = $_POST["city"];
        $noDist = $_POST["dist"];
        $noAdress = $_POST["address"];
        $noMail = $_POST["eposta"];
        $noPhone = $_POST["phone"];
        $noIP = $visitorIP;
        $noTotal = $cartTotal;
        
        $query = $db->prepare("INSERT INTO orders SET
            order_ip = ?,
            order_name = ?,
            order_country = ?,
            order_city = ?,
            order_dist = ?,
            order_address = ?,
            order_mail = ?,
            order_phone = ?,
            order_products = ?,
            order_total = ?,
            order_statu = ?");
        $insert = $query->execute(array(
             $noIP, $noName, $noCountry, $noCity, $noDist, $noAdress, $noMail, $noPhone, $cartProducts, $noTotal, "0"
        ));
        if ( $insert ){
            $query = $db->prepare("DELETE FROM cart WHERE cart_ip = :id");
            $delete = $query->execute(array(
               'id' => $noIP
            ));
            echo '<script type="text/javascript">window.location = "orders.php"</script>';
        }
    }
    
    // pay with account
    
    if(isset ($_POST["payAccount"]))
    {
        $noName = $_POST["ordername"];
        $noCountry = $_POST["country"];
        $noCity = $_POST["city"];
        $noDist = $_POST["dist"];
        $noAdress = $_POST["address"];
        $noMail = $_POST["eposta"];
        $noPhone = $_POST["phone"];
        $noIP = $visitorIP;
        $noTotal = $cartTotal;
        
        $query = $db->prepare("INSERT INTO orders SET
            order_ip = ?,
            order_name = ?,
            order_country = ?,
            order_city = ?,
            order_dist = ?,
            order_address = ?,
            order_mail = ?,
            order_phone = ?,
            order_products = ?,
            order_total = ?,
            order_statu = ?");
        $insert = $query->execute(array(
             $noIP, $noName, $noCountry, $noCity, $noDist, $noAdress, $noMail, $noPhone, $cartProducts, $noTotal, "0"
        ));
        if ( $insert ){
            $query = $db->prepare("DELETE FROM cart WHERE cart_ip = :id");
            $delete = $query->execute(array(
               'id' => $noIP
            ));
            echo '<script type="text/javascript">window.location = "orders.php"</script>';
        }
    }
?>

<section class="bgwhite p-t-66 p-b-60" id="pay">
		<div class="container">
			<div class="row">
                <?php
                if(!isset ($_SESSION["userid"]))
                {
                    echo '
                    
                <div class="col-md-6 p-b-30">
                <h4>'.$dil["text_uyesizsiparis"].'</h4>
                
                <form method="post" action="">
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="ordername" placeholder="'.$dil["login_ad"].'" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="country" placeholder="'.$dil["text_ulke"].'" list="countries" value="'; if($_SESSION["dil"] != "en"){echo 'TR';} echo '" required>
                            ';
                            
                            include("includes/countries.php");
                            
                            echo '
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="'.$dil["text_sehir"].'" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="dist" placeholder="'.$dil["text_ilce"].'" required>
						</div>
                        
                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="'.$dil["login_adres"].'" required></textarea>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="eposta" placeholder="'.$dil["text_eposta"].'" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="'.$dil["text_telefon"].'" required>
						</div> 

						<div class="w-size25">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="payNoAccount">
								'.$dil["btn_odemeyegec"].'
							</button>
						</div>
                    </div>
				</form>
                    
                    <div class="col-md-6 p-b-30 pay-account">
                
                    <h4>'.$dil["text_zatenhesabvar"].'</h4>
                    
                    <img src="images/users-group.png"/>
                    
                    <p class="text-center">'.$dil["text_girisavantaj"].'</p>
                    
                    <a href="login.php"><button>'.$dil["btn_girisyap"].'</button></a>
                    <a href="login.php"><button>'.$dil["btn_uyeol"].'</button></a>
                    
                    </div>
                    ';
                 }
                 else
                 {
                    $orderid = $_SESSION["userid"];
                    $query = $db->query("SELECT * FROM users WHERE user_id = '{$orderid}'")->fetch(PDO::FETCH_ASSOC);
                    if ( $query )
                    {
                        $orderName = $query["user_name"];
                        $orderCountry = $query["user_country"];
                        $orderAdress = $query["user_adress"];
                        $orderCity = $query["user_city"];
                        $orderDistrict = $query["user_district"];
                        $orderMail = $query["user_mail"];
                        $orderPhone = $query["user_phone"];
                    }
                    
                    echo '
                    
                    <div class="col-md-6 p-b-30">
                    <h4>'.$dil["title_adresbilgi"].'</h4>
                
                    <form method="post" action="">
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="ordername" placeholder="'.$dil["login_ad"].'" value="'.$orderName.'" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="country" placeholder="'.$dil["text_ulke"].'" value="'.$orderCountry.'" list="countries" required>
                            ';
                            
                            include("includes/countries.php");
                            
                            echo '
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="'.$dil["text_sehir"].'" value="'.$orderCity.'" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="dist" placeholder="'.$dil["text_ilce"].'" value="'.$orderDistrict.'" required>
						</div>
                        
                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="'.$dil["login_adres"].'" required>'.$orderAdress.'</textarea>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="eposta" placeholder="'.$dil["text_eposta"].'" value="'.$orderMail.'" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="'.$dil["text_telefon"].'" value="'.$orderPhone.'" required>
						</div> 

						<div class="w-size25">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="payAccount">
								'.$dil["btn_odemeyegec"].'
							</button>
						</div>
                    </div>
				</form>
                    
                    <div class="col-md-6 p-b-30 pay-account">
                
                    <h4>'.$dil["text_bilgionaylayin"].'</h4>
                    
                    <img src="images/order-map.jpg"/>
                    
                    <p class="text-center">'.$dil["text_girisavantaj"].'</p>
                    
                    </div>
                    ';
                 }
                ?>
            </div>
         </div>
</section>

<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>

</body>
</html>