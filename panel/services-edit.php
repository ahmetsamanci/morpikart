<?php require 'includes/head.php';
	 @$serviceID = $_GET["service"];
	 if(!is_numeric($serviceID))echo '<script language="javascript">window.location="services.php";</script>';
	 
	 $query = $db->query("SELECT * FROM services WHERE id='{$serviceID}'", PDO::FETCH_ASSOC);
	 if ( $query->rowCount() ){
		 foreach( $query as $row ){
			 $serviceName = $row['service_name'];
			 $serviceDescription = $row['service_description'];
			 $serviceExplanation = $row['service_explanation'];
             $serviceTags = $row['service_tags'];
			 $serviceIcon = $row['service_icon'];
			 $serviceImage = $row['service_image'];
             $serviceAuth = $row['service_auth'];
		 }
	 }
	 else
	 {
		 echo '<div class="content mt-3"><div class="alert alert-danger" role="alert">Geçerli kayıt bulunamadı!</div></div>';
		 exit;
	 }

?>
<div class="content mt-3">
 <div class="col-lg-12">

    <?php
         if(isset ($_POST["editServiceButton"]))
         {
            $rename = $_POST["rename"];
            $redescription = $_POST["redescription"];
            $reexplanation = $_POST["reexplanation"];
            $retags = $_POST["retags"];
            $reicon = $_POST["reicon"];
            $reimage = $_POST["reimage"];
            $reauth = $_POST["reauth"];
            if($reauth == ""){$reauth = $serviceAuth;}
            
            $query = $db->prepare("UPDATE services SET
            service_name = ?,
            service_description = ?,
            service_explanation = ?,
            service_tags = ?,
            service_icon = ?,
            service_image = ?,
            service_auth = ?
            WHERE id = ?");
            $update = $query->execute(array($rename,$redescription,$reexplanation,$retags,$reicon,$reimage,$reauth,$serviceID
            ));
            if ( $update )
            {
             echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$rename.' hizmeti güncellendi.
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
 
	<div class="card">
	  <div class="card-header"><strong>Hizmet</strong><small> Düzenle</small></div>
	  <div class="card-body card-block">
      <form name="editService" method="post" action="">
		<div class="form-group"><label for="adi" class=" form-control-label">Servis</label><input type="text" id="input" name="rename" class="form-control" value="<?=$serviceName?>"></div>
		<div class="form-group"><label for="aciklama" class=" form-control-label">Açıklama</label><textarea id="textarea-input" name="redescription" rows="4" placeholder="Hizmeti kısaca açıklayın" class="form-control"><?=$serviceDescription?></textarea></div>
		<div class="form-group"><label for="tanitim" class=" form-control-label">Tanıtım</label><textarea id="textarea-input" name="reexplanation" rows="9" placeholder="Hizmetin tanıtımını yapın(HTML geçerlidir.)" class="form-control"><?=$serviceExplanation?></textarea></div>
		<div class="form-group"><label for="etiketler" class=" form-control-label">Etiketler</label><input type="text" id="input" name="retags" class="form-control" value="<?=$serviceTags?>"></div>
        <div class="form-group"><label for="simge" class=" form-control-label">Simge</label><input type="text" id="input" name="reicon" class="form-control" value="<?=$serviceIcon?>"></div>
		<div class="form-group"><label for="gorsel" class=" form-control-label">Görsel</label><input type="text" id="input" name="reimage" class="form-control" value="<?=$serviceImage?>"></div>
		<div class="form-group"><label for="yetkili" class=" form-control-label">Yetkili</label>
		<select name="reauth" id="select" class="form-control">
		 <option selected disabled><?=$serviceAuth?></option>
		 <?php
		 $query = $db->query("SELECT * FROM admin", PDO::FETCH_ASSOC);
		 if ( $query->rowCount() ){
			 foreach( $query as $row ){
				  if($serviceAuth != $row['admin_name'])echo '<option>'.$row['admin_name'].'</option>';
			 }
		 }
		 ?>
		 </select>
		</div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="editServiceButton">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
       </form>
	  </div>
	</div>
 </div>
</div>
<?php require 'includes/footer.php'; ?>