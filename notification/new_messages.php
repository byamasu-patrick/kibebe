<?php
    /**********************************************************
      * function fetch_new_messages: it helps to fetch new messages from the database return them
      *   the user who is currently Online
      * parameters:
      *   $db: contains the instance of the database
      *   $current_logged_in_user: contains the id of the current logged in user
      *   $current_receiver_user: contains the sender id of the user who has sent the message to the current logged in user
      * Author: Byamasu Patrick
      * company: takenoLAB - Dzaleka
      ******************************************************************/
    function fetch_new_messages($db, $current_logged_in_user, $current_receiver_user){
      $show_message_sql = "SELECT * FROM kibebe_message WHERE (sender_id = ? AND receiver_id = ? AND state = ?) OR (sender_id = ? AND receiver_id = ? AND state = ?) ORDER BY timestamp_sent";
      $stmt = $db -> prepare($show_message_sql);

      $stmt -> execute([ htmlspecialchars($current_receiver_user), htmlspecialchars($current_logged_in_user), 0, htmlspecialchars($current_logged_in_user), htmlspecialchars($current_receiver_user), 0]);
      $_message_content = array();
      $_nothing = array();
      if ($stmt -> rowCount() != 0) {
        # code...
        $i = 0;
        foreach ($stmt as $messages) {
          # code...

          $_message_content[$i] = $messages;
          update_message_state($db, $messages['message_id']);
          $i++;
        }
        echo json_encode($_message_content);
      }
      else{
        echo json_encode($_nothing);
      }

    }
    function update_message_state($db, $message_id){
      $sql = "UPDATE kibebe_message SET state = ? WHERE message_id = ?";
      $statement = $db -> prepare($sql);

      $statement -> execute([ 1, $message_id ]);
      //echo "Updated";
    }

 ?>
