<?php
     require 'includes/head.php';
?>
<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
	<th>Başlık</th>
	<th>Resim</th>
	<th>Açıklama</th>
    <th>Çeviri</th>
	<th>Düzenle</th>
  </tr>
</thead>
<tbody>
 <?php
 $query = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
	   
	   $categoryID = $row['id'];
       $categoryTranslation = "Çeviri yok";
       if($row['categori_title_en'] != "" && $row['categori_description_en'] != "")
       {
          $categoryTranslation = "İngilizce";
       }
		  echo '
		  <tr>
			<td>'.$row['categori_title'].'</td>
			<td>';if($row['categori_image']!=""){echo '<a href="../images/categories/'.$row['categori_image'].'" target="_blank"><i class="fas fa-image" style="font-size: 30px;"></i></a>';}else{echo 'Null';} echo '</td>
			<td>';if($row['categori_description'] != ""){echo 'Mevcut';}else{echo'Eklenmedi';} echo '</td>
			<td>'.$categoryTranslation.'</td>
            <td>
             <a href="categories-edit.php?category='.$row['id'].'">
              <button type="button" class="btn btn-danger">Düzenle</button>
             </a>
             <a href="categories-delete.php?category='.$row['id'].'">
              <button type="button" class="btn btn-danger">Kaldır</button>
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