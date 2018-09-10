<?php require 'includes/head.php';
	 @$pageID = $_GET["page"];
	 if(!is_numeric($pageID))echo '<script language="javascript">window.location="pages.php";</script>';
	 
	 $query = $db->query("SELECT * FROM pages WHERE id='{$pageID}'", PDO::FETCH_ASSOC);
	 if ( $query->rowCount() ){
		 foreach( $query as $row ){
			 $pageKey = $row['page_key'];
			 $pageTitle = $row['page_title'];
			 $pageKeywords = $row['page_keywords'];
			 $pageDescription = $row['page_description'];
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
     if(isset ($_POST["pageUpdate"]))
     {
        $newKey = $_POST["key"];
        $newTitle = $_POST["title"];
        $newTags = $_POST["tags"];
        $newDescription = $_POST["description"];
        
        $query = $db->prepare("UPDATE pages SET
        page_key = :page_key,
        page_title = :page_title,
        page_keywords = :page_keywords,
        page_description = :page_description
        WHERE id = :id");
        $update = $query->execute(array(
             "page_key" => $newKey,
             "page_title" => $newTitle,
             "page_keywords" => $newTags,
             "page_description" => $newDescription,
             "id" => $pageID
        ));
        if ( $update ){
             echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                '.$newTitle.' sayfası güncellendi.
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
  
 </div>

 <div class="col-lg-12">
	<div class="card">
	  <div class="card-header"><strong>Sayfa</strong><small> Düzenle</small></div>
	  <div class="card-body card-block">
      <form method="post" action="">                                                                                           
		<div class="form-group"><label for="tag" class=" form-control-label">Anahtar</label><input type="text" id="tag" name="key" placeholder="Yeni Anahtar" class="form-control" value="<?=$pageKey?>"/></div>
		<div class="form-group"><label for="title" class=" form-control-label">Başlık</label><input type="text" id="title" name="title" placeholder="Yeni Başlık" class="form-control" value="<?=$pageTitle?>"/></div>
		<div class="form-group"><label for="keywords" class=" form-control-label">Etiketler</label><input type="text" id="keywords" name="tags" placeholder="Yeni Etiketler" class="form-control" value="<?=$pageKeywords?>"/></div>
		<div class="form-group"><label for="description" class=" form-control-label">Açıklama</label><input type="text" id="description" name="description" placeholder="Yeni Açıklama" class="form-control" value="<?=$pageDescription?>"/></div>
		
		<div class="card-footer">
		   <button type="submit" class="btn btn-primary btn-sm" name="pageUpdate">
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