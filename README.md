# Data Book

Merupakan aplikasi yang dapat menunjukkan detail dari buku-buku terkenal.

## Getting Started

Aplikasi ini tidak di deploy ke server, oleh karena itu aplikasi ini hanya dapat diakses menggunakan localhost

### Step by Step

1. Clone aplikasi ini.
2. Import file =========>>>>>>>>>>>>namanya.db yang terdapat pada aplikasi ini.
3. Masuk ke direktori aplikasi dan lakukan **update composer** menggunakan terminal atau cmd.
```
composer update
```
4. Gunakan **php artisan serve** pada terminal atau cmd agar dapat lebih gampang mengakses aplikasi.
```
php artisan serve
```

## Built With

* [Laravel](https://laravel.com/) - Web framework yang digunakan - V5.7.18.
* [PHP](http://www.php.net/) - Bahasa yang digunakan - V7.2.8.

## Menggunakan API

Routing untuk menampilkan API dijelaskan pada lokasi direktori **test-rest-api/rest/routes/api.php**.

### Tabel Utama
Aplikasi ini memiliki 3 tabel utama yaitu:
1. Books    - untuk menyimpan data detail buku.
2. Authors  - untuk menyimpan data pengarang buku.
3. Tags     - untuk menyimpan data genre dari masing-masing buku.

### Cara Mengakses API
API dapat diakses dengan menggunakan aplikasi [Postman.](https://www.getpostman.com/) 

Ada 2 cara untuk mencoba mengakses API:
* Apabila **php artisan serve** sudah diaktifkan, gunakan cara seperti ini untuk mencoba mengakses API
```
http://127.0.0.1:8000/api/{{route}}
```
* Apabila tidak ingin mengaktifkan **php artisan serve**, gunakan cara seperti ini untuk mencoba mengakses API
```
localhost/test-rest-api/rest/public/api/{{route}}
```

### Route Untuk API
Berikut merupakan method dan route yang digunakan:
1. Tabel Books
```
Get all data            : /books - GET
Get single data by ID   : /books/{id} - GET
Get single data by name : /books/search - POST (parameter: search_book(str))
Delete data             : /books/{id} - POST 
Insert data             : /books - POST (parameter: title(str), synopsis(str), publish_year(int))
Update data             : /books - PUT (parameter: id(int), title(str), synopsis(str), publish_year(int))
```

2. Tabel Authors
```
Get all data    : /authors - GET
Get single data : /authors/{id} - GET
Delete data     : /authors/{id} - POST
Insert data     : /authors - POST (parameter: name(str), country(str))
Update data     : /authors - PUT (parameter: id(int), name(str), country(str))
```

1. Tabel Tags
```
Get all data    : /tags - GET
Get single data : /tags/{id} - GET
Delete data     : /tags/{id} - POST
Insert data     : /tags - POST (parameter: name_type(str), type_exp(str))
Update data     : /tags - PUT (parameter: id(int), name_type(str), type_exp(str))
```

## Menggunakan Web
