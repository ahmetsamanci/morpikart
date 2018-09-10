<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Medyamen - Admin Tanımalama Sistemi</title>
</head>
<?php 

require 'includes/config.php';

@$Admin = $_GET["Admin"];

if($Admin == "")

{

    echo '
    <form name="define" method="post" action="">

     <input type="number" placeholder="Admin ID" name="adminid"/>

     <input type="submit" name="defineButton"/>

    </form>

    ';

    

    if(isset ($_POST["defineButton"]))

    {

         $id = $_POST["adminid"];

         $query = $db->prepare("SELECT * FROM admin WHERE id = ?");

		 $query -> execute(array($id));

		 $result = $query -> fetch();

		 if ( $result )

		 {

            echo '<script language="javascript">window.location="defineAdmin.php?Admin='.$id.'";</script>';

		 }

         else

         {

            echo '<form><p>Admin bulunamadı</p></form>';

         }

    }

}

else

{

         $id = $_GET["Admin"];

         $query = $db->prepare("SELECT * FROM admin WHERE id = ?");

		 $query -> execute(array($id));

		 $result = $query -> fetch();

		 if ( $result )

		 {

		  

          if($result['admin_password'] != ""){

                 echo '<script language="javascript">alert("Bu işlem zaten gerçekleşti");</script>';

                 echo '<script language="javascript">window.location="defineAdmin.php";</script>';

            }

            echo '

            <form name="newPassword" method="post" action="">

             <p style="color: red; font-size: 18px;">Hesap ve panel güvenliği için şifreniz en az 8 karakter oluşmalıdır.</p>

             <input type="password" placeholder="Yeni Şifre Girin" name="pass"/>

             <input type="submit" name="passButton"/>

            ';

            

            if(isset ($_POST["passButton"])){

                $sifre = $_POST["pass"];

                if(strlen($sifre) <= 8){

                    echo '<p><b style="color: red; font-weight: bold;">Hata!</b><br/>Lütfen en az 8 karakter ile bir şifre kullanın</p>';

                }

                else{

                     $sifre = md5($sifre);

					 $query = $db->prepare("UPDATE admin SET

					 admin_password = ? WHERE id = ?");

					 $update = $query->execute(array($sifre,$Admin));

					 

					 if ( $update ){

					 	 echo '<script language="javascript">alert("Şifre değiştirildi. Yönlendiriliyorsunuz");</script>';

                         echo '<script language="javascript">window.location="panel-login.php";</script>';

					 }

                }

            }

            

            echo '</form>';

		 }

         else

         {

            echo '<script language="javascript">window.location="defineAdmin.php";</script>';

         }

}



?>



<style type="text/css">

form{

    width: 300px;

    margin: 50px auto;

}

input{

    font-size: 18px;

    padding: 5px;

    margin-bottom: 5px;

}
@media screen and (max-width:800px){
    form{width: 100%; text-align: center;}
}

</style>