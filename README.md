## Getting started

- clone branch backend-admin

```
git clone -b backend-admin https://github.com/Farag-dev/SW-projet.git
```

- Go to the folder `SW-projet`

- Run `composer install` on your cmd or terminal

- Copy `.env.example` file to `.env` on the root folder.

- Open your `.env` file and change the database name (DB_DATABASE) to `hospital_system`

- Run on cmd or terminal `php artisan key:generate`

- Create a database called `hospital_system`

- Run on cmd or terminal `php artisan migrate`

- Run on cmd or terminal `php artisan db:seed`
