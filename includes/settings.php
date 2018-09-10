
<?php
     
     // Variables
     
     $settings = array();
	 $homePage = "rodosbilisim.com/demo/work-1/";
	 $userType = 0;
	 $visitorIP = "";
     $pageTitle = "";
	 
     // Page Title
     
     $thisURL = $_SERVER['REQUEST_URI'];
     $pageUrlList = explode("/",$thisURL);
     $pageUrlCount = count($pageUrlList) - 1;
     $pageActiveLink = $pageUrlList[$pageUrlCount];
     
     switch ($pageActiveLink){
       case "index.php": if($_SESSION["dil"] != "en") {$pageTitle = "Anasayfa";}else{$pageTitle = "Home";} break;
       case "product.php": if($_SESSION["dil"] != "en") {$pageTitle = "Mağaza";}else{$pageTitle = "Store";} break;
       case "cart.php": if($_SESSION["dil"] != "en") {$pageTitle = "Sepet";}else{$pageTitle = "Cart";} break;
       case "about.php": if($_SESSION["dil"] != "en") {$pageTitle = "Hakkında";}else{$pageTitle = "About";} break;
       case "contact.php": if($_SESSION["dil"] != "en") {$pageTitle = "İletişim";}else{$pageTitle = "Contact";} break;
       case "login.php": if($_SESSION["dil"] != "en") {$pageTitle = "Giriş Yap";}else{$pageTitle = "Login";} break;
       case "categories.php": if($_SESSION["dil"] != "en") {$pageTitle = "Kategori";}else{$pageTitle ="Categories";} break;
       case "profile.php": if($_SESSION["dil"] != "en") {$pageTitle = "Profilim";}else{$pageTitle = "Profile";} break;
       case "pay.php": if($_SESSION["dil"] != "en"){$pageTitle = "Ödeme Yap";}else{$pageTitle = "Pay";} break;
       case "changepassword.php": if($_SESSION["dil"] != "en"){$pageTitle = "Şifre Değiştir";}else{$pageTitle = "Change Password";} break;
       case "orders.php": if($_SESSION["dil"] != "en"){$pageTitle = "Siparişlerim";}else{$pageTitle = "My Orders";} break;
       default: $pageTitle = "*";
     }
     
     if($pageTitle == "*")
     {
        $ptitle = "";
        if(substr($pageActiveLink,0,14) == "product-detail")
        {
            $query = $db->query("SELECT * FROM products WHERE id = '{$_GET[product]}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query )
            {
                if($_SESSION["dil"] != "en")
                {
                    $ptitle = $ptitle = $query['product_title'];
                }
                else
                {
                    $ptitle = $ptitle = $query['product_title_en'];
                }
            }
            else
            {
                echo '<script>window.location="product.php";</script>';
            }
            $pageTitle = $ptitle;
        }
        else
        {
            if($_SESSION["dil"] == "tr")
            {
                $pageTitle = "Hoşgeldiniz";
            }
            else
            {
                $pageTitle = "Welcome";
            }
        }
     }
     
     
     // Page Title End 
     
     // Page Settings
     
     $query = $db->query("SELECT setting_title,setting_key FROM settings", PDO::FETCH_ASSOC);
     if ( $query->rowCount() ){
          foreach( $query as $row ){
            array_push($settings,$row);
          }
     }
     
     // Page Settings End
	 
     // Get Ip
     
     function GetIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
     
     // Get Ip End
     
     // Notice Setting
     $topNotice = $settings[17]['setting_key'];
     if(!empty($topNotice))
     {
         $notices = explode(")",$topNotice);
         
         if($_SESSION["dil"] != "en")
         {
            $topNotice = substr($notices[0],3);
         }
         else
         {
            $topNotice = substr($notices[1],4);
         }
     }
     // Notice Setting End
     
     // Visitor Log
     
     $visitorIP = GetIp();
	 if($visitorIP != "::1")
	 {
		 $__url = $_SERVER['REQUEST_URI'];
		 $__burl = "";
		 @$__burl = htmlspecialchars($_SERVER['HTTP_REFERER']);
		 if($__burl == "")
		 {
			 $__burl = "outside";
		 }
		 $query = $db->prepare("INSERT INTO log SET
		 log_url = :url,
		 log_backurl = :backurl,
		 log_ip = :ip");
		 $insert = $query->execute(array(
		   "url" => $__url,
		   "backurl" => $__burl,
		   "ip" => $visitorIP
		 ));
	 }
     
     // Visitor Log End
     
    
     // Product Price
     
     $query = $db->query("SELECT * FROM chart WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
     if ( $query ){
        $standardPrice = $query['chart_total'];
     }
     
     // Product Price End
	 
?>