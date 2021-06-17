<?php
require "../connect.php";
if(isset($_SESSION['loginUser'])):?>
	<?php
$out='';
// $out= '<select class="form-control" style="min-width: 20vw" name="numberli" id="numberli" onchange="numberlive()">';
$number_c=R::getAll('SELECT ncatalog_number, ncatalog_name, ncatalog_cabinet FROM ncatalog WHERE CHAR_LENGTH(ncatalog_number)=7 ORDER BY ncatalog_number');
$i=0;
foreach ($number_c as $row) {
  // $out.= ($row["number"].'--id--'.$row["id"].'<br>');
  // $ppp=R::getAll('SELECT ncatalog_number FROM ncatalog WHERE ncatalog_number=?', [$row["number"]]);
  // if($ppp!=null){}
  //   else{
  //     $i++;
  //     // $out.= ($row["number"].'--id--'.($row["id"]).'<br>');
  //     $out .= '<option value="'.$i.'" >'.$row["number"].'</option><br>';
  //   }
	$mion_poisk=R::getAll('SELECT krossdata.id, ncatalog.id AS ncid, krossdata.data, raspred.raspred_name, krossdata.number, ncatalog.ncatalog_name, ncatalog.ncatalog_cabinet, type.type_name, krossdata.comment, area.area_name
FROM krossdata
INNER JOIN raspred ON krossdata.raspred_id = raspred.id
INNER JOIN ncatalog ON krossdata.ncatalog_id = ncatalog.id
INNER JOIN type ON krossdata.type_id = type.id
INNER JOIN area ON krossdata.area_id = area.id
WHERE krossdata.number=? AND area.area_name="Мион"
ORDER BY krossdata.number ASC', [$row["ncatalog_number"]]);
	// $out .= '<p>'.$row["ncatalog_number"].'&ensp;&ensp;&ensp;&ensp;&ensp;'.$row["ncatalog_name"].'</p>';
	
	if($mion_poisk!=null){
		$dz_poisk=R::getAll('SELECT krossdata.id, ncatalog.id AS ncid, krossdata.data, raspred.raspred_name, krossdata.number, ncatalog.ncatalog_name, ncatalog.ncatalog_cabinet, type.type_name, krossdata.comment, area.area_name
FROM krossdata
INNER JOIN raspred ON krossdata.raspred_id = raspred.id
INNER JOIN ncatalog ON krossdata.ncatalog_id = ncatalog.id
INNER JOIN type ON krossdata.type_id = type.id
INNER JOIN area ON krossdata.area_id = area.id
WHERE krossdata.number=? AND area.area_name="Дзержинка"
ORDER BY krossdata.number ASC', [$row["ncatalog_number"]]);
		// $out .= '<p>'.$row["ncatalog_number"].'</p>';
if($dz_poisk!=null){$i++; $out .= '<p>'.$i.'---'.$row["ncatalog_number"].'&ensp;&ensp;&ensp;'.$row["ncatalog_name"].'&ensp;&ensp;&ensp;'.$row["ncatalog_cabinet"].'</p>';//echo $dz_poisk;
;}else{}
	}
    else{
      // $i++;
      // $out.= ($row["number"].'--id--'.($row["id"]).'<br>');
      // $out .= '<p>'.$row["ncatalog_number"].'</p>';
    }
}
// $out .= '</select>';
$out .= '<p>Выбрано&ensp;&ensp;&ensp;&ensp;&ensp;'.$i.' строк</p>';
echo $out;
?>
<?php else:?>
  <script>window.location="login.php";</script>

<?php endif;?>