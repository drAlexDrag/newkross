$(document).ready(function(){
  // $("#hide").click(function(){
  // // $('#alert_message').html('');
  // alert ("dwdwdwd");
  //   $("#alert_message").hide();
  // });
})
var user=localStorage.getItem('user');
function update_number() {
  // body...
  var old_number = $('#old_number').val()
  var new_number = $('#new_number').val()
  console.log(old_number)
  console.log(new_number)
      $.ajax({
      url:"update_number.php",
      method:"POST",
      data:{old_number:old_number, new_number:new_number, user:user},
      success:function(data)
      {
         $("#alert_message").show();
 $('#alert_message').html('<div class="container-fluid alert alert-success">\
   <button class="btn btn-primary" type="button" id="hide" onclick="hide_alert()">Скрыть</button>\
   '+data+'</div>');
 // setInterval(function(){
 //       $('#alert_message').html('');
 //     }, 10000);
      }
    })   
}

function hide_alert() {
   $("#alert_message").hide()
}

function update_number_csv() {
  // body...
  var file_name = $('#name_file_csv').val()
  alert (file_name);
        $.ajax({
      url:"update_number_csv.php",
      method:"POST",
      data:{file_name:file_name},
      success:function(data)
      {

      }
    })   
}
$(document).on('keyup', '.autoListNumber', function(){//роверка информации по номеру

  var idinput=event.target.id
  console.log (idinput)
  // input=event.target.id;
  // var tablename = event.target.dataset.table;
  // // console.log("onkeyup: Таблица---", tablename+'\n'+
  // //   "Инпут---", idinput+'\n'+
  // //   "Значение---", $(this).val()+'\n'+
  // //   "Id Значения---", $(this).attr("data-table-id"));
  var phonenumber = $(this).val()
  console.log (phonenumber.length+"---"+phonenumber)
  if (phonenumber.length==7){
    autoloadNumberInfo(phonenumber)
  }
  // var iddatatable = $(this).attr("data-table-id");
  // var columnname=tablename+"_name";
  // if (idinput=="number"){columnname=tablename+"_number";}
  // // console.log("onkeyup: Имя столбца", columnname);
  // idinput='#'+idinput;
  // $(idinput).attr({"data-table-id":""});
  // $('#result').remove();
  // $(idinput).addClass('alert alert-danger');
  // btnblock();
  // autoListData(tablename, idinput, query, columnname, iddatatable, input);
})
function autoloadNumberInfo(phonenumber) {
  // body...
  $.ajax({
      url:"auto_load_number.php",
      method:"POST",
      data:{phonenumber:phonenumber},
      success:function(data)
      {
        $('#infoPhone').html(data)

      }
    }) 
}