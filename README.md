# After Clone

Please after cloning this repo, to make it work do as following:
- run "composer install"
- generate .env file and set up database
- run "php artisan key:generate"
- run "php artisan migrate --seed"



## Api Test
GET
http://127.0.0.1:8000/api/user
PUT
http://127.0.0.1:8000/api/user/1
DELETE
http://127.0.0.1:8000/api/user/9
