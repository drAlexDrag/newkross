<?php require "../connect.php";
if(isset($_SESSION['loginUser'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>See Cards</title>
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/icon/raphaelicons/raphaelicons.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/cards.css" />
    <!--  <link rel="stylesheet" href="/css/freenum.css" /> -->
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
	<form onsubmit="numberlive(); return false;">
		<div class="input-group mb-3">
    <?php
$output = '';
$number=R::getAll('SELECT id, ncatalog_number FROM ncatalog ORDER BY id');
$numOfnumber = R::count( 'ncatalog' );
$output = '<select class="form-control" style="min-width: 20vw; width: 200px" name="numberli" id="numberli" onchange="numberlive()">';
 foreach ($number as $row){
  $output .= '<option value="'.$row["id"].'" >'.$row["ncatalog_number"].'</option><br>';
 }
$output .= '</select>';
echo $output;
?>
    <div class="input-group-append">
      <button class="input-group-text" type="submit">Показать</button>
    </div>
  </div>
	</form>
<div id="content"></div>
	<script src="/js/seecards.js"></script>
</body>
</html>
<?php else:?>
  <script>window.location="login.php";</script>

<?php endif;?>