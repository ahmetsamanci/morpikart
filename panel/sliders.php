<?php
     require 'includes/head.php';
?>
<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
	<th>Başlık</th>
	<th>Resim</th>
	<th>Çeviri</th>
	<th>Buton</th>
	<th>Düzenle</th>
  </tr>
</thead>
<tbody>
 <?php
 $query = $db->query("SELECT * FROM sliders ORDER BY id desc", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
		  echo '
		  <tr>
			<td>'.$row['slider_title'].'</td>
			<td>';if($row['slider_image']!=""){echo '<a href="#"><i class="fas fa-image" style="font-size: 30px;"></i></a>';}else{echo 'Null';} echo '</td>
			<td>';if($row['slider_title_en'] != "" && $row['slider_description_en'] != "" && $row['slider_link_title_en'] != ""){echo 'İngilizce';}else{echo'Eklenmedi';} echo '</td>
			<td>';
            
            if($row['slider_link_title'] != "")
            {
                echo '<a href="../'.$row['slider_link'].'">'.$row['slider_link_title'].'</a>';
            }
            else
            {
                echo 'Null';
            } 
            
            echo '</td>
			<td>
             <a href="slider-edit.php?slider='.$row['id'].'">
              <button type="button" class="btn btn-danger">Düzenle</button>
             </a>
             <a href="slider-delete.php?slider='.$row['id'].'">
              <button type="button" class="btn btn-danger" disabled>Kaldır</button>
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