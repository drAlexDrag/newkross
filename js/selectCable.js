$(document).ready(function(){
  var data = {
  name: 'Jack',
  items: {
    dog: 4,
    car: 1,
    phone: 2,
  },
};

// объект в json
var json = JSON.stringify(data); // {"name":"Jack","items":{"dog":1,"car":1,"phone":2}}

// json в объект
var vata = JSON.parse(json); // объект
// var vata = JSON.parse('{"name":"Jack","items":{"dog":1,"car":1,"phone":2}}');
var header = '<h2>Name is ' + vata.name + '</h2>';
var list = '';

for (var i in data.items) {
  list += '<li>' + i + ': ' + vata.items[i] + ' шт. </li>';
}

document.getElementById('test').innerHTML += header;
document.getElementById('test').innerHTML += '<ul>' + list + '</ul>';

  });
function selectCable()
{
  // var objArea=paramArea();
  var selectsotnya=$("#sotnya").val();
  var area = $('#param_area').find(':selected').attr('data-id');
  var param_phone = $('#param_phone').find(':selected').attr('value');
  $.ajax({
    url:"selectCable.php",
    method:"POST",
    data:{selectsotnya:selectsotnya, area:area, param_phone:param_phone},
    dataType:"html",
    success:function(data)
    {
      $('#selectCable').html(data);

    },
    error:function(data)
    {

    }
  });


}