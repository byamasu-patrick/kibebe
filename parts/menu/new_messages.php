<?php
  include_once("database/db_manager.php");
  $show_message_sql = "SELECT kibebe_person.Full_Name, kibebe_person.ID, kibebe_message.message_content, kibebe_message.receiver_id, kibebe_message.sender_id,
  kibebe_message.timestamp_sent, kibebe_message.state, kibebe_message.message_id FROM kibebe_person, kibebe_message WHERE kibebe_person.ID = kibebe_message.sender_id AND kibebe_message.receiver_id = ? AND kibebe_message.state_time = ?";
  $stmt = $db -> prepare($show_message_sql);

  $stmt -> execute([ $_SESSION['userId'], 0 ]);
  $new_sms = "";
  while ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    # code...
    $new_sms .= '<a class="d-flex align-items-center dropdown-item" href="#" id="'. $data['message_id'] .'" onclick="send_to_user_new(\''. $data['sender_id'] .'\', \''. $data['receiver_id'] .'\', \''. $data['message_id'] .'\')" data-toggle="modal" data-target="#fraisInscription">
        <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar1.jpeg">
            <div class="bg-success status-indicator"></div>
        </div>
        <div class="font-weight-bold">
            <div class="text-truncate"><span>'. $data['message_content'] .'</span></div>
            <p class="small text-gray-500 mb-0">'. $data['Full_Name'] .' - 58m</p>
        </div>
    </a>';
  }
 ?>
