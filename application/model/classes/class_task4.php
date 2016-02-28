<?php
require_once getcwd()."/application/model/core/core_task4.php";

class class_task4 extends core_task4{

  private $local_xlsx;
  private $local_xml;
  private $local_extract;
  private $parse_xml;

  public function __construct(){
    $this->local_xlsx = getcwd()."/upload_file/task4/url.xlsx";
    $this->local_xml = getcwd() . "/upload_file/task4/unzip/xl/sharedStrings.xml";
    $this->local_extract = getcwd() . "/upload_file/task4/unzip";
  }

  public function unpack_file(){

      //Создаём объект для работы с ZIP-архивами
      $zip = new ZipArchive(); 
      //Открываем архив archive.zip 
      $zip->open($this->local_xlsx);
      //Извлекаем файлы в указанную директорию
      if ($zip->open($this->local_xlsx) === true) {
        $zip->extractTo($this->local_extract); //Извлекаем файлы в указанную директорию
        $zip->close(); //Завершаем работу с архивом
        return true;
      } 

  }

  public function parse_xml(){
    return $this->parse_xml = simplexml_load_file($this->local_xml);
  }

  public function inspection_urls(){
    $reg = '/^(http:\/\/)[\w.-]+.([\w-.]+\/?){1,}\??utm_source=([\w-&\?]+)utm_medium=([\w-#&\?]+)utm_campaign=([\w-#&\?]+)utm_term=([\w-#\{\}]+)/';
    //$reg = '/~(?:(?:ftp|https?)?://|www\.)[a-z_.]+?[a-z_]{2,6}(:?/[a-z0-9\-?\[\]=&;#]+)?~i/'
  for ($i=0; $i <450 ; $i++) { 
    $mySrt = $this->parse_xml->si[$i]->t;
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
  }

  public function show_report(){}
  
}

?>