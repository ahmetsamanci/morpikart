<?php
     require 'includes/head.php';
?>
<div class="content mt-3">

<div class="col-md-12" style="margin-bottom: 15px;">
 <input type="text" class="form-control" placeholder="Kullanıcı maili yada telefonu ile arayın" name="search" id="use"/>
</div>

<table id="bootstrap-data-table" class="table table-striped table-bordered users">
<thead>
  <tr>
    <th>ID</th>
	<th>Kullanıcı</th>
	<th>Konum</th>
	<th>E Posta</th>
	<th>Telefon</th>
    <th>Tarih</th>
    <th>Görüntüle</th>
  </tr>
</thead>
<tbody>
 <?php
 
 $query = $db->query("select * from users", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){
	 foreach( $query as $row ){
       
		  echo '
		  <tr>
			<td>#'.$row['id'].'</td>
			<td>'.$row['user_name'].'</td>
            <td>'.$row['user_city'].'</td>
			<td>'.$row['user_mail'].'</td>
            <td>'.$row['user_phone'].'</td>
            <td>'.$row['user_date'].'</td>
            <td>
             <a href="user-detail.php?user='.$row['id'].'">
              <button type="button" class="btn btn-primary">Detaylar</button>
             </a>
            </td>
		  </tr>';
	 }
 }
 else
 {
    echo '
      <tr>
    	<td colspan="10">Kayıt yok.</td>
     </tr>';
 }
 ?>
</tbody>
</table>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#use").change(function() {
           $(".users td").fadeOut();
           var value = $("#use").val();
           
           if(value != "")
           {
           $.ajax({
					type: "POST",
					url: "searchuser.php",
					data: "bar="+value,
					success: function(x){
						$(".users").html(x);
					}
				});
           }
           else
           {
            $(".users td").fadeOut();
           }
        });
    })
</script>

<?php require 'includes/footer.php'; ?>