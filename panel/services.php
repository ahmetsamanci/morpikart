<?php 
require 'includes/head.php';
function EtiketSay($etiket){
    $etiketSayisi = 0;
    $etiketler = explode(",",$etiket);
    foreach($etiketler as $say){
        if($say != "")
        {
            $etiketSayisi++;
        }
    }
    return $etiketSayisi;
}
?>
<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
	<th>Hizmet</th>
	<th>Açıklama</th>
	<th>Tanıtım</th>
	<th>Etiket</th>
	<th>Görsel</th>
	<th>Yetkili</th>
	<th>Düzenle</th>
  </tr>
</thead>
<tbody>
 <?php
 $query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
	   $etiket = $row['service_tags'];
		  echo '
		  <tr>
			<td>'.$row['service_name'].'</td>
			<td>'.$row['service_description'].'</td>
			<td>';if($row['service_explanation'] != ""){echo 'HTML5';}else{echo'Eklenmedi';} echo '</td>
			<td>#'.EtiketSay($etiket).' t</td>
			<td>';if($row['service_image']!=""){echo '<i class="fas fa-image"></i>';}else{echo 'Null';} echo '</td>
			<td>'.$row['service_auth'].'</td>
			<td><a href="services-edit.php?service='.$row['id'].'"><button type="button" class="btn btn-danger">Düzenle</button></a></td>
		  </tr>';
	 }
 }
 ?>
</tbody>
</table>
</div>
<?php require 'includes/footer.php'; ?>