<?php require 'includes/head.php'; ?>
<div class="content mt-3">
 <div class="col-lg-12">
	<div class="card">
	  <div class="card-header"><strong>İş</strong><small> Yeni</small></div>
	  <div class="card-body card-block">
		<div class="form-group"><label for="company" class=" form-control-label">Müşteri Adı</label><input type="text" id="company" placeholder="Müşteri Adı" class="form-control"></div>
		<div class="form-group"><label for="street" class=" form-control-label">Hizmet</label>
		 <select name="select" id="select" class="form-control">
          <option value="0" selected disabled>Hizmet seçin</option>
		  <?php
			$query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				 foreach( $query as $row ){
					  print '<option>'.$row['service_name'].'</option>';
				 }
			}
		  ?>
         </select>
		</div>
        <div class="form-group"><label for="company" class=" form-control-label">Hizmet Tipi</label><input type="text" id="company" placeholder="Hizmet Tipi" class="form-control"></div>
        <div class="form-group"><label for="company" class=" form-control-label">Hizmet Bedeli (TL)</label><input type="number" id="company" placeholder="Hizmet Bedeli (TL)" value="0" class="form-control"></div>
        <div class="form-group"><label for="company" class=" form-control-label">Durum Açıklaması</label><input type="text" id="company" placeholder="Durum Açıklaması" value="İş oluşturuldu" class="form-control"></div>
        <div class="form-group"><label for="company" class=" form-control-label">Müşteri Adı</label><input type="text" id="company" placeholder="İş Harita Adresi & Website Bağlantısı" class="form-control"></div>
		
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm">
		    <i class="fa fa-dot-circle-o"></i> Kaydet
		   </button>
		   <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> İptal
		   </button>
	      </div>
	  </div>
	</div>
 </div>
</div>
<?php require 'includes/footer.php'; ?>