<?php

#Создаем обект $task4
$task4 = new class_task4();
#Проверка распаковки файла
if($file_xml = $task4->unpack_file()) 
  #Проверка что парсинг прошел удачно
  if($parse_xml = $task4->parse_xml())
    #Проверка и сортировка URL
	$task4->inspection_urls();

?>