<?php require 'includes/head.php'; ?>
<div class="content mt-3">
 <div class="col-lg-12">
 <?php
     if(isset ($_POST["newType"]))
     {
        $service = $_POST["service"];
        $type = $_POST["type"];
        $description = $_POST["description"];
        $tags = $_POST["tags"];
        
        $query = $db->prepare("INSERT INTO service_types SET
        service_id = ?,
        type_name = ?,
        type_tags = ?,
        type_description = ?");
        $insert = $query->execute(array(
            $service,$type,$tags,$description
        ));
        if ( $insert ){
            
            $query = $db->query("SELECT * FROM services WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){
                $serviceName = $query['service_name'];
                $service = $serviceName;
            }
            
             echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$service.' hizmet alanına '.$type.' dalı eklendi.
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';
            }
            else{
                echo '
                  <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                     Bilinmeyen bir sorun oluştu. Daha sonra tekrar deneyin.
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                		<span aria-hidden="true">&times;</span>
                	</button>
                  </div>';
         }
     }
 
 ?>
 <form method="post" action="">
	<div class="card">
	  <div class="card-header"><strong>Hizmet Dalı</strong><small> Yeni</small></div>
	  <div class="card-body card-block">
       <div class="form-group"><label for="auth" class=" form-control-label">Hizmet</label>
		 <select name="service" id="service" class="form-control">
          <option value="0" selected disabled>Hizmet Seçin</option>
		  <?php
			$query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				 foreach( $query as $row ){
					  print '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
				 }
			}
		  ?>
         </select>
		</div>
		<div class="form-group"><label for="service" class=" form-control-label">Hizmet Alt Dal Adı</label><input type="text" name="type" id="type" placeholder="Dal Adı" class="form-control"></div>
		<div class="form-group"><label for="description" class=" form-control-label">Açıklama</label><textarea name="description" id="textarea-input" rows="2" placeholder="Arama motorları için" class="form-control"></textarea></div>
		<div class="form-group"><label for="tags" class=" form-control-label">Etiketler</label><input type="text" name="tags" id="type" placeholder="Etiketleri virgül ile ayırın" value="konya,medyamen" class="form-control"></div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="newType">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
	  </div>
	</div>
  </form>
  
 </div>
</div>
<?php require 'includes/footer.php'; ?>