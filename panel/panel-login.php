<?php 
 require 'includes/config.php';
 if(isset ($_SESSION["adminID"])){echo '<script language="javascript">window.location="index.php";</script>';}  
?>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rodos Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<style type="text/css">
	 input[type='number'] {-moz-appearance:textfield;}
 	 input::-webkit-outer-spin-button,
 	 input::-webkit-inner-spin-button {
     -webkit-appearance: none;}
	</style>
</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
				<?php
					 @$id = $_POST["id"];
					 @$password = md5($_POST["password"]);
					 
					 if($id == "" || $password == "")
					 {
						 echo '<div class="alert alert-primary" role="alert">Devam etmek için lütfen giriş yapın.</div>';
					 }
					 else
					 {
						 $query = $db->prepare("SELECT * FROM admin WHERE admin_id = ? and admin_password = ?");
						 $query -> execute(array($id,$password));
						 $result = $query -> fetch();
						 if ( $result )
						 {
							 $_SESSION["adminID"] = $id;
							 $_SESSION["adminName"] = $result['admin_name'];
							 $_SESSION["adminPassword"] = $result['admin_password'];
							 $_SESSION["adminAuth"] = $result['admin_auth'];
							 $_SESSION["adminMail"] = $result['admin_mail'];
							 $_SESSION["adminUnit"] = $result['admin_unit'];
							 $_SESSION["adminAvatar"] = $result['admin_avatar'];
							 echo '<script language="javascript">window.location="index.php";</script>';
						 }
						 else
						 {
							 echo '<div class="alert alert-danger" role="alert">Hesap tanımlanamadı.</div>';
						 }
					 }
				?>
                    <form name="loginAdmin" method="post" action="">
                        <div class="form-group">
                            <label>Admin</label>
                            <input type="text" class="form-control" placeholder="Admin" name="id">
                        </div>
                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" class="form-control" placeholder="Şifre" name="password">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Devam Et</button>
                    </form>
					<div style="color: rgba(0,0,0,0.6); text-align: center; margin: 15px 0px;">
					 RODOS<b>PANEL</b> @ 2018
					</div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
