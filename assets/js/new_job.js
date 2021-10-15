window.onload = function(){
  get_artisan();
};
function get_artisan(){
  $.ajax({
    url: "account/kibebe_artisan.php",
    data: {
      "show": true
    },
      type: "POST",

      success: function(result){
        console.log(result);
        $("#led_by").append(result);
      }
  });
}
