<?php

	abstract class core_task3 {

	  abstract function load_file(); # метод для загрузки xml файла на жесткий диск
	  abstract function parse_xml(); # парсинг xml файла 
	  abstract function load_ftp();  # загрузка файла на выбранный ftp
	  abstract function result(); # сохраняет конечный результат в файл
	  
	}

?>