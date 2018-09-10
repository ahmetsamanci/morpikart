<?php require 'includes/head.php'; ?>
<div class="content mt-3">
 <div class="col-lg-12">
 <?php
     if(isset ($_POST["newService"]))
     {
        $service = $_POST["service"];
        $description = $_POST["description"];
        $explanation = $_POST["explanation"];
        $tags = $_POST["tags"];
        $icon = $_POST["icon"];
        $image = $_POST["image"];
        $auth = $_POST["auth"];
        
        $query = $db->prepare("INSERT INTO services SET
        service_name = ?,
        service_description = ?,
        service_explanation = ?,
        service_tags = ?,
        service_icon = ?,
        service_image = ?,
        service_auth = ?");
        $insert = $query->execute(array(
            $service,$description,$explanation,$tags,$icon,$image,$auth
        ));
        if ( $insert ){
             echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$service.' başlıklı hizmet listelendi.
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
	  <div class="card-header"><strong>Hizmet</strong><small> Yeni</small></div>
	  <div class="card-body card-block">
		<div class="form-group"><label for="service" class=" form-control-label">Hizmet Adı</label><input type="text" name="service" id="service" placeholder="Hizmet Adı" class="form-control"></div>
		<div class="form-group"><label for="description" class=" form-control-label">Açıklama</label><textarea name="description" id="textarea-input" rows="2" placeholder="Arama motorları için" class="form-control"></textarea></div>
		<div class="form-group"><label for="explanation" class=" form-control-label">Tanıtım</label><textarea name="explanation" id="textarea-input" rows="9" placeholder="HTML kodları geçerli" class="form-control"></textarea></div>
		<div class="form-group"><label for="tags" class=" form-control-label">Etiketler</label><input type="text" name="tags" id="tags" placeholder="Etiketleri virgül ile ayırın" class="form-control"></div>
		<div class="form-group"><label for="icon" class=" form-control-label">Simge</label><input type="text" name="icon" id="icon" placeholder="FontAwasome sınıf adı" class="form-control"></div>
        <div class="form-group"><label for="image" class=" form-control-label">Görsel</label><input type="text" name="image" id="image" placeholder="Resim adresi" class="form-control"></div>
		<div class="form-group"><label for="auth" class=" form-control-label">Yetkili</label>
		 <select name="auth" id="auth" class="form-control">
          <option value="0" selected disabled>Yetkili Seçin</option>
		  <?php
			$query = $db->query("SELECT * FROM admin", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				 foreach( $query as $row ){
					  print '<option>'.$row['admin_name'].'</option>';
				 }
			}
		  ?>
         </select>
		</div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="newService">
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