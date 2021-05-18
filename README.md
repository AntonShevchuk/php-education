PHP Education Program
=====================

Учебные материал для курса обучения в компании [NIX Solutions Ltd](http://www.nixsolutions.com). Более подробная
информация о наших курсах доступна на странице https://www.nixsolutions.com/ru/study-center/courses/

## Статьи

* [Сессия](http://anton.shevchuk.name/php/php-for-beginners-session/)
    * [PHP Session Locking: How To Prevent Sessions Blocking in PHP requests](https://ma.ttias.be/php-session-locking-prevent-sessions-blocking-in-requests/)
* [Подключение файлов](http://anton.shevchuk.name/php/php-for-beginners-include-files/)
* [Буфер вывода](http://anton.shevchuk.name/php/php-for-beginners-output-buffer/)
* [Обработка ошибок](http://anton.shevchuk.name/php/php-for-beginners-error-handling/)
    * Исключительный код: [часть 1](http://anton.shevchuk.name/php/exceptional-code-part-1/)
      и [часть 2](http://anton.shevchuk.name/php/exceptional-code-part-2/)

## PHP web-server

Для запуска примеров с использованием встроенного web-сервера следует указать скрипт для роутинга:

```bash
php -S localhost:8080 -t php-education php-education/routing.php
```
