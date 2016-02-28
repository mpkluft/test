<?php

if (isset($_GET['load'])){

  $url = $_GET['url'];

  $ftp = $_GET['ftp'] ? $_GET['ftp'] : 0;
  $sort_english_words = $_GET['sort_english_words'] ? 1 : 0;
  $load_ftp = $_GET['load_ftp'] ? 1 : 0;
  

  $task3     = new class_task3($url, 0, 0, $ftp, $sort_english_words, $load_ftp);

  $load_file = $task3->load_file();

  if($load_file){

    $parse_xml = $task3->parse_xml();

      if($parse_xml){

        $task3->result();
         
        echo "<h2>Создан файл text.txt /upload_file/task3/text.txt</h2>";
        $task3->test();
      }

  }

}

?>