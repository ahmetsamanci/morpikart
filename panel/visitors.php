<?php require 'includes/head.php'; ?>
<div class="content mt-3">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
  <tr>
	<th>Ziyaretçi</th>
	<th>Geldiği Sayfa</th>
	<th>Sayfa</th>
	<th>Tarih</th>
  </tr>
</thead>
<tbody>
 <?php
 $query = $db->query("SELECT * FROM log ORDER BY id DESC limit 50", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
		  echo '
		  <tr>
			<td>'.$row['log_ip'].'</td>
			<td><span title="'.$row['log_backurl'].'">'.substr($row['log_backurl'],0,80).'</span></td>
			<td><span title="'.$row['log_url'].'">'.substr($row['log_url'],0,80).'</span></td>
			<td>'.$row['log_date'].'</td>
		  </tr>';
	 }
 }
 ?>
</tbody>
</table>
</div>
<?php require 'includes/footer.php'; ?>