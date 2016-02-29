<?php

#проверка отправки формы
if (isset($_POST['load'])){
  #присвоение результатов отправки формы 
  $url = $_POST['url'];
  $ftp = $_POST['ftp'] ? $_POST['ftp'] : 0;
  $sort_english_words = $_POST['sort_english_words'] ? 1 : 0;
  $load_ftp = $_POST['load_ftp'] ? 1 : 0;
  #создаем объект $task3, при этом передаем необходимые параметры
  $task3 = new class_task3($url, 0, 0, $ftp, $sort_english_words, $load_ftp);
  #проверка загрузки файла
  if($load_file = $task3->load_file()){
    #убедились, что распарсили xml
    if($parse_xml = $task3->parse_xml()){
      #проверка что результирующий файл создан
      if($task3->result()){
        #строка состояния. Переменная вызывается в view_task4.php
        $result = "Создан файл text.txt test/upload_file/task3/text.txt";

      } 

    }

  }

}

?>