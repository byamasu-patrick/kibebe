 <?php
  include_once("database/db_manager.php");

  $sql_statement = "SELECT * FROM kibebe_artisan WHERE artisan_id BETWEEN 1 AND 15 ORDER BY artisan_id DESC";

  $stmt = $db -> prepare($sql_statement);
  $stmt -> execute();

  $data = '';
  $i = 0;
  $limit = 10;
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    if ($row) {
      # code...
      //if($i == 0){ $limit = $row['artisan_id']; $i++; }
      $data .= '<tr><td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg"> '. $row['artisan_name'] .' </td>
          <td>'. $row['artisan_type_of_arts'] .'</td><td>'. $row['artisan_group'] .'</td><td>34</td>
      </tr>';
    }
  }
 ?>
