<?php 
require "includes/config.php";
$toDo = $_POST["bar"];

$query = $db->query("SELECT * FROM users Where user_mail LIKE '%{$toDo}%' or user_phone LIKE '%{$toDo}%' ", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
    echo '
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
    ';
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
    echo 'Kayıt Yok';
}
?>
