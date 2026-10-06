# Laravel API Learning

Project sederhana untuk belajar menggunakan **API / JSON di Laravel**.

Pada project ini saya menggunakan **free API dari [DummyJSON](https://dummyjson.com/)** untuk mengambil dan menampilkan data ke dalam halaman Laravel.

## API yang Digunakan

* **Quotes API**
  https://dummyjson.com/quotes

* **Recipes API**
  https://dummyjson.com/recipes

Data dari API diambil menggunakan Laravel HTTP Client, kemudian ditampilkan pada halaman menggunakan Blade.

## Cara Menjalankan

Clone repository:

```bash
git clone <repository-url>
```

Masuk ke folder project:

```bash
cd <project-folder>
```

Install dependency:

```bash
composer install
```

Jalankan Laravel:

```bash
php artisan serve
```

Kemudian akses:

* `/` → menampilkan **Quote**
* `/home` → menampilkan **Recipe**

## Tujuan

Project ini dibuat sebagai latihan untuk memahami cara:

* Mengambil data dari API eksternal
* Mengolah response JSON
* Menampilkan data API di Laravel Blade

## API Reference

https://dummyjson.com/
