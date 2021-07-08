<?php
 $file_name=$_POST["file_name"];
 $tmpName = $_FILES['csv'][$file_name];
 var_dump($tmpName);
?>