<?php require 'includes/head.php';
     $query = $db->query("SELECT page_key FROM pages", PDO::FETCH_ASSOC);
     if  ( $query->rowCount() ){
         $pageTags = array();
    	 foreach($query as $row){
    		 array_push( $pageTags, $row);
    	 }
     }
?>
<div class="content mt-3">
 <div class="col-lg-12">
  <?php
     if(isset ($_POST["newPage"]))
     {
        $newKey = $_POST["key"];
        $newKey = mb_strtolower($newKey,"utf-8");
        $newTitle = $_POST["title"];
        $newTags = $_POST["tags"];
        $newDescription = $_POST["description"];
        
        $arrayNo = count($pageTags) - 1;
        $keyStatu = 0;
         for($syc=0; $syc<=$arrayNo; $syc++)
         {
            if($pageTags[$syc]['page_key'] == $newKey)
            {
                $keyStatu = 1;
                break;
            }
         }
         
         if($keyStatu != "1")
         {
            $query = $db->prepare("INSERT INTO pages SET
            page_key = ?,
            page_title = ?,
            page_keywords = ?,
            page_description = ?");
            $insert = $query->execute(array(
                 $newKey, $newTitle ,$newTags, $newDescription
            ));
            
            if ( $insert ){
             echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$newTitle.' sayfası başarıyla eklendi.
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
         else
         {
             echo '
              <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                 '.$newKey.' anahtarı zaten kullanılıyor.
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';
         }
     }
  ?>
  
 </div>

 <div class="col-lg-12">
	<div class="card">
	  <div class="card-header"><strong>Sayfa</strong><small> Düzenle</small></div>
	  <div class="card-body card-block">
      <form method="post" action="">                                                                                           
		<div class="form-group"><label for="tag" class=" form-control-label">Anahtar</label><input type="text" id="tag" name="key" placeholder="Yeni Anahtar" class="form-control" value="<?=$newKey?>"/></div>
		<div class="form-group"><label for="title" class=" form-control-label">Başlık</label><input type="text" id="title" name="title" placeholder="Yeni Başlık" class="form-control" value="<?=$newTitle?>"/></div>
		<div class="form-group"><label for="keywords" class=" form-control-label">Etiketler</label><input type="text" id="keywords" name="tags" placeholder="Yeni Etiketler" class="form-control" value="<?=$newTags?>"/></div>
		<div class="form-group"><label for="description" class=" form-control-label">Açıklama</label><input type="text" id="description" name="description" placeholder="Yeni Açıklama" class="form-control" value="<?=$newDescription?>"/></div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="newPage">
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