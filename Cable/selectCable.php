<?php
require "../connect.php";
if(isset($_SESSION['loginUser'])):?>



	<?php
	$selecsotnya=$_POST["selectsotnya"].'%';
	$area=$_POST["area"];
	$param_phone=$_POST["param_phone"];
require_once "../phpdebug/phpdebug.php";//вывод в консоль
$debug = new PHPDebug();
// $output = '';
$debug->debug("PHPDebug is Started", null, LOG);
	$out='';
	$i=0;
	$select_sotnya=R::getAll("SELECT DISTINCT * FROM krossdata WHERE krossdata.area_id=?
	AND length(krossdata.number)=? AND krossdata.number<>9999999 AND
	krossdata.data LIKE ?
	ORDER BY krossdata.number ASC", [$area, $param_phone, $selecsotnya]);
	// $select_sotnya=R::getAll("SELECT DISTINCT krossdata.number, krossdata.data FROM krossdata WHERE krossdata.area_id=1
	// AND length(krossdata.number)=7 AND krossdata.number<>9999999
	// ORDER BY krossdata.data ASC");
// var_dump($mion_all_gorod_number);
	foreach ($select_sotnya as $row){
		// $out.='<p>'.$row["number"].'---'.$row["data"].'</p>';
		$out.='<p>'.$row["number"].'</p>';
		$i++;

	}

	echo ('<p>Выбрано&ensp;&ensp;&ensp;&ensp;&ensp;'.$i.' строк</p>');
	echo $out;

	?>


<?php else:?>
  <script>window.location="login.php";</script>
<?php endif;?>