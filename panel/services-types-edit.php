<?php require 'includes/head.php';
	 @$serviceID = $_GET["service"];
	 if(!is_numeric($serviceID))echo '<script language="javascript">window.location="services.php";</script>';
	 
	 $query = $db->query("SELECT * FROM service_types WHERE id='{$serviceID}'", PDO::FETCH_ASSOC);
	 if ( $query->rowCount() ){
		 foreach( $query as $row ){
			 $SserviceID = $row['service_id'];
			 $StypeName = $row['type_name'];
			 $Sdescription = $row['type_description'];
             $Stags = $row['type_tags'];
             
             $Sservice = "";
             $squery = $db->query("SELECT * FROM services WHERE id = '{$SserviceID}'")->fetch(PDO::FETCH_ASSOC);
             if ( $squery ){
                $Sservice = $squery['service_name'];
             }
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
            $retype = $_POST["retype"];
            $redescription = $_POST["redescription"];
            $reservice = $SserviceID;
            $retags = $_POST["retags"];
            
            $query = $db->prepare("UPDATE service_types SET
            service_id = ?,
            type_name = ?,
            type_tags = ?,
            type_description = ?
            WHERE id = ?");
            $update = $query->execute(array($reservice,$retype,$retags,$redescription,$serviceID));
            if ( $update )
            {
             echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$retype.' hizmet dalı güncellendi.
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
		<div class="form-group"><label for="adi" class=" form-control-label">Servis</label><input type="text" id="input" class="form-control" value="<?=$Sservice?>" readonly="true"></div>
        <div class="form-group"><label for="adi" class=" form-control-label">Servis Alt Dalı</label><input type="text" id="input" name="retype" class="form-control" value="<?=$StypeName?>"></div>
        <div class="form-group"><label for="adi" class=" form-control-label">Etiketler</label><input type="text" id="input" name="retags" class="form-control" value="<?=$Stags?>"></div>
		<div class="form-group"><label for="aciklama" class=" form-control-label">Açıklama</label><textarea id="textarea-input" name="redescription" rows="4" placeholder="Hizmeti kısaca açıklayın" class="form-control"><?=$Sdescription?></textarea></div>
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