# Aplikasi POS

Aplikasi manajemen jual beli barang untuk toko menggunakan laravel 5.2.




### Fitur aplikasi - role admin
* Multi cabang
* manajemen produk terpusat
* cetak struk transaksi
* cetak barcode produk
* manajemen stok produk
* manajemen transaksi penjualan
* manajemen transaksi pengeluaran
* statistik laporan penjualan & pengeluaran
* konfigurasi (auto backup, jam atau waktu untuk backup)
* sys log app
* manajemen pengguna
* config profile

### Fitur aplikasi - role karyawan
* transaksi penjualan barang
* manajemen laporan transaksi
* config profile


### Installasi
 
#### step 1
pastikan sebelum installasi, **composer**  sudah ter-install dengan benar 
```php
git clone git@github.com:r3k4/pos.git
cd pos
composer install
cp .env.example .env
```

#### step 2
edit file .env dan sesuaikan isinya dgn konfigurasi yg sesuai.

#### step 3
jalankan perintah berikut pada terminal 
(masih dalam direktori pos)
```php
php artisan migrate && php artisan db:seed
```

#### step 4 (final)
buat admin akun via cli dengan perintah
```php
php artisan create_user:admin
php artisan serve
```

lalu buka alamat : http://localhost:8000/ 
dan login dengan menggunakan akun yg telah ditambahkan barusan.
