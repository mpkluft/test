<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Тестовые задания</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "view/view_index.php";

if($_SERVER['REQUEST_METHOD'] === 'GET'){

  require_once "model/classes/class_".$_GET['task'].".php";
  require_once "controller/controller_".$_GET['task'].".php";
  require_once "view/view_".$_GET['task'].".php";
    
}

$mystr = "Батарейки Duracell LR03-2BL Basic Duracell LR03-2BL Basic - 2 батарейки типа AAA. Они имеют напряжение питания - 1.5 V. Устройство, в котором вы будете использовать данные батарейки, проработает дольше и не подведет вас.";

$reg = "/([A-Za-z0-9.-]{2,})/";
$res = preg_match_all($reg, $mystr, $found, $order);
echo "<pre>";
print_r($found);
echo "</pre>";

for ($i=0; $i < count($found[0]); $i++) { 
  $str .= $found[0][$i] . ", ";
}
echo $str;
?>
</body>
</html>