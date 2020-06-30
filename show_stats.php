<?//require_once 'connect.php'; // подключаем скрипт
// Указываем кодировку, в которой будет получена информация из базы
// Извлекаем статистику по текущей дате (переменная date попадает сюда из файла count.php, который, в свою очередь, подключается в каждом из 4 обычных файлов)
$date = date("Y-m-d");
$stats = "";
$res = R::getAll('SELECT views, hosts, downloads FROM visits WHERE date=?', [$date]);

 foreach($res as $row)
  {
$stats='<div class="col-4">
                <div>
                    <p>Просмотров: '.$row['views'].'</p>
                </div>
            </div>
            <div class="col-4">
                <div class="employees">
                    <p>Уникальные: '.$row['hosts'].'</p>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <p>Скачано: '.$row['downloads'].'</p>
                </div>
            </div>';
}
echo($stats);
?>