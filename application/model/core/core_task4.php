<?php

	abstract class core_task4 {

	  abstract function unpack_file(); # распаковка Excel файла в test/upload_file/task4 для получения xml файла
	  abstract function parse_xml();  # парсинг xml файла
	  abstract function inspection_urls(); # проверка и сортировка полученных URL's
	  abstract function show_report(); # вывод результата 
	  
	}

?>