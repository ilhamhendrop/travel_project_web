# travel_project_web
Travel web

Langkah dalam penggunaan
- clone repository terlebih dahulu
- buka file yang sudah diclone jika sudah berhasil
- buka terminal
- tuliskan compser install tunggu sampai selesai
- copy .env.example lalu rename menjadi .env
- tuliskan diterminal php artisan key:genarate
- buka lagi .env kemudian setting bagian db connection
- tuliskan di terminal php artisan storage:link
- tuliskan di terminal composer require yajra/laravel-datatables:^10.0
- tuliskan di terminal php artisan migrate:fresh --seed --seeder=UserSeeder
- tuliskan di terminal php artisan serve setelah muncul di link diterminal dicopy dan dipaste ke browser
