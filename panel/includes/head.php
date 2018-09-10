<?php require 'includes/config.php'; 
 if(!isset ($_SESSION["adminID"])){echo '<script language="javascript">window.location="panel-login.php";</script>';}
 $query = $db->query("SELECT setting_title,setting_key FROM settings", PDO::FETCH_ASSOC);
 if ( $query->rowCount() )
 {
     $pageSettings = array();
	 foreach($query as $row){
		 array_push( $pageSettings, $row);
	 }
 }
 $adminAvatar = $_SESSION["adminAvatar"];
 
 
 $panelURL = $_SERVER['REQUEST_URI'];
 $urlNum = strlen(substr($panelURL,13));
 $shortUrl = substr($panelURL,13);
 $panelTitle = "";
 if($urlNum != 0)
 {
     for($syc=0; $syc<=$urlNum; $syc++){
         if(substr($shortUrl,$syc,1) != ".")
         {
            $panelTitle = $panelTitle.substr($shortUrl,$syc,1);
         }
         else
         {
            break;
         }
     }
     $panelTitle =  " / ".$panelTitle;
 }
 
function gecen_sure($tarih)
{
	 $time_difference = time() - $tarih;
	 $seconds = $time_difference ;
	 $minutes = round($time_difference / 60 );
	 $hours = round($time_difference / 3600 );
	 $days = round($time_difference / 86400 );
	 $weeks = round($time_difference / 604800 );
	 $months = round($time_difference / 2419200 );
	 $years = round($time_difference / 29030400 );


	 if($seconds <= 60)
	 {
	 	 echo $seconds." saniye önce";
	 } 
	 else if($minutes <=60) 
	 {
	 	 if($minutes==1) 
	 	 { 
	 		 echo "1 dakika önce";
	 	 }
	 	 else
	 	 {
	 		 echo $minutes." dakika önce"; 
	 	 } 
	 } 
	 else if($hours <=24)
	 { 
	 	 if($hours==1)
	 	 { 
	 		 echo "1 saat önce"; 
	 	 }
	 	 else
	 	 { 
	 		 echo $hours." saat önce"; 
	 	 } 
	 } 
	 else if($days <= 7)
	 {
	 	 if($days==1) 
	 	 { 
	 		 echo "1 gün önce"; 
	 	 }
	 	 else
	 	 {
	 		 echo $days." gün önce"; 
	 	 } 
	 } 
	 else if($weeks <= 4) 
	 {
	 	 if($weeks==1) 
	 	 { 
	 		 echo "1 hafta önce";
	 	 } 
	 	 else 
	 	 { 
	 		 echo $weeks." hafta önce"; 
	 	 } 
	 } 
	 else if($months <=12)
	 {
	 	 if($months==1)
	 	 { 
	 		 echo "1 ay önce";
	 	 }
	 	 else
	 	 { 
	 		 echo $months." ay önce"; 
	 	 } 
	 } 
	 else 
	 {
	 	 if($years==1) 
	 	 {
	 		 echo "1 yıl önce";
	 	 } 
	 	 else 
	 	 {
	 		 echo $years." yıl önce"; 
	 	 }
	 }

}
 
?>
<html class="no-js" lang="tr">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$pageSettings[0]['setting_key'];?> - Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" id="topLogo" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="fas fa-columns" style="padding-right: 35px;"></i>Panel </a>
                    </li>
                    <h3 class="menu-title">Siparişler</h3><!-- /.menu-title -->
                    <li class="dropdown">
                        <a href="orders.php?Statu=0" class="dropdown-toggle"> <i class="fas fa-rocket" style="padding-right: 35px;"></i>Bekleyenler</a>
                    </li>
					<li class="dropdown">
                        <a href="orders.php?Statu=1" class="dropdown-toggle"> <i class="fas fa-rocket" style="padding-right: 35px;"></i>Tamamlananlar</a>
                    </li>
					
					<h3 class="menu-title">Ürünler   </h3><!-- /.menu-title -->
                    <li class="dropdown">
                        <a href="products.php" class="dropdown-toggle"> <i class="fas fa-rocket" style="padding-right: 35px;"></i>Ürün Listesi</a>
                    </li>
                    <?php
                    if($_SESSION["adminID"] == "admin")
                    {
                        echo '
                        
                        <li class="dropdown">
                            <a href="product-new.php" class="dropdown-toggle"> <i class="fas fa-rocket" style="padding-right: 35px;"></i>Yeni Ürün</a>
                        </li>
                        
                        ';
                    }
					
                    ?>
					<li class="dropdown">
                        <a href="payroll.php" class="dropdown-toggle"> <i class="fas fa-rocket" style="padding-right: 35px;"></i>Fiyat Çizelgesi</a>
                    </li>
					
                    <h3 class="menu-title">Kategoriler</h3><!-- /.menu-title -->
                    <li class="dropdown">
                        <a href="categories.php"> <i class="fas fa-bars" style="padding-right: 35px;"></i> Liste</a>
                        <a href="categories-new.php"> <i class="fas fa-images" style="padding-right: 35px;"></i> Yeni Kategori</a>
                    </li>
                    
					<h3 class="menu-title">Mesajlar</h3><!-- /.menu-title -->
                    <li class="dropdown">
                        <a href="contacts.php"> <i class="fas fa-clipboard-list" style="padding-right: 35px;"></i> Tüm Mesajlar</a>
                    </li>
                    
                    <h3 class="menu-title">Slider</h3><!-- /.menu-title -->
                    <li class="dropdown">
                        <a href="sliders.php"> <i class="fas fa-bars" style="padding-right: 35px;"></i> Liste</a>
                        <a href="sliders-new.php"> <i class="fas fa-images" style="padding-right: 35px;"></i> Yeni Slider</a>
                    </li>
                    
                    <h3 class="menu-title">Kullanıcı</h3><!-- /.menu-title -->
                    <li class="dropdown">
                        <a href="visitors.php"> <i class="fas fa-bars" style="padding-right: 35px;"></i> Kullanıcı Listesi</a>
                    </li>
                    
                    <h3 class="menu-title">Ayarlar</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cog" style="padding-right: 35px;"></i>Genel Ayarlar</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa-cogs"></i><a href="settings.php">Genel Ayarlar</a></li>
                            <li><i class="fas fa-user-cog"></i><a href="profile-edit.php">Profil Ayarları</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
	    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left">«</a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">0</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">0 Yeni Bildirim</p>0
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope"></i>
                            <span class="count bg-primary">0</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">0 Yeni Mesaj</p>
							 <a class="dropdown-item media bg-flat-color-4" href="contacts.php?contact='.$row['id'].'" style="width: 400px;">
									  
                                     <span class="message media-body">
									   <span class="name float-left">Sipariş Adı</span>
								       <span class="time float-right">Tarih</span>
									  </span>
									 </a>
                          </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/avatar/<?=$adminAvatar?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="profile-edit.php"><i class="fas fa-user" style="font-size: 90%; padding-right: 10px;"></i></i>Hesap Ayarları</a>

                                <!-- <a class="nav-link" href="#"><i class="fas fa-bell" style="font-size: 90%; padding-right: 10px;"></i>Bildirimler <span class="count">13</span></a> -->

                                <!-- <a class="nav-link" href="profile-edit.php"><i class="fas fa-key" style="font-size: 90%; padding-right: 10px;"></i>Şifre Değiştir</a> -->

                                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 90%; padding-right: 10px;"></i>Çıkış</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>panel <?=$panelTitle?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Panel <?=$panelTitle?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>