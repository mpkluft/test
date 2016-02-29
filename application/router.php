<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Тестовые задания</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper-main">

		<?php
		#подключаем представление 
		require_once "view/view_index.php";
		#подключаем представление модель и контроллер в соответствии с запросом
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
		  require_once "model/classes/class_".$_POST['task'].".php";
		  require_once "controller/controller_".$_POST['task'].".php";
		  require_once "view/view_".$_POST['task'].".php";
		}

		?>
		<span>Если скрипт не запустится. то сделайте на папку upload_file рекурсивно права 777 </h3>
	</div>
</body>
</html>