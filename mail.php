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

<style type="text/css">
 .container input{border: 1px solid black !important; padding: 10px; display: block; margin: 5px 0px;}
 .container button{background: #000; padding: 10px; color: #fff;}
</style>

<div class="container m-t-80 m-b-40">
    <form action="mail.php" method="post">
    Adınız: <br/>
    <input type="text" name="ad" /><br/>
    E-Posta adresiniz: <br/>
    <input type="text" name="eposta" /><br/>
    Konu: <br/>
    <input type="text" name="konu" /><br/>
    Mesajınız: <br/>
    <textarea name="mesaj"></textarea><br/>
    <input type="submit" value="Mesajı Gönder" />
    </form>
    <?php
    
    if(isset($_POST['ad']) && isset($_POST['eposta']) && isset($_POST['konu']) && isset($_POST['mesaj'])) {
       if(empty($_POST['ad']) || empty($_POST['eposta']) || empty($_POST['konu']) || empty($_POST['mesaj'])) {
          echo 'Lütfen boş yer bırakmayın!';
       } else {
          $ad = strip_tags($_POST['ad']);
          $eposta = strip_tags($_POST['eposta']);
          $konu = strip_tags($_POST['konu']);
          $mesaj = strip_tags($_POST['mesaj']);
          $icerik = 'Ad: ' . $ad . '<br/>E-Posta: '. $eposta . '<br/>' . $mesaj;
          mail('ahmetalpersam@gmail.com', $konu, $icerik);
          echo 'Mesajınız Gönderildi! Teşekkürler.';
       }
    } else {
       echo 'Lütfen Formu Kullanın!';
    }
    
    ?>
</div>



<?php require'includes/footer.php'; ?>
<?php require'includes/js.php'; ?>


</body>
</html>