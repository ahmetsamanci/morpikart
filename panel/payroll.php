<?php
 require 'includes/head.php';
?>
<div class="content mt-3">
<div class="col-md-12">
 <?php
     if(isset ($_POST["saveChart"])){
        
        $succStat = 0;
        $errorStat = array();
        
        for($cino = 1; $cino<=50; $cino++)
        {
            $cinoName = 'ino'.$cino;
            $chartValue = $_POST[$cinoName];
            
            $query = $db->prepare("UPDATE chart SET
            chart_total = :total
            WHERE id = :id");
            $update = $query->execute(array(
                 "total" => $chartValue,
                 "id" => $cino
            ));
            if ( $update ){
                 $succStat++;
            }
            else
            {
                array_push($errorStat,$cino);
            }
        }
        
        if($succStat == 50)
        {
            echo '
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                Fiyat çizelgesi güncellendi. Tabloda yenilikleri görebilmek için yeniden yükleyin.(F6 + Enter)
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';
        }
        else
        {
            echo '
              <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                 Fiyat güncelleme sırasında bir sorun oluştu';
                 
                 foreach($errorStat as $errorID)
                 {
                    echo ' #'.$errorID.', ';
                 }
                 
                 echo '
                 kimlikli fiyatlar değiştirilemedi.
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
              </div>';
        }
     }
 ?>

</div>

 <div class="col-md-12">
 
 <form method="post" action="" name="chart">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
   <thead>
    <tr>
     <th>String ID</th>
	 <th>Fiyat Başlığı</th>
     <th>Boyut</th>
     <th>Tutar</th>
    </tr>
   </thead>
  <?php
    $query = $db->query("SELECT * FROM chart ORDER by id", PDO::FETCH_ASSOC);
    if ( $query->rowCount() )
    {
        $inputNo = 0;
    	 foreach($query as $row){
    	   $inputNo++;
        	  echo '
    		  <tr>
                <td>#'.$row['chart_id'].'</td>
    			<td>'.$row['chart_title']; if($row['chart_title_en'] != ""){echo '<br/><small>(EN: '.$row['chart_title_en'].')</small>';} echo '</td>
    			<td>'.$row['chart_value'].'</td>
                <td>
                 <input type="number" class="form-control" min="30" value="'.TL($row['chart_total']).'" name="ino'.$inputNo.'"/>
                </td>
   			  </tr>';
    	 }
    }TL($row['chart_total'])
  ?>
  </tbody>
 </table>
 <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm" name="saveChart">
      <i class="fa fa-dot-circle-o"></i> Kaydet
    </button>
    <button type="reset" class="btn btn-danger btn-sm">
      <i class="fa fa-ban"></i> İptal
    </button>
  </div>
 </form>
</div>

<?php require 'includes/footer.php'; ?>