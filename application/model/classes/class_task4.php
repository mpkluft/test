<?php
#подключаем ядро для задания 4
require_once getcwd()."/application/model/core/core_task4.php";

class class_task4 extends core_task4{

  private $local_xlsx;
  private $local_xml;
  private $local_extract;
  private $parse_xml;
  private $result_url;

  public function __construct(){
    $this->local_xlsx = getcwd()."/upload_file/task4/url.xlsx";
    $this->local_xml = getcwd() . "/upload_file/task4/unzip/xl/sharedStrings.xml";
    $this->local_extract = getcwd() . "/upload_file/task4/unzip";
  }

  public function unpack_file(){
    #Создаём объект для работы с ZIP-архивами
    $zip = new ZipArchive(); 
    #Открываем архив archive.zip 
    $zip->open($this->local_xlsx);
    #Извлекаем файлы в указанную директорию
    if ($zip->open($this->local_xlsx) === true){
      #Извлекаем файлы в указанную директорию
      $zip->extractTo($this->local_extract); 
      #Завершаем работу с архивом
      $zip->close(); 
      return true;
      } 
  }

  public function parse_xml(){
    #Парсим
    return $this->parse_xml = simplexml_load_file($this->local_xml);
  }

  public function inspection_urls(){
    #регулярное выражения для првоерки URL
    $reg = '/^(http:\/\/)[\w.-]+.([\w-.]+\/?){1,}\??utm_source=([\w-&\?]+)utm_medium=([\w-#&\?]+)utm_campaign=([\w-#&\?]+)utm_term=([\w-#\{\}]+)/';
  #Пробегаемся по URL xml файла. при это формируем два массива $arr[] - для нормальных URL, $arrnone[] - дял не прошедших проверку URL
  for ($i=0; $i < count($this->parse_xml->si) ; $i++){
    $mySrt = $this->parse_xml->si[$i]->t;
    if(preg_match($reg, $mySrt, $res)){
      $arr[] = $res[0];
    } 
    else{
      $arrnone[] = (string)$mySrt;
    }
  }
  #помещаем массивы $arr и $arrnone в массив $result_url
  $result_url['true_url'] = $arr;
  $result_url['false_url'] = $arrnone;
  #записываем массив $result_url в свойство $this->result_url
  return $this->result_url = $result_url;
  }

  public function show_report(){
    #вывод URL не прошедших проверку
    foreach ($this->result_url["false_url"] as $value){
      echo $value . "</br>";
    }
  }
  
}

?>