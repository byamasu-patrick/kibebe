function search_data(startLimit){
  $("#table_body").empty();
  $.ajax({
    url: "account/kibebe_artisan.php",
    data: {
      "starting_selection": startLimit
    },
      type: "POST",

      success: function(result){
        console.log(result);
        $("#table_body").append(result);
      }
  });
}
function display_data(){
  let endingSelection = $("#sort_by").val();
  $("#table_body").empty();
  $.ajax({
    url: "account/kibebe_artisan.php",
    data: {
      "ending_selection": endingSelection
    },
      type: "POST",

      success: function(result){
        console.log(result);
        $("#table_body").append(result);
      }
  });
}
