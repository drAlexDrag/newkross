$(document).ready(function(){
  document.cookie = "catalogDownload=false";
  // sessionStorage.setItem("catalogDownload", "false");
	loadData(1);
  // sessionStorage.setItem("fileDownload", "false");
});
function unitCatalog(id) {
	// var unit_id = id;
	// alert (id);
	$.ajax({
		url:"/catalog/catalog_unit.php",
		method:"POST",
		data:{unit_id:id},
		success:function(data){
			$('#content').html(data);
		}
	});
}
function departmentCatalog(unitid, depid) {
  $.ajax({
    url:"/catalog/catalog_department.php",
    method:"POST",
    data:{unit_id:unitid, department_id:depid},
    success:function(data){
      $('#content').html(data);
    }
  });
}
// function showLoader() {
//   console.log(sessionStorage.getItem("fileDownload"));
// //   document.getElementById("loader").style.display = "block";
//   // var timerId = setTimeout(function tick() {
//   if (sessionStorage.getItem("fileDownload")=="true"){
// document.getElementById("loader").style.display = "none";
// // // document.cookie = "fileDownload=false";
//   }
//   else {

//   }
// //   timerId = setTimeout(tick, 3000);
// // }, 3000);
// }
// function countDownloads() {
//   // showLoader() ;
//   // document.getElementById("loader").style.display = "block";
//   //  myVar = setTimeout(showLoader, 3000);
//  }
function loadData(page){
  $.ajax({
    url:"/catalog/catalog_phone.php",
    method:"POST",
    data:{page:page},
    success:function(data){
      $('#content').html(data);
    }
  });
  // $.ajax({
  //   url: 'catalog_poisk.php',
  //   success: function(data) {
  //     $('#poisk').html(data);
  //   }
  // });
}
// function searchNumber(argument) {// }
  $(document).on('keyup', '#searchString', function(){
  var searchString = $('#searchString').val();
  if(searchString.length>=3){
  $.ajax({
    url:"/catalog/catalog_search.php",
    method:"POST",
    data:{searchString:searchString},
    dataType:"text",
    success:function(data){
     $('#content').html(data);

   }
 });}
else{loadData(1);}
});

    function countDownloads() {
myVar = setTimeout(showLoader, 10);
    $.ajax({
      url: "countdownloads.php",
      cache: false,
      dataType:"html",
      success: function(data){
      }
    });

  }
  function showLoader() {
  document.getElementById("loader").style.display = "block";
  var timerId = setTimeout(function tick() {
  if (getCookie("catalogDownload")!="false"){
document.getElementById("loader").style.display = "none";
// sessionStorage.setItem("catalogDownload", "false");
document.cookie = "catalogDownload=false";
console.log("Загрузка завершена");
  }
  else {

  }
  timerId = setTimeout(tick, 3000);
}, 3000);
}
// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}