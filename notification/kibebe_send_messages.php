<?php
  session_start();
  include_once("../database/db_manager.php");
  include_once("new_messages.php");

  if(isset($_SESSION['userId'])){
    if (isset($_POST['message_content']) && isset($_POST['current_receiver_id'])) {
      # Send the message to the receiver_id
      //`message_id`, `sender_id`, `receiver_id`, `message_content`, `state`, `timestamp_sent`, `timestamp_received`
      $sender_id = (int) $_SESSION['userId'];
      $message_content = trim($_POST['message_content']);
      $receiver_id = (int) $_POST['current_receiver_id'];
      $timestamp_sent = date('Y-m-d H:i:s');
      $timestamp_received = $timestamp_sent;
      $state = 0;

      $msg_sql = "INSERT INTO id11496636_donline.kibebe_message (sender_id, receiver_id, message_content, state, timestamp_sent, timestamp_received)
            VALUES (?, ?, ?, ?, ?, ?)";

      $stmt = $db -> prepare($msg_sql);
      $stmt -> execute([ $sender_id, $receiver_id, $message_content, $state, $timestamp_sent, $timestamp_received ]);
      //echo "arrived";
      if ($stmt) {
        # code...
        echo json_encode([
          'current_user' => $sender_id,
          'receiver_id' => $receiver_id
        ]);
      }
    }
  }
  if (isset($_POST['receiverID'])) {
    # code...
    $receiverID = (int) trim($_POST['receiverID']);

    $show_sql = "SELECT * FROM kibebe_person WHERE ID = ?";
    $stmt = $db -> prepare($show_sql);

    $stmt -> execute([$receiverID]);

      if($message_data = $stmt -> fetch(PDO::FETCH_ASSOC)){
        echo json_encode($message_data);
      }
      else{
        echo json_encode(['result' => 0]);
      }

  }
  // "currentUser": currentUser, "receiverUser": receiverUser
  if (isset($_POST['currentUser']) && isset($_POST['receiverUser'])) {
    # code...
    $receiverId = (int) $_POST['receiverUser'];
    $show_message_sql = "SELECT * FROM kibebe_message WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp_sent";
    $stmt = $db -> prepare($show_message_sql);

    $stmt -> execute([ $_SESSION['userId'], $receiverId, $receiverId, $_SESSION['userId'] ]);
    $_message_content = array();
    $_nothing = array();
    if ($stmt -> rowCount() != 0) {
      # code...
      $i = 0;
      foreach ($stmt as $messages) {
        # code...
        $_message_content[$i] = $messages;
        //sif ( $messages['state'] == 0 ) { update_message_state($db, $messages['message_id']); }
        $i++;
      }
      echo json_encode($_message_content);
    }
    else{
      echo json_encode($_nothing);
    }

  }
  /************************************************************state_time
    *
    *
    *
    *
    ***********************************************************/
  if (isset($_POST['message_id']) && isset($_POST['state'])) {
    # code...
    $sql = "UPDATE kibebe_message SET state = ? WHERE message_id = ?";
    $statement = $db -> prepare($sql);

    $statement -> execute([(int)$_POST['state'], (int) $_POST['message_id'] ]);
    echo "Updated";
  }
  if (isset($_POST['state_time'])) {
    # code...
    $sql = "UPDATE kibebe_message SET state_time = ? WHERE message_id = ?";
    $statement = $db -> prepare($sql);

    $statement -> execute([(int)$_POST['state_time'], (int) $_POST['message_id'] ]);
    echo "Updated";
  }


  /***************************************************
    * handle the new messages and them back to the user
    * check if current_logged_in_user id was sent
    * check if current_receiver_user id was sent
    * fetch new messages from the database
    *
    **************************************************/
  if (isset($_POST['current_receiver_user']) && isset($_POST['current_logged_in_user'])) {
    # code...

    $current_receiver_user = trim($_POST['current_receiver_user']);
    $current_logged_in_user = trim($_POST['current_logged_in_user']);
    fetch_new_messages($db, $current_logged_in_user, $current_receiver_user);
  }
 ?>
