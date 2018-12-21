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
Fungsi                        : Method  : Route             : Parameter
------------------------------:---------:-------------------:------------------------------------------------------
Get all data, order by ID     : GET     : /books            :
Get all data, order by title  : GET     : /books-by-title   :
Get all data, order by year   : GET     : /books-by-year    :
Get all data, order by author : GET     : /books-by-author  : 
Get data, search by name      : POST    : /books/search     : search_book(str)
Get single data by ID         : GET     : /books/{id}       :
Delete data                   : DELETE  : /books/{id}       :
Insert data                   : POST    : /books            : title(str), synopsis(str), publish_year(int)
Update data                   : PUT     : /books            : id(int), title(str), synopsis(str), publish_year(int)
```

2. Tabel Authors
```
Fungsi                          : Method  : Route         : Parameter
--------------------------------:---------:---------------:---------------------------------
Get all data, order by ID       : GET     : /authors      :
Get all data, order by name     : GET     : /authors      :
Get all data, order by country  : GET     : /authors      :
Get single data                 : GET     : /authors/{id} :
Delete data                     : DELETE  : /authors/{id} :
Insert data                     : POST    : /authors      : name(str), country(str)
Update data                     : PUT     : /authors      : id(int), name(str), country(str)
```

3. Tabel Tags
```
Fungsi                      : Method  : Route       : Parameter
----------------------------:---------:-------------:---------------------------------------
Get all data, order by ID   : GET     : /tags       :
Get all data, order by name : GET     : /tags       :
Get single data             : GET     : /tags/{id}  :
Delete data                 : DELETE  : /tags/{id}  :
Insert data                 : POST    : /tags       : name_type(str), type_exp(str)
Update data                 : PUT     : /tags       : id(int), name_type(str), type_exp(str)
```

## Menggunakan Web

### Welcome Page
* Terdapat search bar untuk mencari nama buku.
* Terdapat link untuk berpindah ke halaman.

### Books Page
Pengguna dapat:
* Melihat tabel data seluruh buku
* Melihat detail suatu buku termasuk nama pengarang dan genrenya.
* Mencari data buku berdasarkan judul buku.
* Mengurutkan data buku berdasarkan parameter yang dipilih.
* Menambah data buku baru.
* Mengubah data buku yang sudah ada.
* Menghapus data buku.

### Authors Page
Pengguna dapat:
* Melihat tabel data seluruh pengarang.
* Melihat detail suatu pengarang termasuk nama buku yang telah dikarangnya.
* Mencari data pengarang berdasarkan nama pengarang.
* Mengurutkan data pengarang berdasarkan parameter yang dipilih.
* Menambah data pengarang baru.
* Mengubah data pengarang yang sudah ada.
* Menghapus data pengarang.

### Tags Page
Pengguna dapat:
* Melihat tabel data seluruh genre.
* Melihat detail suatu genre termasuk nama buku yang memiliki genre tersebut.
* Mencari data genre berdasarkan nama genre.
* Menambah data genre baru.
* Mengubah data genre yang sudah ada.
* Menghapus data genre.
