# TOKOSPORT

## Identitas Mahasiswa
**Nama:** Miftaqul Zanah  
**NIM:** 220102018  
**Kelas:** TRPL 22 A1  

---

## Deskripsi Sistem
TOKOSPORT merupakan sistem informasi berbasis web yang digunakan untuk mengelola data produk toko olahraga secara digital. Sistem ini dibuat untuk mempermudah proses pengelolaan produk seperti menambah, mengubah, melihat, dan menghapus data barang.

Selain itu, sistem juga dilengkapi dengan fitur autentikasi pengguna sehingga hanya user yang sudah terdaftar dan login yang dapat mengakses menu utama sistem.

Sistem ini cocok digunakan untuk toko perlengkapan olahraga agar pengelolaan data menjadi lebih cepat, rapi, dan efisien.

---

## Fitur Sistem

### 1. Login User
Pengguna dapat masuk ke sistem menggunakan email dan password yang telah terdaftar.

### 2. Register User
Pengguna baru dapat membuat akun terlebih dahulu sebelum login.

### 3. Logout
Pengguna dapat keluar dari sistem dengan aman.

### 4. Manajemen Produk
Sistem menyediakan fitur CRUD (Create, Read, Update, Delete) data produk:

- Menambah produk baru  
- Melihat daftar produk  
- Mengedit data produk  
- Menghapus produk  

### 5. Keamanan Akses
Halaman produk hanya dapat diakses setelah pengguna berhasil login.

---

## Framework dan Teknologi yang Digunakan

### Backend
- **Laravel 8**  
Framework PHP yang digunakan untuk membangun sistem.

### Frontend
- HTML  
- CSS  
- Bootstrap (jika digunakan)  
- Blade Template Laravel

### Database
- MySQL

### Tools Pendukung
- Visual Studio Code  
- Composer  
- XAMPP / Laragon  

---

## Struktur Menu Sistem

1. Halaman Login  
2. Halaman Register  
3. Dashboard Produk  
4. Tambah Produk  
5. Edit Produk  
6. Logout  

---

## Cara Menjalankan Project

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve