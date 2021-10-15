function send_to_user(userId, senderId){
  jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "receiverID": userId
           },
             type: "POST",

             success: function(result){
                var filteredResult = JSON.parse(result);
              // var new_dat = filterResult;
              $('#current_chat_person').empty();

                console.log("Result from the server : "+ result +"\nReceiver Id : "+ userId +"\nSender Id :"+ senderId);
                $('#current_receiver').attr('value', filteredResult.ID);
                $('#current_chat_person').append('<div class="dropdown-list-image mr-2"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg" width="30" height="30">'+
                '</div><div class="font-weight-bold"><div class="text-truncate"><span style="font-style: 12px;">'+ filteredResult.Full_Name +'</span></div>'+
                '<p class="small text-gray-500 mb-0" style="font-size: 10px;"> Online </p></div>');
                $('#main_container_msg').empty();

                fecth_messages(senderId, userId);
                //refresh_new_message(userId, senderId);
             }
       });
}
function send_to_user_new(userId, senderId, smsID){
  jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "receiverID": userId
           },
             type: "POST",

             success: function(result){
                var filteredResult = JSON.parse(result);
              // var new_dat = filterResult;
              $('#current_chat_person').empty();

                console.log("Result from the server : "+ result +"\nReceiver Id : "+ userId +"\nSender Id :"+ senderId);
                $('#current_receiver').attr('value', filteredResult.ID);
                $('#current_chat_person').append('<div class="dropdown-list-image mr-2"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg" width="30" height="30">'+
                '</div><div class="font-weight-bold"><div class="text-truncate"><span style="font-style: 12px;">'+ filteredResult.Full_Name +'</span></div>'+
                '<p class="small text-gray-500 mb-0" style="font-size: 10px;"> Online </p></div>');
                $('#main_container_msg').empty();
                fecth_messages(senderId, userId);
                send_update(smsID);
                //refresh_new_message(userId, senderId);
             }
       });
}
function send_update(smsId){
  jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "message_id": smsId,
             "state_time": 1
           },
             type: "POST",

             success: function(result){
               console.log(result);
               $('#'+ smsId).remove();
             }
       });
}
function send_up(smsId){
  jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "message_id": smsId,
             "state": 1
           },
             type: "POST",

             success: function(result){
               console.log(result);
             }
       });
}
function fecth_messages(currentUser, receiverUser){
  jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "currentUser": currentUser,
             "receiverUser": receiverUser
           },
             type: "POST",

             success: function(result){
              var filteredResult = JSON.parse(result);
              if (filteredResult.length == 0) {
                console.log("NULL");
              }
              else{
                for (var i = 0; i < filteredResult.length; i++) {
                  if(filteredResult[''+ i].sender_id == currentUser){
                    send_up(filteredResult[''+ i].message_id);
                    $('#main_container_msg').append('<div class="row" style="margin-left: 20px;"><div class="col-2">'+
                            '<img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg" width="25" height="25" style="float: left">'+
                        '</div><div class="col-10"><p class="bg-primary sender-msg"><span class="sender_txt">'+ filteredResult[''+ i].message_content +'</span></p></div>'+
                      '</div>');
                  }
                  else{
                    send_up(filteredResult[''+ i].message_id);
                    $('#main_container_msg').append('<div class="row" style="margin-left: 20px;"><div class="col-10"><p class="bg-light sender-msg"><span class="receiver_txt">'+
                        filteredResult[''+ i].message_content +'</span></p></div><div class="col-2">'+
                                '<img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg" width="25" height="25">'+
                            '</div>'+
                      '</div>');

                  }
                }
              }
          }
             //}
       });
}
function send_current_sms(){
  var message_content = $("#current_message_content").val();
  var current_receiver_id = $("#current_receiver").val();
    //$("#current_receiver").val("");
    $("#current_message_content").val("");

    $('#main_container_msg').append('<div class="row" style="margin-left: 20px;"><div class="col-2">'+
            '<img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg" width="25" height="25" style="float: left">'+
        '</div><div class="col-10"><p class="bg-primary sender-msg"><span class="sender_txt">'+ message_content +'</span></p></div>'+
      '</div>');

  jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "message_content": message_content,
             "current_receiver_id": current_receiver_id
           },
             type: "POST",

             success: function(result){
                var filteredResult = JSON.parse(result);
                console.log(result);
               refresh_new_message(filteredResult.receiver_id, filteredResult.current_user);
                //$('#current_chat_person').empty();
             }
    });
}
function refresh_new_message(current_receiver_user, current_logged_in_user){
    var $request;
    if ($request != null){
        $request.abort();
        $request = null;
    }
  $request = jQuery.ajax({
           url: "notification/kibebe_send_messages.php",
           data: {
             "current_receiver_user": current_receiver_user,
             "current_logged_in_user": current_logged_in_user
           },
             type: "POST",

             success: function(result){
                var filteredResult = JSON.parse(result);
                // var new_dat = filterResult;
                if (filteredResult.length == 0) {
                  console.log("NULL");
                  refresh_new_message(current_receiver_user, current_logged_in_user);
                }
                else{
                  console.log(result);
                  for (var i = 0; i < filteredResult.length; i++) {
                    if(filteredResult[''+ i].sender_id == current_logged_in_user){
                      $('#main_container_msg').append('<div class="row" style="margin-left: 20px;"><div class="col-2">'+
                              '<img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg" width="25" height="25" style="float: left">'+
                          '</div><div class="col-10"><p class="bg-primary sender-msg"><span class="sender_txt">'+ filteredResult[''+ i].message_content +'</span></p></div>'+
                        '</div>');
                      refresh_new_message(current_receiver_user, current_logged_in_user);
                    }
                    else{
                      $('#main_container_msg').append('<div class="row" style="margin-left: 20px;"><div class="col-10"><p class="bg-light sender-msg"><span class="receiver_txt">'+
                          filteredResult[''+ i].message_content +'</span></p></div><div class="col-2">'+
                                  '<img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg" width="25" height="25">'+
                              '</div>'+
                        '</div>');
                        refresh_new_message(current_receiver_user, current_logged_in_user);

                    }
                  }
                  //  refresh_new_message(current_receiver_user, current_logged_in_user);
                //$('#current_chat_person').empty();
             }
           }
    });
}
