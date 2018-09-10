<?php
 require 'includes/head.php';
 
?>
<div class="content mt-3">
<div class="col-md-12">
 <?php
     if(isset ($_POST["saveIpButton"])){
        $blockIp = $_POST["newIp"];
        $blockOwner = $_POST["newIpOwner"];
        $blockCreated = $_SESSION["adminName"];
        if($blockIp != "")
        {
            $query = $db->prepare("INSERT INTO blockip SET
            block_ip = ?,
            block_owner = ?,
            block_created = ?");
            $insert = $query->execute(array(
                 $blockIp, $blockOwner, $blockCreated
            ));
            if ( $insert )
            {
               echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$blockIp.' blok listesine eklendi.
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';
            }
            else
            {
                echo '
                  <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                     Bilinmeyen bir sorun oluştu. Daha sonra tekrar deneyin.
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                		<span aria-hidden="true">&times;</span>
                	</button>
                  </div>';
            }
        }
     }
 ?>
</div>

 <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <strong>Block IP</strong> Ekle
      </div>
      <div class="card-body card-block">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3"><label for="ip-input" class="form-control-label">Ip Adresi</label></div>
            <div class="col-12 col-md-9"><input type="text" id="ip-input" name="newIp" placeholder="Ip Adresi" class="form-control"><small class="form-text text-muted">Kaydedilen Ip adresleri dashboard'da görünmeyecek</small></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="ip-input" class="form-control-label">Sahibi</label></div>
            <div class="col-12 col-md-9"><input type="text" id="ip-input" name="newIpOwner" placeholder="Sahibi" class="form-control"><small class="form-text text-muted">Blok edilecek Ip adresinin sahibi</small></div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="saveIpButton">
              <i class="fa fa-dot-circle-o"></i> Kaydet
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Reset
            </button>
          </div>
        </form>
    </div>
  </div>
 
 <div class="col-lg-12">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
   <thead>
    <tr>
	 <th>IP Adresi</th>
	 <th>Açıklama</th>
    </tr>
   </thead>
  <tbody>
  <?php
    $query = $db->query("SELECT * FROM blockip ORDER by block_owner asc", PDO::FETCH_ASSOC);
    if ( $query->rowCount() )
    {
    	 foreach($query as $row){
        	  echo '
    		  <tr>
    			<td>'.$row['block_ip'].'</td>
    			<td>'.$row['block_owner'].'</td>
   			  </tr>';
    	 }
    }
  ?>
  </tbody>
 </table>
</div>
</div>
<?php require 'includes/footer.php'; ?>