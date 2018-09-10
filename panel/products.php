<?php
     require 'includes/head.php';
?>
<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
    <th>ID</th>
	<th>Ürün</th>
	<th>Stok</th>
	<th>Kategori</th>
    <th>Gösterim</th>
    <th>Çeviri</th>
	<th>İşlem</th>
  </tr>
</thead>
<tbody>
 <?php
 $cats = array("null");
 $catquery = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
 if ( $catquery->rowCount() ){
    foreach($catquery as $catrow)
    {
        array_push($cats, $catrow['categori_title']);
    }
 }
 
 $query = $db->query("SELECT * FROM products", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
	   
	   $categoryID = $row['product_category'];
		  echo '
		  <tr>
			<td>#'.$row['id'].'</td>
			<td>'.$row['product_title'].'</td>
			<td>'.$row['product_stok'].'</td>
            <td>'.$cats[$categoryID].'</td>
            <td>'.$row['product_view'].'</td>
            <td>'.$row['product_title_en'].'</td>
            <td>
             <a href="categories-edit.php?category='.$row['id'].'">
              <button type="button" class="btn btn-danger" disabled>Düzenle</button>
             </a>
             <a href="categories-delete.php?category='.$row['id'].'">
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