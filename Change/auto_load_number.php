<?php
require_once '../connect.php';
$phonenumber=$_POST["phonenumber"];
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
if ($beans==null){$output=''; $output='<br><div class="alert alert-info">
<strong>Info!</strong> Номер в базе отсутствует.
<hr>
<button type="button" class="btn btn-primary" onclick="tablnumber()">Добавить новый номер в справочник</button>
</div>';}
echo $output;
?>