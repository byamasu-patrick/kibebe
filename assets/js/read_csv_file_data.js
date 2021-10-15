window.onload = () => {
  //alert("Ready");
  let butt = document.getElementById("submit_product");
  //$("#product-modal").attr("data-toggle", modal);
  butt.addEventListener('click', function(){
    let input = document.getElementById("files");
    if (input.files.length == 0 ) {
       //console.log(input.files);
       
       $("#modal-msg").remove();
       $("#modal-footer").remove();
       $("#modal-footer-button").remove();
       document.getElementById("modal_card_").style.display = "none";
       $("#modal_body").append("<p class='dialog dialog-danger' id='modal-msg' style='padding: 20px;'> Please choose the file you want to upload</p>");
       $("#modal-content").append('<div class="modal-footer" id="modal-footer">'+
        '<button type="submit" class="btn btn-primary" id="modal-footer-button" data-dismiss="modal">Close</button></div>');


       console.log("No file Selected");

     }
     else{
       $("#modal-msg").remove();
       $("#modal-footer").remove();
       $("#modal-footer-button").remove();
       document.getElementById("modal_card_").style.display = "block";
     }


  });


};

function uplaodAndReadCsvData(){};
function register_event(){
  let input = document.getElementById("files");

  input.addEventListener('change', function() {

    if (this.files && this.files[0]) {
      // get the file to read, read it and push the content into the array
      var fileToRead = this.files[0];
      var reader = new FileReader();

      reader.addEventListener('load', function(e){
        let csvdata = e.target.result;

        //  getPareseArtisanCsvData(csvdata);

          getParsecsvdata(csvdata);
      });
      reader.readAsBinaryString(fileToRead);
    }
  });
}

function getParsecsvdata (data){
  let parsedata = [];
  let newLineBreak = data.split("\n");
  for(let i = 0; i < newLineBreak.length; i++){
    parsedata.push(newLineBreak[i].split(","));
  }
  if (parsedata[0][0].toLowerCase() == "Name".toLowerCase()) {
      console.log(parsedata[parsedata.length - 1]);
      //alert("Arrived");
      $('#artisan_table_body').empty();
      for (let i = 1; i < parsedata.length - 1; i++) {
        $("#artisan_table_body").append('<tr><td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">'+ parsedata[i][0] +'</td>'+
              '<td>'+ parsedata[i][4] +'</td><td>'+ parsedata[i][6] +'</td><td>00</td></tr>');
      }
    }
    else{
    if (parsedata[0][0].toLowerCase() == "Product".toLowerCase()) {
      console.log(parsedata);
      $('#tableContent').empty();
      let tbodyElement = document.getElementById('tableContent');
      for (let i = 1; i < parsedata.length; i++) {
        var productInfo = '<tr>'+
                          '<td>'+ parsedata[i][0] +'</td>'+
                          '<td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/16003181_606799946177557_8001591489250445121_n.jpg">'+ parsedata[i][1] +'</td>'+
                          '<td>$ '+ parsedata[i][2] +'</td>'+
                          '</tr>';

          $("#tableContent").append(productInfo);
      }
    }
    else if (parsedata[0][0].toLowerCase() == "Raw Material".toLowerCase()) {
      $('#tableContent').empty();
      let tbodyElement = document.getElementById('tableContent');
      for (let i = 1; i < parsedata.length; i++) {
        var productInfo = '<tr>'+
                          '<td>'+ parsedata[i][0] +'</td>'+
                          '<td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/16003181_606799946177557_8001591489250445121_n.jpg">'+ parsedata[i][1] +'</td>'+
                          '<td>$ '+ parsedata[i][2] +'</td>'+
                          '</tr>';

          $("#tableContent").append(productInfo);
      }
    }

  }

}
// Creating the object of uplaodAndReadCsvData function
//  var parseCsvObject = new uplaodAndReadCsvData();
  //parseCsvObject.getCsv();
  register_event();
