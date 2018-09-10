<?php
 require 'includes/head.php'; 
?>
<div class="content mt-3">

	<div class="col-sm-12">
		<div class="alert  alert-success alert-dismissible fade show" role="alert">
		  Hoşgeldin, <?=$_SESSION["adminName"];?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>


   <div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-flat-color-1">
			<div class="card-body pb-0">
				<div class="dropdown float-right">
					<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
						<i class="fa fa-cog"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<div class="dropdown-menu-content">
							<a class="dropdown-item" href="visitors.php">Ziyaretçiler</a>
						</div>
					</div>
				</div>
				<h4 class="mb-0">
					<span class="count">
					 <?php
						 $visitors = 0;
						 $query = $db->query("SELECT DISTINCT log_ip FROM log", PDO::FETCH_ASSOC);
						 if ( $query->rowCount() ){
							 foreach( $query as $row ){
								 $visitors++;
							 }
						 }
					 ?>
					<?=$visitors?></span>
				</h4>
				<p class="text-light">Ziyaretçi</p>

				<div class="chart-wrapper px-0" style="height:70px;" height="70">
					<canvas id="widgetChart1"></canvas>
				</div>

			</div>

		</div>
	</div>

	<div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-flat-color-2">
			<div class="card-body pb-0">
				<div class="dropdown float-right">
					<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
						<i class="fa fa-cog"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<div class="dropdown-menu-content">
							<a class="dropdown-item" href="orders.php?Statu=1">Kargo Listesi</a>
							<?php if($_SESSION["adminID"] == "admin"){echo '<a class="dropdown-item" href="product-new.php">Yeni Ürün</a>';} ?>
						</div>
					</div>
				</div>
				<h4 class="mb-0">
					<span class="count">
					<?php
						 $services = 0;
						 $query = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
						 if ( $query->rowCount() ){
							 foreach( $query as $row ){
								 $services++;
							 }
						 }
						?>
					<?=$services?></span>
				</h4>
				<p class="text-light">Ürün</p>

				<div class="chart-wrapper px-0" style="height:70px;" height="70">
					<canvas id="widgetChart2"></canvas>
				</div>

			</div>
		</div>
	</div>

	<div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-flat-color-3">
			<div class="card-body pb-0">
				<div class="dropdown float-right">
					<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
						<i class="fa fa-cog"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<div class="dropdown-menu-content">
							<a class="dropdown-item" href="orders.php?Statu=0">Bekleyenler</a>
						</div>
					</div>
				</div>
				<h4 class="mb-0">
					<span class="count"><?php
						 $offers = 0;
						 $query = $db->query("SELECT * FROM offers", PDO::FETCH_ASSOC);
						 if ( $query->rowCount() ){
							 foreach( $query as $row ){
								 $offers++;
							 }
						 }
						?>
					<?=$offers?></span>
				</h4>
				<p class="text-light">Sipariş</p>

			</div>

				<div class="chart-wrapper px-0" style="height:70px;" height="70">
					<canvas id="widgetChart3"></canvas>
				</div>
		</div>
	</div>

	<div class="col-sm-6 col-lg-3">
		<div class="card text-white bg-flat-color-4">
			<div class="card-body pb-0">
				<div class="dropdown float-right">
					<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
						<i class="fa fa-cog"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<div class="dropdown-menu-content">
							<a class="dropdown-item" href="users.php">Üye Listesi</a>
						</div>
					</div>
				</div>
				<h4 class="mb-0">
					<span class="count">
                    <?php
						 $query=$db->query("select * from users");
                         $userCount = $query->rowCount();
					?>
					<?=$userCount?></span>
				</h4>
				<p class="text-light">Üye</p>

				<div class="chart-wrapper px-3" style="height:70px;" height="70">
					<canvas id="widgetChart4"></canvas>
				</div>

			</div>
		</div>
	</div>

   <div class="col-xl-3 col-lg-6">
		<section class="card">
			<div class="twt-feed blue-bg">
				<div class="corner-ribon black-ribon" style="font-size: 16px;">
					<i class="fas fa-user"></i>
				</div>
				<div class="fa fa-twitter wtt-mark"></div>

				<div class="media">
					<a href="profile-edit.php">
						<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/avatar/<?=$adminAvatar?>">
					</a>
					<div class="media-body">
						<h2 class="text-white display-6"><?=$_SESSION["adminName"];?></h2>
						<p class="text-light">
						 İçerik Yönetimi
						</p>
					</div>
				</div>
			</div>
		</section>
        
        <?php
             $query=$db->query("select * from todo where do_statu='1'");

		     $misTodo = $query->rowCount();//verilerin hepsini say.
        ?>
        
        <div class="col-md-12 col-lg-12">
    	<div class="card bg-flat-color-1 text-light">
    		<div class="card-body">
                <div>İlk hedeften kalan</div>
    			<div class="h4 m-0 count"><?=100-$misTodo?></div>
                <div>yapılacakları tamamla!</div>
    			<div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: <?=$misTodo?>%; height: 5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    			<small class="text-light"><b>Hedef: </b>Proje başlangıcından itibaren toplam 100 to-do işaretle!</small>
    		</div>
    	</div>
        </div>
        
        <div class="col-md-12">
		 <div class="card">
			 <div class="card-header">
				<strong class="card-title">Gelen Mesajlar</strong>
			 </div>
			 <div class="card-body">
			  <table id="bootstrap-data-table" class="table table-striped table-bordered">
				<thead>
				  <tr>
					<th>Tarih</th>
					<th>Görüntüle</th>
				  </tr>
				</thead>
				<tbody>
				 <?php
				 $query = $db->query("SELECT * FROM contact where contact_view='0' ORDER BY id DESC LIMIT 10", PDO::FETCH_ASSOC);
				 if ( $query->rowCount() ){
					 foreach( $query as $row ){
						  echo '
						  <tr>
							<td>'; 
                            $cTarih = $row['contact_date'];
                            
                            $gSure = mktime(substr($cTarih,11,2),substr($cTarih,14,2),substr($cTarih,15,2),substr($cTarih,5,2),substr($cTarih,8,2),substr($cTarih,0,4));
                            
                            echo gecen_sure($gSure);
                            echo '</td>
							<td><a href="contacts.php?contact='.$row['id'].'"><button type="button" class="btn btn-primary">Görüntüle</button></a></td>
						  </tr>';
					 }
				 }
                 else{
                    echo '<tr><td colspan="6" class="alert alert-warning">Hiç mesaj yok</td></tr>';
                 }
				 ?>
				</tbody>
			  </table>
				 <a href="contacts.php"><button type="button" class="btn btn-success">Tümünü Gör</button></a>
			 </div>
		 </div>
	</div>
    
        
	</div>


	<div class="col-xl-3 col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="fas fa-lira-sign" style="width: 70px; color: green; text-align: center; border-radius: 100%;"></i></div>
					<div class="stat-content dib">
						<div class="stat-text">Tahmini Kazanç</div>
                        <?php
                            $gain = 0;
                            $sales = 0;
                            
                            $query = $db->query("SELECT * FROM orders", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() ){
                                 foreach( $query as $row ){
                                     $sales++;
                                     $gain=+$gain+$row['order_total'];
                                 }
                            }
                        ?>
						<div class="stat-digit"><?=TL($gain)?></div> TL
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-xl-3 col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="fas fa-mouse-pointer" style="padding-left: 20px; width: 70px; color: green; text-align: center; border-radius: 100%;"></i></div>
					<div class="stat-content dib">
					 <?php
						 $sorgu = $db->prepare("SELECT COUNT(*) FROM log");
						 $sorgu->execute();
						 $say = $sorgu->fetchColumn();
					 ?>
						<div class="stat-text">Toplamda</div>
						<div class="stat-digit count"><?=$say?></div>Tıklama
					</div>
				</div>
			</div>
		</div>
    </div>

	<div class="col-xl-3 col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="fas fa-project-diagram" style="width: 75px; color: green; text-align: center; border-radius: 100%; padding: 20px 0px;"></i></div>
					<div class="stat-content dib">
						<div class="stat-text">Şuanda</div>
						<div class="stat-digit count"><?=$sales?></div>Satış
					</div>
				</div>
			</div>
		</div>
	</div>
    
	<div class="col-xl-9">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="fas fa-sticky-note text-danger border-danger"></i></div>
					<div class="stat-content dib">
						<div class="stat-text">To-Do List</div>
						<ul style="list-style: none;">
                        <li class="text-danger border-danger" id="newTodo"></li>
						<?php
						     $query = $db->query("SELECT * FROM todo ORDER BY id DESC", PDO::FETCH_ASSOC);
						     if ( $query->rowCount() ){
						     	 foreach( $query as $row ){
						     		 if($row['do_statu'] == 0){
										 echo '<li class="text-danger border-danger" id="9'.$row['id'].'"><strong style="padding-right: 15px;"><input type="checkbox" class="cTodo" value="'.$row['id'].'"/></strong><i class="far fa-clock"></i> '.$row["do_message"].'</li>';
									 }
									 else{
										 echo '<li class="text-primary border-primary"><strong style="padding-right: 15px;"><input type="checkbox" checked="true" disabled/></strong><i class="fas fa-check"></i> '.$row["do_message"].'</li>';
									 }
						     	 }
						     }
						 ?>
						 </ul>
					</div>
                    
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function(){
                        $(".cTodo").click(function(){
                            this.disabled=true;
                            var deger = $(".cTodo[type='checkbox']:checked").val();
                            this.checked = false;
                            
                            
                        $.ajax({
    					type: "POST",
    					url: "checkedTodo.php",
    					data: "deger="+deger,
    					success: function(x){
                             var sinif = 9;
                             sinif = 9+""+deger;
                             $("#"+sinif).fadeOut();
                             $("#"+sinif).removeClass("text-danger border-danger").addClass("text-primary border-primary");
                             $("#"+sinif).fadeIn();
                           }
    				    });
                            
                            
                        });
                    });
                    </script>
                    
                    
                    <!-- Yeni todo ekle -->
                    <div class="card">
                	  <div class="card-body card-block">
                		<input type="text" placeholder="Yapılacak bir iş.." class="form-control" id="bar" name="bar"/>
                	  </div>
                       <div class="card-footer text-right">
                    	 <button type="submit" class="btn btn-primary btn-sm" id="toDoSubmit">
                    	  <i class="fa fa-dot-circle-o"></i> Kaydet
                    	 </button>
       	               </div>
                       <div id="sonuc" role="alert"></div>
                    </div>
