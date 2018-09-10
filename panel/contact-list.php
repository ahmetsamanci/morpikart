<?php require 'includes/head.php'; ?>
<div class="col-md-12">
		 <div class="card">
			 <div class="card-header">
				<strong class="card-title">Gelen Mesajlar</strong>
			 </div>
			 <div class="card-body">
			  <table id="bootstrap-data-table" class="table table-striped table-bordered">
				<thead>
				  <tr>
					<th>Tarih</th>
                    <th>Form Tipi</th>
                    <th>Gönderen</th>
                    <th>Gösterim</th>
					<th>Görüntüle</th>
				  </tr>
				</thead>
				<tbody>
				 <?php
				 $query = $db->query("SELECT * FROM contact ORDER BY id DESC LIMIT 10", PDO::FETCH_ASSOC);
				 if ( $query->rowCount() ){
					 foreach( $query as $row ){
						  echo '
						  <tr>
                            <td>'.$row['contact_name'].'</td>
                            <td>'.$row['contact_type'].'</td>
							<td>'; 
                            $cTarih = $row['contact_date'];
                            
                            $gSure = mktime(substr($cTarih,11,2),substr($cTarih,14,2),substr($cTarih,15,2),substr($cTarih,5,2),substr($cTarih,8,2),substr($cTarih,0,4));
                            
                            echo gecen_sure($gSure);
                            echo '</td>
                            <td>'; if($row['contact_view'] == 1){echo 'Okundu';}else{echo 'Bekliyor';} echo '</td>
							<td>
                            <a href="contacts.php?contact='.$row['id'].'">
                             <button type="button" class="btn btn-primary">
                              Görüntüle
                             </button>
                            </a>
                            </td>
						  </tr>';
					 }
				 }
                 else{
                    echo '<tr><td colspan="6" class="alert alert-warning">Hiç mesaj yok</td></tr>';
                 }
				 ?>
				</tbody>
			  </table>
				 <a href="contacts.php"><button type="button" class="btn btn-success">Tümünü Gör</button></a>
			 </div>
		 </div>
	</div>
<?php require 'includes/footer.php'; ?>