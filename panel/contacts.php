<?php
 require 'includes/head.php';
 @$contactID = $_GET["contact"];
 
 if($contactID != "" && !is_numeric($contactID)) echo '<script language="javascript">window.location="contact-list.php";</script>';
 
 // mail
 $query = $db->query("SELECT * FROM contact WHERE id='{$contactID}'", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
 	 foreach( $query as $row ){
 		 $contactName = $row['contact_name'];
 		 $contactEmail = $row['contact_email'];
 		 $contactType = $row['contact_type'];
 		 $contactMessage = $row['contact_message'];
 		 $contactUnit = $row['contact_unit'];
 		 $contactStatu = $row['contact_statu'];
 		 $contactView = $row['contact_view'];
 		 $contactIP = $row['contact_ip'];
 		 $contactDate = $row['contact_date'];
		 
		 $unitName = "Bilinmiyor";
		 $query = $db->prepare("SELECT * FROM services WHERE id = ?");
		 $query -> execute(array($contactUnit));
		 $result = $query -> fetch();
		 if ( $result )
		 {
			 $unitName = $result['service_name'];
		 }
		 else
		 {
			 if($contactUnit == 0){
			     $unitName = "Genel";
			 }
		 }
		 
 	 }
 }
 elseif($contactID == ""){
	 echo '<script language="javascript">window.location="contact-list.php";</script>';
 }
 else
 {
	 echo '
	 <div class="content mt-3">
	  <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
         Mesaj bulunamadı. Kaldırılmış yada düzenlenmiş olabilir.
        </div>
       </div>
	 </div>';
	 exit;
 }
 
?>
<div class="content mt-3">
 <div class="content col-md-12" style="background: #fff; padding: 10px;">
  <h2 style="padding: 5px;"><?=$contactName?></h2>
  <span><b>Mesaj Tipi:</b> <?=$contactType?></span><br/>
  <span><b>Birim:</b> <?=$unitName?></span><br/>
  <span><b>Email:</b> <?=$contactEmail?></span><br/>
  <span><b>IP Adres:</b> <?=$contactIP?></span><br/>
  <span><b>Tarih:</b> <?=$contactDate?></span><br/>
  <span><p style="color: black; padding: 15px; text-indent: 15px; font-style: italic;"><b>Mesaj:</b> <?=$contactMessage?></span></p><br/>
 </div>
</div>

<?php
	 $query = $db->prepare("UPDATE contact SET
	 contact_view = ?
	 WHERE id = ?");
	 $update = $query->execute(array(
		 "1",$contactID));
?>

<?php require 'includes/footer.php'; ?>