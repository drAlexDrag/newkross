<?php
require "../connect.php";
$ncatalog=R::getAll('SELECT id FROM ncatalog WHERE ncatalog_number="'.$_POST["value"].'"');
$krossdata=R::getAll('SELECT * FROM krossdata WHERE number="'.$_POST["value"].'"');
foreach ($krossdata as $row) {
		  $raspred=R::load( 'raspred', $row['raspred_id'] );
		  $raspred_name=$raspred->raspred_name;
		  $type=R::load( 'type', $row['type_id'] );
		  $type_name=$type->type_name;
		  $area=R::load( 'area', $row['area_id'] );
		  $area_name=$area->area_name;
	$sub_array = array(
		'id'=>$row['id'],
		'data'=>$row['data'],
		'number'=>$row['number'],
		'ncatalog_id'=>$row['ncatalog_id'],
		'comment'=>$row['comment'],
		'raspred'=>$raspred_name,
		'type'=>$type_name,
		'area'=>$area_name
	);
	$krossoutput[]=$sub_array;
}
		foreach ($ncatalog as $row) {
	// $sub_array = array();
	$result = R::load( 'ncatalog', $row["id"] );
		  $unit=R::load( 'unit', $result->unit_id );
		  $unit_name=$unit->unit_name;
		  $department=R::load( 'department', $result->department_id );
		  $department_name=$department->department_name;
		  $sector=R::load( 'sector', $result->sector_id );
		  $sector_name=$sector->sector_name;
	$sub_array = array(
    'id'=>$result->id,
    'ncatalog_number'=>$result->ncatalog_number,
    'ncatalog_name'=>$result->ncatalog_name,
    // 'unit'=>$result->unit_id,
    // 'department'=>$result->department_id,
    // 'sector'=>$result->sector_id,
    'unit_name'=>$unit_name,
    'department_name'=>$department_name,
    'sector_name'=>$sector_name,
    'visibility'=>$result->visibility,
    'free'=>$result->free,
    'ncatalog_cabinet'=>$result->ncatalog_cabinet,
    'krossdata'=>$krossoutput
  );
	$output[]=$sub_array;
}

		



echo json_encode($output);
?>