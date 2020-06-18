$(document).ready(function(){ });
  // $('#numcountup').on('click', function() {
  //   var value_number=parseInt($('#numberli').val(), 10);// parseInt($('#numberli').val(), 10) + 1
  //   $('#numberli').val(value_number+1);
  //   // if (($('#numberli').val())===null){$('#numberli').val("0");}
  //   console.log($('#numberli').val());
  //   // numberlive();
  // });
  // $('#numcountdown').on('click', function() {
    
  //   console.log($('#numberli').val());
  //   if (($('#numberli').val())===null){$('#numberli').val(($('#numOfnumber').text())-1);}
  //   $('#numberli').val( parseInt($('#numberli').val(), 10) - 1);
  //   // $('#numcountdown').text($('#numberli').val());
  //   // $('#numcountup').text($('#numberli').val());
  //   // $('#more').text($('#numberli').val());
  //   // numberlive();
  // });
function numberlive() {
  // body...
  var x = document.getElementById("numberli");
  var value=x.options[x.selectedIndex].text;
  $.ajax({
    url:"searchcards.php",
    method:"POST",
    data:{value:value},
    dataType:"json",
    success:function(data){
     $('#content').html('');
     // var ncatalog=data;
     var content='';
     for (var i = 0; i < data.length; i++) {
       content='<div class="container-fluid">\
  <form style="border-bottom: 5px solid red;">\
  <div class="row" style="padding-left: 30px; padding-right: 30px;">\
  <div class="col-sm-12">\
    <div class="row">\
      <div class="col-25">\
        <label for="ncatalog_number">Номер</label>\
      </div>\
      <div class="col-75">\
        <input value="'+data[i].ncatalog_number+'" type="text" id="ncatalog_number" name="ncatalog_number" disabled="disabled">\
      </div>\
    </div>\
    <div class="row">\
      <div class="col-25">\
        <label for="ncatalog_name">Имя</label>\
      </div>\
      <div class="col-75">\
        <input value="'+data[i].ncatalog_name+'" type="text" id="ncatalog_name" name="ncatalog_name" disabled="disabled">\
      </div>\
    </div>\
    <div class="row">\
      <div class="col-25">\
        <label for="unit_name">Управление</label>\
      </div>\
      <div class="col-75">\
        <input value="'+data[i].unit_name+'" type="text" id="unit_name" name="unit_name" disabled="disabled">\
      </div>\
    </div>\
    <div class="row">\
      <div class="col-25">\
        <label for="department_name">Отдел/Бюро</label>\
      </div>\
      <div class="col-75">\
        <input value="'+data[i].department_name+'" type="text" id="department_name" name="department_name" disabled="disabled">\
      </div>\
    </div>\
    <div class="row">\
      <div class="col-25">\
        <label for="ncatalog_cabinet">Кабинет</label>\
      </div>\
      <div class="col-75">\
        <input class="animate" value="'+data[i].ncatalog_cabinet+'" type="text" id="ncatalog_cabinet" name="ncatalog_cabinet" disabled="disabled">\
      </div>\
    </div>\
    </div>\
    <div class="col-sm-12" id="'+data[i].id+'">\
    </div>\
    </div>\
  </form>\
</div>'
       $('#content').append(content);
       console.log(data[i].krossdata);
       for (var k = 0; k < data[i].krossdata.length; k++) {
       var krossdata_content='<div class="row">\
      <div class="col-25">\
        <label for="'+data[i].krossdata[k].id+'">'+data[i].krossdata[k].raspred+' данные '+data[i].krossdata[k].area+'</label>\
      </div>\
      <div class="col-75">\
        <input value="'+data[i].krossdata[k].data+'" type="text" id="'+data[i].krossdata[k].id+'" name="'+data[i].krossdata[k].id+'" disabled="disabled">\
      </div>\
    </div>'
       $('#'+data[i].id).append(krossdata_content);
     }
     }
// prokrutka();
     
   }
 });
}


// function prokrutka()
// {
//   NowMsg=document.getElementById('ncatalog_name').value
//   NowMsg=NowMsg.substring(1,NowMsg.length)+' '+NowMsg.substring(0,1)
//   document.getElementById('ncatalog_name').value = NowMsg
//   bannerid=setTimeout("prokrutka()",190)
// }
// <div class="row">\
//       <div class="col-25">\
//         <label for="ncatalog_cabinet">Кабинет</label>\
//       </div>\
//       <div class="alert alert-secondary col-75">'+data[i].ncatalog_cabinet+'\
// </div>\
    // </div>\