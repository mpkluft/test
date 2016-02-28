<?php
$task4 = new class_task4();

if($file_xml = $task4->unpack_file()) 
  
  if($parse_xml = $task4->parse_xml())
     
     $task4->inspection_urls();
?>