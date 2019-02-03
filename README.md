docker-compose up -d <br>
docker-compose exec app php artisan key:generate <br>
docker-compose exec app php artisan config:cache <br>
<b>MIGRATE DATABASE</b><br>
docker-compose exec app php artisan migrate