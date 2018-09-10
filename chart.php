<?php

require("includes/config.php");
/*
$dizi = array(

array("Tek Parça Tablo","(24x16)"), 
array("Tek Parça Tablo","(36x24)"),
array("Tek Parça Tablo","(30x20)"),
array("Tek Parça Tablo","(40x27)"),
array("Tek Parça Tablo","(40x30)"),

array("Üç Parça Tablo","(3-14X28)"),
array("Üç Parça Tablo","(3-16X32)"),
array("Üç Parça Tablo","(3-18X36)"),
array("Üç Parça Tablo","(3-20X40)"),
array("Üç Parça Tablo","(3-24X48)"),

array("Yatay Tek Parça Tablo","(30x20)"),
array("Yatay Tek Parça Tablo","(36x24)"),
array("Yatay Tek Parça Tablo","(40x30)"),
array("Yatay Tek Parça Tablo","(50x36)"),
array("Yatay Tek Parça Tablo","(60x44)"),

array("Beş Parça Tablo","(5-10x24)"),
array("Beş Parça Tablo","(5-12X32)"),
array("Beş Parça Tablo","(5-16X40)"),

array("Üç Geniş Parça Tablo","(3-16x24)"),
array("Üç Geniş Parça Tablo","(3-20x30)"),
array("Üç Geniş Parça Tablo","(3-24x36)"),
array("Üç Geniş Parça Tablo","(3-27x40)"),

array("Üç Kare Parça Tablo","(3-16x16)"),
array("Üç Kare Parça Tablo","(3-20x20)"),
array("Üç Kare Parça Tablo","(3-24x24)"),
array("Üç Kare Parça Tablo","(3-30x30)"),

array("Tek Dikey Parça Tablo","(16X24)"),
array("Tek Dikey Parça Tablo","(20X30)"),
array("Tek Dikey Parça Tablo","(24X36)"),
array("Tek Dikey Parça Tablo","(30X40)"),
array("Tek Dikey Parça Tablo","(31X47)"),

array("Altı Kare Parça Tablo","(6-12x12)"),
array("Altı Kare Parça Tablo","(6-16x16)"),
array("Altı Kare Parça Tablo","(6-20x20)"),
array("Altı Kare Parça Tablo","(6-24x24)"),
array("Altı Kare Parça Tablo","(6-30x30)"),

array("Sıralı Beş Parça Tablo","(60x34)"),
array("Sıralı Beş Parça Tablo","(70x40)"),

array("Sekiz Parça Tablo","(8-10x24)"),
array("Sekiz Parça Tablo","(8-12X32)"),
array("Sekiz Parça Tablo","(8-16x40)"),

array("İki Parçalı Tablo","(2-16x24)"),
array("İki Parçalı Tablo","(2-20X30)"),
array("İki Parçalı Tablo","(2-24X36)"),
array("İki Parçalı Tablo","(2-30X40)"),
array("İki Parçalı Tablo","(2-31X47)"),
array("İki Parçalı Tablo","(2-32x16)"),
array("İki Parçalı Tablo","(2-40x20)"),
array("İki Parçalı Tablo","(2-48X24)"),
array("İki Parçalı Tablo","(2-60x30)")

);


for($sayac=0; $sayac<=49; $sayac++)
{
	echo '['.$sayac.'] => ';
	echo $dizi[$sayac][0].' > '.$dizi[$sayac][1];
    $fiyat = rand(50,200);
    
    $query = $db->prepare("INSERT INTO chart SET
    chart_title = ?,
    chart_value = ?,
    chart_total = ?");
    $insert = $query->execute(array(
         $dizi[$sayac][0],$dizi[$sayac][1],$fiyat
    ));
    if ( $insert ){ echo ' + Kaydedildi';}
    else{echo ' ! Kaydedilemedi';}
    
    echo '<br/>';
}
*/
/*
$degisken = "İki Parçalı Tablo (2-16x24)";
echo $degisken;
echo '<br>';
echo 'çevrildi: '.strstr($degisken,'(');
*/


$query = $db->prepare("UPDATE chart SET
chart_id = :yeni_kadi
WHERE chart_title = :eski_kadi");
$update = $query->execute(array(
     "yeni_kadi" => "totalTwo",
     "eski_kadi" => "İki Parçalı Tablo"
));
if ( $update ){
     print "güncelleme başarılı!";
}
?>



