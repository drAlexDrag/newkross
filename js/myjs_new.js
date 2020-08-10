$(document).ready(function(){
	if (($('#adm').text())!=1)
		{$(".admin").remove()}
	$('[data-toggle="popover"]').popover()
	fetchData(1)
	var user=$('#login').text()
	sessionStorage.setItem("user", user)
})
var modalWindow=document.getElementById("modalWindow")
var search=document.getElementById("search")
var modalWindowCat=document.getElementById("modalWindowCat")
var objArea=paramArea()
//Загрузка начальной страницы
function fetchData(page){
	modalWindow.src=("/views/modal.ejs")
	search.src=("/views/search_form.ejs")
  // modalWindowCat.load("/views/modal_cat.ejs")
  $.ajax({
  	url:"select.php",
  	method:"POST",
  	data:{area:objArea.name, page:page},
  	dataType:"html",
  	success:function(data)
  	{
  		$('#content').html(data)
  	},
  	error:function(data)
  	{

  	}
  })
}
//Выбор кроссового журнала
function paramArea(){
  var area = [("param_area", param_area.value), $('#param_area').find(':selected').attr('data-id')];
  var objArea = new Object();
  objArea.id=area[1];
  objArea.name=area[0];
  console.log("ID площадки (id area)", objArea.id);
  console.log("Кроссовый журнал-----", objArea.name);
  return (objArea);
}