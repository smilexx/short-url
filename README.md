**Web application for creating short links.**

To deploy the application, after cloning, you must run the command:

`composer update`

Copy file `.env.example` and rename it to `.env`.

Execute the command to generate the application key:

`php artisan key:generate`

Migrate the database with the command:

`php artisan migrate`

The size of a short link is defined in the class `ShortUrl` constants 
`LENGTH_STRING_SHORT_URL_MIN` и `LENGTH_STRING_SHORT_URL_MAX`

To delete links that are long in the database, you can use the command:

`php artisan url:check 15`

The parameter specifies the number of days that are counted to delete the link.
To run this command, you can use **cron**.

Api for creating links is at `api/short-url`

_Get_ request, returns a list of all the references of an authorized user.

_Post_ request, creates a new link. Here, the link is checked and a short link is shown if the user specified it.

_Delete_ request, deletes the link if it belongs to an authorized user.

[Example](http://umbrella.golofaev.ru)