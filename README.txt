1. Install Composer Dan NodeJS
	* composer nya harus mengarah ke file php, nanti ada pilihan add path ceklis
	link download composer : https://getcomposer.org/download/
	link download node : https://nodejs.org/en
2. Ketik Perintah composer install di terminal root folder
3. Ketik Lagi npm install
4. Ubah nama .env.example menjadi .env
5. Setting database, ubah yang bagian nama database menjadi database yang mau di gunakan 
6. Jalankan project laravel, di terminal root project ketik php artisan serve dan juga jalankan di terminal root project berbeda npm run dev
7. apabila terjadi error keygenerate, click button run saja di ui website nya

Tambahan Breadcrumbs
1. composer require diglactic/laravel-breadcrumbs di root project
Lalu
2. php artisan vendor:publish --tag=breadcrumbs-config di root project 

Tambahan FlowBite

1. Install FlowBite 
