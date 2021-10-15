<?php
  include_once("database/db_manager.php");
  $sql = "SELECT * FROM kibebe_person WHERE Full_Name != ?";

  $stmt = $db -> prepare($sql);

  $stmt -> execute([ $_SESSION['user'] ]);
  $people = "";
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $people .= '<a class="d-flex align-items-center dropdown-item" href="#" onclick="send_to_user(\''. $row['ID'] .'\', \''. $_SESSION['userId'] .'\');"  data-toggle="modal" style="margin-left: 0px; padding-left: 4px;">
        <div class="dropdown-list-image mr-2"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg" width="40" height="40">
            <div class="bg-success status-indicator rounded-circle" style="width: 8px; height: 8px; position: relative; left: 28px; top: -7px;"></div>
        </div>
        <div class="font-weight-bold">
            <div class="text-truncate"><span>'. $row['Full_Name'] .' - 58m</span></div>
            <p class="small text-gray-500 mb-0"> '. $row['Phone_Number'] .' </p>
        </div>
    </a>';
  }

  ?>
