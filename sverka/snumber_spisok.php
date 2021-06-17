<?php
require "../connect.php";
if(isset($_SESSION['loginUser'])):?>



	<?php
require_once "../phpdebug/phpdebug.php";//вывод в консоль
$debug = new PHPDebug();
// $output = '';
$debug->debug("PHPDebug is Started", null, LOG);
	$out='';
	$i=0;
	$mion_all_gorod_number=R::getAll('SELECT DISTINCT krossdata.number FROM krossdata WHERE krossdata.area_id=3
	AND length(krossdata.number)=7 AND krossdata.number<>9999999 ORDER BY krossdata.number ASC');
// var_dump($mion_all_gorod_number);
	foreach ($mion_all_gorod_number as $row){
		$number=$row["number"];
		$number_c=R::getRow('SELECT ncatalog_number, ncatalog_name, ncatalog_cabinet FROM ncatalog WHERE CHAR_LENGTH(ncatalog_number)=7 AND ncatalog_number=? ORDER BY ncatalog_number', [$number]);
		// $debug->debug('xxx', null, LOG);
		// foreach ($number_c as $row){
			// $out .= '<p>'.$number.'----'.$number_c["ncatalog_number"].'----'.$number_c["ncatalog_name"].'</p>';
			// $out .= '<p>'.$number_c["ncatalog_number"].'----'.$number_c["ncatalog_name"].'</p>';
		$out .= '<p>'.$number_c["ncatalog_number"].'</p>';
			$i++;
		// }
		// $out .= '<p>'.$row["number"].'</p>';
	}

	echo ('<p>Выбрано&ensp;&ensp;&ensp;&ensp;&ensp;'.$i.' строк</p>');
	echo $out;

	?>
	<?php
	// $number_c=R::getRow('SELECT ncatalog_number, ncatalog_name, ncatalog_cabinet FROM ncatalog WHERE CHAR_LENGTH(ncatalog_number)=7 AND ncatalog_number=2122823 ORDER BY ncatalog_number');
	// var_dump ($number_c);
	// echo ($number_c["ncatalog_number"]);
	?>






<?php else:?>
  <script>window.location="login.php";</script>
<?php endif;?>