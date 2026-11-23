# BUMDes Tirta Makmur
Sistem informasi manajemen Badan Usaha Milik Desa berbasis web, dibangun dengan Laravel dan didesain sesuai standar tata kelola Kemendesa PDTT.

---

## Alur Penggunaan Sistem

### 1. Akses Aplikasi
Buka browser dan akses:
```
http://127.0.0.1:8000
```
Sistem akan otomatis mengarahkan ke halaman **Login**.

---

### 2. Halaman Login
Pada halaman login, pengguna melakukan tiga langkah:

1. **Pilih Wewenang** — pilih salah satu role sesuai jabatan:

   | Role | Jabatan | Akses Setelah Login |
   |------|---------|---------------------|
   | Admin | Administrator sistem | Manajemen akun dan peran |
   | Pengelola | Pengelola operasional BUMDes | Dashboard operasional unit |
   | Direktur | Direktur BUMDes | Ringkasan kinerja dan laporan |
   | Pemdes | Pemerintah Desa | Pemantauan keuangan desa |

2. **Masukkan Username** — NIK penduduk atau nama akun terdaftar
3. **Masukkan Password** — kata sandi akun

Klik tombol **Masuk ke Sistem Desa** untuk melanjutkan.

> Jika username, password, atau role tidak cocok, sistem menampilkan pesan kesalahan dan pengguna diminta mencoba kembali.

---

### 3. Dashboard per Role

Setelah login berhasil, pengguna diarahkan ke dashboard sesuai role-nya:

- **Admin** → `/akun` — kelola pengguna dan hak akses
- **Pengelola** → `/dashboard/pengelola` — pencatatan kas harian dan inventaris
- **Direktur** → `/dashboard/direktur` — ringkasan kinerja dan laporan keuangan
- **Pemdes** → `/dashboard/pemdes` — pemantauan keuangan dan dividen desa

---

### 4. Navigasi Sistem
Setelah masuk, sidebar di sisi kiri menampilkan:
- Nama dan role pengguna yang sedang aktif
- Menu navigasi ke halaman-halaman yang tersedia
- Tombol **Keluar** untuk mengakhiri sesi

---

### 5. Logout
Klik tombol **Keluar** di sidebar. Sistem akan:
1. Menghapus sesi login
2. Mengarahkan kembali ke halaman login

---

## Instalasi dan Menjalankan Proyek

```bash
# 1. Clone repository
git clone https://github.com/Luftschloss06/BUMDes-ASP-.git
cd BUMDes-ASP-

# 2. Checkout ke branch aktif
git checkout dev

# 3. Install dependencies
composer install

# 4. Salin file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Jalankan migrasi database
php artisan migrate

# 7. Buat akun uji (opsional)
php artisan tinker
# Jalankan di dalam tinker:
# App\Models\User::create(['name'=>'Pengelola Uji','username'=>'pengelola01','email'=>'p@desa.test','password'=>bcrypt('rahasia123'),'role'=>'pengelola']);

# 8. Jalankan server
php artisan serve
```

---

## Struktur Branch

| Branch | Fungsi |
|--------|--------|
| `main` | Branch produksi — hanya menerima perubahan yang sudah dikonfirmasi |
| `dev` | Branch integrasi — tempat review sebelum masuk ke main |
| `feature/setup-laravel` | Branch pengembangan fitur |

---

## Teknologi

- **Framework:** Laravel 12
- **Database:** SQLite (development)
- **Frontend:** Blade Template + CSS custom (token desain dari Figma)
- **Autentikasi:** Laravel Auth bawaan dengan sistem role kustom
