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
$query = "SELECT * FROM ncatalog WHERE ncatalog_number='".$new_number."'";
$result=mysqli_query($connect, $query);
echo ("<p>Обновлены: записи</p>\n");
while($row = mysqli_fetch_array($result)){
	

	print "<p>"."ID".$row["id"]."   ".$row["ncatalog_number"]."   ".$row["ncatalog_name"]."</p>\n";
}


?>