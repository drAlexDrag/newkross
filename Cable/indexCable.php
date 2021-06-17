<?php
require "../connect.php";
if(isset($_SESSION['loginUser'])):?>
  <!DOCTYPE html>
  <html>
  <head>
    <title id="kross">Кабеля</title>
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/icon/raphaelicons/raphaelicons.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/mystyle.css" />
    <!--  <link rel="stylesheet" href="/css/freenum.css" /> -->
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/selectCable.js"></script>
    <!-- <script src="/js/myjs.js"></script> -->
    <!-- <script src="/js/livereload.js"></script> -->

  </head>
  <body style="font-size: 0.8rem;">
    <h3>Просмотр сотни</h3>

    <div class="container-fluid-xl p-1">
        <?php
// require 'connect.php';
$output = '';
$area=R::getAll('SELECT * FROM area ORDER BY id');
$output = '<select class="form-control" size="1" name="param_area" id="param_area" onchange="fetchData(1)" style="color: #000; font-size: 16px; font-weight: 900;" >';
 foreach ($area as $row ){
  $output .= '<option data-id="'.$row["id"].'" value="'.$row["area_name"].'" >'.$row["area_name"].'</option>';
 }
$output .= '</select>';
echo $output;
?>
<hr>
<input type="text" name="sotnya" id="sotnya">
<select size="1" name="param_phone" id="param_phone" style="color: #000; font-size: 16px; font-weight: 900;" >
  <option value="4">Внутренние</option>
  <option value="7">Городские</option>
</select>
<!-- <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="param_phone" value="4">Внутренние
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="param_phone" value="7">Городские
  </label>
</div> -->
<a href="#" onclick="selectCable()">Выбрать сотню</a>
<div class="container-fluid-xl p-1" id="selectCable"></div>
    </div>

    <div id="test"></div>
    </body>
</html>
<?php else:?>
  <script>window.location="login.php";</script>

<?php endif;?>