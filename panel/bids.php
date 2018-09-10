<?php
require 'includes/head.php';
$query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
     $servicesArray = array();
	 foreach( $query as $row ){
	    array_push($servicesArray, $row['service_name']);
     }
}
?>

<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
	<th>Hizmet</th>
    <th>Müşteri</th>
    <th>Firma</th>
    <th>Ip Adresi</th>
    <th>Görüntüle</th>
  </tr>
</thead>
<tbody>
 <?php
 $query = $db->query("SELECT * FROM offers", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
	   $serviceId = $row['work_title'] - 1;
		  echo '
		  <tr>
			<td>'.$servicesArray[$serviceId].'</td>
            <td>'.$row['customer_name'].'</td>
            <td>'.$row['customer_company'].'</td>
            <td>'.$row['customer_ip'].'</td>
            <td><a href="bid-view.php?Bid='.$row['id'].'"><button class="btn btn-primary">Görüntüle</button></a></td>
		  </tr>';
	 }
 }
 ?>
</tbody>
</table>
</div>

<?php require 'includes/footer.php'; ?>