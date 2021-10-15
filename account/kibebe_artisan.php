<?php
  require_once("../database/db_manager.php");

  if (isset($_POST['starting_selection'])) {
    # code...
    $start_selection = (int) $_POST['starting_selection'];
    $end_selection = $start_selection  + 10;
    $sql_statement = "SELECT * FROM kibebe_artisan WHERE artisan_id BETWEEN ? AND ? ORDER BY artisan_id DESC";

    $stmt = $db -> prepare($sql_statement);
    $stmt -> execute([ $start_selection, $end_selection ]);
    $limit = 0;
    $i = 0;
    $data = '';
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
      if ($row) {
        # code...
        if($i == 0){ $limit = $row['artisan_id']; $i++; }
          $data .= '<tr><td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg"> '. $row['artisan_name'] .' </td>
              <td>'. $row['artisan_type_of_arts'] .'</td><td>'. $row['artisan_group'] .'</td><td>34</td></tr>';
        }
      }
        echo $data;
    }
    if (isset($_POST['ending_selection'])) {

      $end_selection = (int) $_POST['ending_selection'];
      $sql_statement = "SELECT * FROM kibebe_artisan WHERE artisan_id BETWEEN ? AND ? ORDER BY artisan_id DESC";

      $stmt = $db -> prepare($sql_statement);
      $stmt -> execute([ 1, $end_selection ]);
      $limit = 0;
      $i = 0;
      $data = '';
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        if ($row) {
          # code...
          if($i == 0){ $limit = $row['artisan_id']; $i++; }
            $data .= '<tr><td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg"> '. $row['artisan_name'] .' </td>
                <td>'. $row['artisan_type_of_arts'] .'</td><td>'. $row['artisan_group'] .'</td><td>34</td></tr>';
          }
        }
          echo $data;
    }
    if (isset($_POST['show'])) {

      $sql_statement = "SELECT * FROM kibebe_artisan";

      $stmt = $db -> prepare($sql_statement);
      $stmt -> execute();

      $data = '';
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        if ($row) {
          # code...
            $data .= '<option value="'. $row['artisan_id'] .'">'. $row['artisan_name'] .'</option>';
          }
        }
        echo $data;

    }


 ?>
