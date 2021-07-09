<?php
require_once '../connect.php';
$old_number=$_POST["old_number"];
$new_number=$_POST["new_number"];
$connect = mysqli_connect("localhost", "dron", "port2100", "newkross");
$query = "UPDATE ncatalog SET ncatalog_number='".$new_number."' WHERE ncatalog_number='".$old_number."'";
$result=mysqli_query($connect, $query);
// try {
// 	R::exec($query);
// 	echo 'Информация обновлена: ';
// } catch(RedBeanPHP\RedException\SQL $e){
// 	echo $e->getMessage();
// }
if ($result==false) {
	# code...
	echo mysqli_errno($connect). ": ".mysqli_error($connect)."\n";
	// print("Ошибка");
}
// $query = "SELECT * FROM ncatalog WHERE ncatalog_number='".$new_number."'";
// $result=mysqli_query($connect, $query);
// echo ("<p>Обновлены: записи</p>\n");
// while($row = mysqli_fetch_array($result)){
	

// 	print "<p>"."ID".$row["id"]."   ".$row["ncatalog_number"]."   ".$row["ncatalog_name"]."</p>\n";
// }
$phonenumber=$_POST["new_number"];
$output="";

$beans = R::getAll('SELECT id, ncatalog_number, ncatalog_name, ncatalog_cabinet
  FROM ncatalog
  WHERE ncatalog_number=?
  ORDER BY id ASC', [ $phonenumber]);
$output .= '<div class="bootstrap-table bootstrap4">';
$output.="<table class='table table-bordered table-hover'><thead><tr><th>ID</th><th>Номер</th><th>Имя</th><th>Кабинет</th></tr></thead><tbody>";
foreach($beans as $row)
{
	$output.="<tr>";
  $output.="<td>".$row["id"]."</td><td>".$row["ncatalog_number"]."</td><td>".$row["ncatalog_name"]."</td><td>".$row["ncatalog_cabinet"]."</td>";
  $output.="</tr>";
}
$output.="</tbody></table></div>";

echo $output;

?>