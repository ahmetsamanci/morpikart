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
	<th>Dal</th>
    <th>Etiketler</th>
	<th>Açıklama</th>
	<th>Düzenle</th>
  </tr>
</thead>
<tbody>
 <?php
 $query = $db->query("SELECT * FROM service_types order by service_id asc", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
  	        
        $etiketler = $row['type_tags'];
       
       $serviceID = $row['service_id'];
       $squery = $db->query("SELECT * FROM services WHERE id = '{$serviceID}'")->fetch(PDO::FETCH_ASSOC);
       if ( $squery ){
           $serviceID = $squery['service_name'];
       }
       
       
       $tags = EtiketSay($etiketler);
       
		  echo '
		  <tr>
			<td>'.$serviceID.'</td>
			<td>'.$row['type_name'].'</td>
            <td>#'.$tags.' t</td>
			<td>';
            if($row['type_description'] != "")
            {echo 'HTML5';}
            else{echo'Eklenmedi';}
            echo '
            </td>
			<td>
             <a href="services-types-edit.php?service='.$row['id'].'">
              <button type="button" class="btn btn-danger">Düzenle</button>
             </a>
            </td>
		  </tr>';
	 }
 }
 ?>
</tbody>
</table>
</div>
<?php require 'includes/footer.php'; ?>