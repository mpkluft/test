<?php
require_once getcwd()."/application/model/core/core_task3.php";

class class_task3 extends core_task3{

  private $url;
  private $local_xml;
  private $local_txt;
  private $result_load_file;
  private $result_parse_xml;
  private $sort_english_words;
  private $load_ftp;

  public function __construct($url, $local_xml, $local_txt, $ftp, $sort_english_words, $load_ftp) {

    $this->url = $url;
    $this->local_xml = $local_xml ? $local_xml : getcwd()."/upload_file/task3/text.xml";
    $this->local_txt = $local_txt ? $local_txt : getcwd()."/upload_file/task3/text.txt";
    $this->sort_english_words = $sort_english_words;
    $this->load_ftp = $load_ftp;

  }
  public function test(){
    echo $this->url . "</br>";
    echo $this->local_xml. "</br>";
    echo $this->local_txt. "</br>";
    //echo $this->result_load_file. "</br>";
    //var_dump($this->result_parse_xml);
    echo $this->sort_english_words. "</br>";
    echo $this->load_ftp. "</br>";
  }

  public function load_file(){

    return $this->result_load_file = file_put_contents(
                          $this->local_xml,
                          file_get_contents($this->url),
                          LIBXML_PARSEHUGE
                          );

  }

  public function parse_xml(){

     return $this->result_parse_xml = simplexml_load_file($this->local_xml);

  }

  public function load_ftp(){}
  public function result(){

      $result_parse_xml = $this->result_parse_xml;
      $tab = "\t";
      $enter = "\n";
      $result = "";

      foreach ($result_parse_xml->shop->categories->category as $category) {
        $idParentID[""+ $category['id'] +""] = (string)$category['parentId'];
      }

      foreach ($result_parse_xml->shop->categories->category as $category) {
        $idNameCategory[""+ $category['id'] +""] = (string)$category;
      }
      if(!$this->sort_english_words){
        foreach ($result_parse_xml->shop->offers->offer as $offer) {
          $mystring = $offer->price . $tab 
            . $offer->currencyId . $tab 
            . $offer->categoryId . $tab
            . $offer->name . $tab
            . $offer->description . $tab
            . $idNameCategory["".$offer->categoryId.""] . $tab
            . $idParentID["".$offer->categoryId.""]
            . $enter;
          $result .= $mystring;
        }
      }else {
        foreach ($result_parse_xml->shop->offers->offer as $offer) {
          $reg = "/([A-Za-z0-9.-]{2,})/";
          $str = "";
          $order = 0;
          $mystr = (string)$offer->description;
          $res = preg_match_all($reg, $mystr, $found, $order);
          for ($i=0; $i < count($found[0]); $i++) { 
            $str .= $found[0][$i] . ", ";
          }

          $mystring = $offer->price . $tab 
            . $offer->currencyId . $tab 
            . $offer->categoryId . $tab
            . $offer->name . $tab
            . $offer->description . $tab
            . $idNameCategory["".$offer->categoryId.""] . $tab
            . $idParentID["".$offer->categoryId.""] . $tab
            . $str
            . $enter;
          $result .= $mystring;
      }
    }

      return $result_file = file_put_contents($this->local_txt, $result);
  }
}
?>