<script type="text/javascript">
	$(function(){
		$("#sonuc").hide();
        $("#newTodo").hide();
		$("#toDoSubmit").click(function(){
			var value = $("#bar").val();
			if(!value){
				$("#sonuc").fadeIn(200).addClass("alert alert-danger").html("");
				$("#sonuc").html("todo mesajı boş bırakılamaz.");
			}else{
				
				$.ajax({
					type: "POST",
					url: "savetoDo.php",
					data: "bar="+value,
					success: function(x){
						if(x == "bos"){
							$("#sonuc").fadeIn(200).addClass("alert alert-danger").html("");
							$("#sonuc").html("todo mesajı boş bırakılamaz.");
						}else if(x == "yok"){
							$("#sonuc").fadeIn(200).addClass("alert alert-danger").html("");
							$("#sonuc").html("Bilinmeyen bir sorun oluştu");					
						}else{
							$("#sonuc").fadeIn(200).addClass("alert alert-success").html("");
							$("#sonuc").html("Yeni To-Do eklendi.");
                            $("#newTodo").fadeIn(200);
                            $("#newTodo").html('<i class="far fa-clock"></i> '+value);
                            document.getElementById('bar').value = '';
                            $("#sonuc").fadeOut(2000);
						}
					}
				});
				
			}
		
		});
			
			
	});
	</script>
                  
				</div>
			</div>
		</div>
	</div>
    
</div>

    
<?php require 'includes/footer.php'; ?>
