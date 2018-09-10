<?php
     require 'includes/head.php';
     $Statu = "";
     if($_GET["Statu"] != "" && is_numeric($_GET["Statu"]))
     {
        $Statu = $_GET["Statu"];
        $StatQuery = "SELECT * FROM orders WHERE order_statu=".$Statu;
     }
     else
     {
        $Statu = "None";
        $StatQuery = "SELECT * FROM orders";
     }

?>
<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
    <th>ID</th>
	<th>Kullanıcı</th>
	<th>Konum</th>
	<th>Telefon</th>
    <th>Tutar</th>
    <th>Durum</th>
	<th>Tarih</th>
    <th>Görüntüle</th>
  </tr>
</thead>
<tbody>
 <?php
 
 $query = $db->query($StatQuery, PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
	   
	   $categoryID = $row['product_category'];
       
       $oSt = "Bilinmiyor";
       switch($row['order_statu'])
       {
          case 0: $oSt = "Bekliyor"; break;
          case 1: $oSt = "Gönderildi"; break;
          case 3: $oSt = "Bilinmiyor"; break;
       }
       
		  echo '
		  <tr>
			<td>#'.$row['id'].'</td>
			<td>'.$row['order_name'].'</td>
			<td>'.$row['order_country'].' / '.$row['order_city'].'</td>
            <td>asd</td>
            <td>'.TL($row['order_total']).' TL</td>
            <td>'.$oSt.'</td>
            <td>'.$row['order_date'].'</td>
            <td>
             <a href="order-detail.php?order='.$row['id'].'">
              <button type="button" class="btn btn-primary">Görüntüle</button>
             </a>
            </td>
		  </tr>';
	 }
 }
 else
 {
    echo '
      <tr>
    	<td colspan="10">Kayıt yok.</td>
     </tr>';
 }
 ?>
</tbody>
</table>
</div>
<?php require 'includes/footer.php'; ?>