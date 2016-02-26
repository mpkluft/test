<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>задание 5</title>
</head>
<body>
	<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);


	if(!file_exists(getcwd() . "/upload/xl/sharedStrings.xml")) {
		$zip = new ZipArchive(); //Создаём объект для работы с ZIP-архивами
	  //Открываем архив archive.zip и делаем проверку успешности открытия
	  if ($zip->open("url.xlsx") === true) {
	    $zip->extractTo(getcwd() . "/upload/"); //Извлекаем файлы в указанную директорию
	    $zip->close(); //Завершаем работу с архивом
	    echo "разархивировано";
	  }
	  else {
	  	echo "Архива не существует!"; //Выводим уведомление об ошибке
	  }
	} else {
		echo "архив уже существует";
	}

	$local = getcwd() . "/upload/xl/sharedStrings.xml";

//$local = getcwd() . "/upload_file/text.xml";
$dom = new DomDocument();
$dom->load($local);
$root = $dom->documentElement;

echo "<pre>";
var_dump($root);
echo "</pre>";

/*
	$sxml = simplexml_load_file($local);

	if($sxml){
		//foreach ($sxml->si as  $value) {
		//	echo gettype($value) , "</br>";
		//}
		//for ($i=0; $i < 542 ; $i++) { 
		//	echo $sxml->si[$i];
		//}

		//$tab = "\t";
		//$enter = "\n";
		//$z = "";
		//echo $sxml->shop->categories->category[0];
		//$local2 = getcwd() . "/upload_file/text.txt";
		//foreach ($sxml->shop->offers->offer as $offer) {
			//$mystring = $offer->price . $tab 
		//			 . $offer->currencyId . $tab 
		//			 . $offer->categoryId . $tab
		//			 . $offer->name . $tab
		//			 . $offer->description . $tab
		//			 . $sxml->shop->categories->category[0]
		//			 . $enter;
		//	$z .= $mystring;
		$suka = $sxml->si->t;
		echo gettype($suka), "</br>";
		echo "<pre>";
		//print_r($sxml->si[10]->t);
		echo($sxml->si[1]->t) , "</br>";
		echo($sxml->si[2]->t) , "</br>";
		echo($sxml->si[3]->t) , "</br>";
		echo($sxml->si[4]->t) , "</br>";
		echo($sxml->si[5]->t) , "</br>";
		echo "</pre>";

		//$mySrt = $sxml->si[10]->t;

		//$reg = '/^(http:\/\/)[\w.-]+.([\w-]+\/){1,}\?utm_source=([\w-&\?]+)utm_medium=([\w-&\?]+)utm_campaign=([\w-&\?]+)utm_term=([\w-\{\}]+)/';
		$reg = '/^(http:\/\/)[\w.-]+.([\w-.]+\/?){1,}\??utm_source=([\w-&\?]+)utm_medium=([\w-#&\?]+)utm_campaign=([\w-#&\?]+)utm_term=([\w-#\{\}]+)/';
		//$reg = '/~(?:(?:ftp|https?)?://|www\.)[a-z_.]+?[a-z_]{2,6}(:?/[a-z0-9\-?\[\]=&;#]+)?~i/'
	for ($i=0; $i <450 ; $i++) { 
		$mySrt = $sxml->si[$i]->t;
		//$mySrt = $sxml->si[450]->t;
			if(preg_match($reg, $mySrt, $res)) {
				//echo "Выражение присутствует" . "</br>";
				//echo $res[0];
				 $arr[] = $res[0];
			} else {
				 $arrnone[] = $mySrt;
				 echo "Выражение отсутствует" . "</br>";
			}
	}
		


		//for ($i=0; $i <542 ; $i++) { 
		//	$arr[] = $sxml->si[$i]->t;
		//}
		//foreach ($arr as $key => $value) {
		//	echo  $value , "</br>";
		//}
		echo "<pre>";
		var_dump($arrnone);
		echo "</pre>";
	}
		//file_put_contents($local2, $z);


	?>
</body>
</html>