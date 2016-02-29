<div class="wrapper-task">
  <h2>Задание 3</h2>
  <p>
    По адресу http://ya.icontext.ru/downloads/employment/text.xml находится XML-файл в формате Яндекс.маркета.
  </p>
  <p>
    Что это такое, можно (при необходимости) прочитать здесь: http://partner.market.yandex.ru/legal/tt/
  </p>
  <p>
    Нужно написать (и запустить) скрипт, который будет делать следующее:
    <ol>
      <li>скачивать файл (нужно предусмотреть случаи, когда файл тяжелый)</li>
      <li>парсить скачанный файл и переводить его в текстовый с табуляцией в качестве разделителя: На каждой строке должна располагаться информация по одному товару.
         Для товара должна содеражться вся информация (в том числе категории и родительские категории в текстовом виде)</li>
      <li>(опционально) выносить всю латиницу из тега description в отдельный столбец в итоговом файле</li>
      <li>(опционально) грузить полученный txt на какой-нибудь ftp</li>
    </0l> 
  </p>
  <h3> Решение </h3>
  <form  class = "form" action="index.php" method="POST">
    <input type="checkbox" name="sort_english_words" value="1">
    <span>Отсортировать английские слова в отдельный столбик</span>
    </br>
    <input type="checkbox" name="load_ftp" value="1">
    <span>Отослать файл на ftp</span>
    <input type="text" name="ftp" placeholder="введите адрес ftp">
    </br>
    <input type="text" name="url" placeholder="введите url">
    <input type="submit" value="Загрузить" name="load">
    <input type="hidden" name="task" value="task3">
    <input type="hidden" name="loadtask" value="выбрать">
  </form>
  <h2><?php echo $result; ?></h2>
</div>