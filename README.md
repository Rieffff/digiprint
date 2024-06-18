Detail project : Laravel 8 -> PHP versinya minimal 7.3.

Asumsi :

-   xampp atau server lokal sudah aktif

1. clone dari github ke folder
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. buka file .env lalu ganti line 14 (DB_DATABASE=laravel) menjadi nama database di xampp atau server lokalmu, misal nama db nya = etabungan maka ganti dengan : (DB_DATABASE=etabungandb)
6. buat database dulu di xampp / server lokalmu dengan namadatabase yang ada di no. 5. (etabungandb)
7. php artisan migrate
8. php artisan db:seed --class=SampleDataSeeder
