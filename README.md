**Веб-приложение для создания коротких ссылок.**

Для развертывания приложения, после клонирования, необходимо выполнить команду:

`composer update`

Скопировать файл `.env.example` и переименовать его в `.env`.

Выполнить команду для генерации ключа приложения:

`php artisan key:generate`

Выполнить миграцию базы данных командой:

`php artisan migrate`