Главный файл - index.php

Задание 3 - результирующий файл text.txt, расположенный по адресу 
test/upload_file/task3/text.txt

Структура приложения

test
..application
....controller
......controller_task3.php     # контроллер задания 3
......controller_task4.php     # контроллер задания 4 
....model
......classes
........class_task3.php        # класс задания 3 
........class_task4.php        # класс задания 4 
......core                     # набор интерфейсов для классов + описание методов
........core_task3.php         # ядро для класса задания 3 
........core_task4.php         # ядро для класса задания 4 
....view
........view_index.php         # представление главный файл
........view_task3.php         # представление задание 3
........view_task4.php         # представление задание 4
....route.php                  # маршрутизатор - подключает модель, представление и контроллер в 
                                 зависимости от запросов.
..css                          # набор стилей
....style.css#                 # стили
..upload_file
....task3                      # результат работы скрипта по заданию 3
....task4                      # результат работы скрипта по заданию 4
..index.php                    # главный файл
..readme.md                    # описание