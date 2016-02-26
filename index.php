<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form  action="index.php" method="GET">
	<input type="text" name="url" placeholder="введите url">
	<input type="submit" value="Загрузить" name="load">
</form>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



if (isset($_GET['load'])) {
	$url = $_GET['url'];
	$local = getcwd() . "/upload_file/text.xml";
	$x = file_put_contents($local, file_get_contents($url),LIBXML_PARSEHUGE);

	$sxml = simplexml_load_file($local);



	if($sxml){

		foreach ($sxml->shop->categories->category as $category) {
			$idParentID[""+ $category['id'] +""] = (string)$category['parentId'];
		}

		foreach ($sxml->shop->categories->category as $category) {
			$idNameCategory[""+ $category['id'] +""] = (string)$category;
		}

		$tab = "\t";
		$enter = "\n";
		$z = "";
		echo $sxml->shop->categories->category[0];
		$local2 = getcwd() . "/upload_file/text.txt";
		foreach ($sxml->shop->offers->offer as $offer) {
			$mystring = $offer->price . $tab 
					 . $offer->currencyId . $tab 
					 . $offer->categoryId . $tab
					 . $offer->name . $tab
					 . $offer->description . $tab
					 . $idNameCategory["".$offer->categoryId.""] . $tab
					 . $idParentID["".$offer->categoryId.""]
					 . $enter;
			$z .= $mystring; 
		}
		if (file_put_contents($local2, $z)) {
			echo "все хорошо";
		} else {
			echo "все плохо";
		}
		
	}
}


//echo "<pre>";
//print_r($idNameCategory);
//echo "</pre>";

//echo phpinfo();
//chmod("text.txt");
/*
function get_my_vars($arr){
  foreach($arr as $key=>$value){
  /*тут код вывода данных переданных в $arr 
    как вариант лучше исользовать канкатенацию и вернуть все значения
    $val.=$value;
  }
 return $val; 
 */
?>
</body>
</html>