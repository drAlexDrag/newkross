<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/icon/raphaelicons/raphaelicons.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/mystyle.css" />
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

	<title>CNP</title>
</head>
<body>
	<h1>Смена номеров телефонов</h1>
	<div id="alert_message"></div> 
	<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Изменить номер</a>
  <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Загрузить список</button> -->
 <!--  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button> -->
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
      	<div class="form-group">

			<div class="row">
				<label class="control-label col-sm-3" for="old_number" placeholder="Старый номер">Старый номер:</label>

			<div class="col-sm-3">
			<input type="text" class="form-control autoListNumber" name="old_number" id="old_number"  autofocus placeholder="Старый номер"/>
			</div>
		</div>
		<hr>
		<div class="row">
			<label class="control-label col-sm-3" for="new_number" placeholder="Новый номер">Новый номер:</label>
			<div class="col-sm-3">
			<input type="text" class="form-control" name="new_number" id="new_number"  autofocus placeholder="Новый номер"/>
			</div>
		</div>
		<hr>
		<div class="row">
			<button class="btn btn-primary" type="button" id="one_number_change" onclick="update_number()">Заменить</button>
		</div>
		</div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
              	<div class="form-group">

		<hr>
		<div class="row">
			<label class="control-label col-sm-3" for="name_file_csv" placeholder="Новый номер">Имя файла:</label>
			<div class="col-sm-3">
			<input type="text" class="form-control" name="name_file_csv" id="name_file_csv"  autofocus placeholder="Имя файла"/>
			</div>
		</div>
		<hr>
		<div class="row">
			<button class="btn btn-primary" type="button" onclick="update_number_csv()">Заменить</button>
		</div>
		</div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
      	<div class="form-group">

<div id=infoPhone></div>
		</div>
      </div>
    </div>
  </div>

</div>

	<script src="/js/changenumberphone.js?123"></script>
</body>
</html>