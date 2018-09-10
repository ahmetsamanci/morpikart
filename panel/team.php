<?php require 'includes/head.php'; ?>
<div class="content mt-3">
     <div class="animated fadeIn">
         <div class="row">
		 <div style="width: 100%; text-align: left; margin: 15px;" align="right" ><a class="btn btn-primary btn-lg" href="#" role="button">Yeni Admin</a></div>
		     <?php
				 $query = $db->query("SELECT * FROM admin", PDO::FETCH_ASSOC);
				 if ( $query->rowCount() ){
					 foreach( $query as $row ){
					
						 $units = $row['admin_unit'];
						 $unitList = explode(",",$units);
						 
						 $avatarAdres = "rodos.png";
						 if($row['admin_avatar'] != "")
						 {
							 $avatarAdres = $row['admin_avatar'];
						 }
						 
						  print '
						  <div class="col-md-4">
							 <div class="card">
								 <div class="card-header">
									 <i class="fa fa-user"></i><strong class="card-title pl-2">Profil Kart</strong>
								 </div>
								 <div class="card-body">
									 <div class="mx-auto d-block">
										 <img class="rounded-circle mx-auto d-block" src="images/avatar/'.$avatarAdres.'" alt="Card image cap">
										 <h5 class="text-sm-center mt-2 mb-1">'.$row['admin_name'].'</h5>
										 <div class="location text-sm-center">';
										 
										 foreach($unitList as $list){
											 $query = $db->query("SELECT * FROM services WHERE id = '{$list}'")->fetch(PDO::FETCH_ASSOC);
											 if ( $query ){
												 echo '<i class="fas fa-rocket"></i> '.$query['service_name'].'<br/>';
											 }
										 }
										 
										 echo '
										 </div>
									 </div>
									 <hr>
									 <div class="card-text text-sm-center">
										 <a href="#"><i class="fas fa-user-edit"></i></a>
										 <a href="#"><i class="fas fa-user-times"></i></a>
									 </div>
								 </div>
							 </div>
						 </div>';
					 }
				 }
			 ?>
		   
		 </div>
	 </div>
</div>
<?php require 'includes/footer.php'; ?>