<div class="wrapper">
  <h2>Задание 3</h2>
  <p>
    По адресу http://ya.icontext.ru/downloads/employment/text.xml находится XML-файл в формате Яндекс.маркета.
    Что это такое, можно (при необходимости) прочитать здесь: http://partner.market.yandex.ru/legal/tt/

    Нужно написать (и запустить) скрипт, который будет делать следующее:
      1) скачивать файл (нужно предусмотреть случаи, когда файл тяжелый)
      2) парсить скачанный файл и переводить его в текстовый с табуляцией в качестве разделителя:
         На каждой строке должна располагаться информация по одному товару.
         Для товара должна содеражться вся информация (в том числе категории и родительские категории в текстовом виде)
      3) (опционально) выносить всю латиницу из тега description в отдельный столбец в итоговом файле
      4) (опционально) грузить полученный txt на какой-нибудь ftp
  </p>
  <form  action="index.php" method="GET">
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
</div>