# UAS Pemrograman Web Lanjut
## Sistem Toko Online CodeIgniter 4

**Nama : Aulia Rahman Afryansyah  
**NIM : A11.2024.15810 
**Kelas : 44UG2

---

# Soal 1
## Membuat Migration dan Seeder Diskon

### Tujuan
Membuat tabel `discount` yang digunakan untuk menyimpan data diskon harian.

### Struktur Tabel

| Field | Tipe |
|--------|------|
| id | INT |
| tanggal | DATE |
| nominal | DOUBLE |
| created_at | DATETIME |
| updated_at | DATETIME |
| deleted_at | DATETIME |

### Seeder

Seeder digunakan untuk mengisi minimal 10 data diskon.

Tanggal dimulai dari tanggal migration dijalankan kemudian dilanjutkan hingga 9 hari berikutnya sehingga tidak terdapat tanggal yang sama.

---

# Soal 2
## Menampilkan Diskon pada Halaman Home

Pada halaman Home ditambahkan informasi diskon berdasarkan tanggal hari ini.

Proses yang dilakukan:

- Mengambil data diskon berdasarkan tanggal saat ini.
- Mengirimkan data dari Home Controller menuju View.
- Menampilkan informasi diskon apabila tersedia.

Contoh tampilan:

```
Diskon Hari Ini
10 %
```

---

# Soal 3
## CRUD Diskon

Dibuat halaman manajemen diskon khusus Admin.

Fitur yang tersedia:

- Menampilkan seluruh data diskon
- Menambah diskon
- Mengubah nominal diskon
- Menghapus diskon

Validasi yang digunakan:

- tanggal wajib diisi
- tanggal tidak boleh sama
- nominal wajib berupa angka

---

# Soal 4
## Perhitungan Diskon Saat Checkout

Saat pelanggan melakukan pembelian maka sistem akan mengecek apakah hari tersebut memiliki diskon.

Jika terdapat diskon maka:

```
Subtotal
↓

Diskon

↓

Ongkir

↓

Total Bayar
```

Rumus yang digunakan

```
Diskon = Subtotal × (Nominal Diskon /100)

Total = Subtotal - Diskon + Ongkir
```

Nilai diskon kemudian disimpan ke tabel `transaction_detail`.

---

# Soal 5
## History Pembelian

Ditambahkan menu History pada Sidebar.

History menampilkan transaksi milik user yang sedang login.

Informasi yang ditampilkan:

- ID Transaksi
- Waktu Pembelian
- Total Bayar
- Alamat
- Status

Setiap transaksi memiliki tombol Detail untuk melihat:

- Produk
- Harga
- Jumlah
- Subtotal
- Ongkir

---

# Soal 6
## Ubah Status Pembelian

Admin dapat mengubah status transaksi.

Status yang tersedia:

- Belum Selesai
- Sudah Selesai

Status dapat diubah menggunakan tombol **Ubah Status**.

---

# Soal 7
## REST API Produk

REST API Produk menyediakan endpoint:

| Method | Endpoint |
|---------|----------|
| GET | /api/products |
| GET | /api/products/{id} |
| POST | /api/products |
| PUT | /api/products/{id} |
| PATCH | /api/products/{id} |
| DELETE | /api/products/{id} |

Autentikasi menggunakan Bearer Token.

Contoh Header

```
Authorization: Bearer my-secret-token
```

---

# Soal 8
## REST API Diskon

REST API Diskon dibuat dengan konsep yang sama seperti REST API Produk.

Endpoint:

| Method | Endpoint |
|---------|----------|
| GET | /api/discounts |
| GET | /api/discounts/{id} |
| POST | /api/discounts |
| PUT | /api/discounts/{id} |
| PATCH | /api/discounts/{id} |
| DELETE | /api/discounts/{id} |

Semua endpoint menggunakan autentikasi Bearer Token.

---

# Pengujian

Pengujian dilakukan menggunakan REST Client pada Visual Studio Code.

Endpoint yang diuji:

- GET
- SHOW
- POST
- PUT
- PATCH
- DELETE

Semua endpoint berhasil memberikan response JSON sesuai spesifikasi.

---

# Teknologi yang Digunakan

- PHP 8
- CodeIgniter 4
- MySQL
- Bootstrap 5
- jQuery
- Select2
- DomPDF
- RajaOngkir API
- RESTful API
- VS Code REST Client

---

# Kesimpulan

Pada UAS ini berhasil dikembangkan sistem toko online menggunakan CodeIgniter 4 dengan penambahan fitur diskon harian, history pembelian, perubahan status transaksi, integrasi web service RajaOngkir, serta implementasi REST API untuk Produk dan Diskon yang telah diamankan menggunakan Bearer Token.

Seluruh fitur berhasil diimplementasikan dan dapat berjalan sesuai kebutuhan sistem.