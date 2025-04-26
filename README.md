# Dokumentasi Awal Sisaku

Dokumentasi ini memberikan petunjuk instalasi dan panduan migrasi database untuk Aplikasi Tabungan Siswa, sistem berbasis Laravel untuk mengelola tabungan siswa dengan peran pengguna yang berbeda (admin, guru, siswa).

## Gambaran Umum Project

Aplikasi Tabungan Siswa memudahkan pengelolaan tabungan siswa dengan akses berbasis peran:
- **Admin**: Mengelola pengguna, memantau data, dan mengkonfigurasi pengaturan aplikasi
- **Guru**: Mencatat transaksi tabungan siswa dan membuat laporan
- **Siswa**: Melihat riwayat transaksi dan laporan tabungan mereka

## Petunjuk Instalasi

### Langkah 1: Clone Repository

```bash
git clone https://github.com/DaffaAzka/SiSaku
cd SiSaku
```

### Langkah 2: Instal Dependensi

```bash
composer install
npm install
npm run build
```

### Langkah 3: Pengaturan Lingkungan

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` untuk mengkonfigurasi koneksi database Anda:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sisaku
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 4: Migrasi Database

Jalankan migrasi database untuk membuat semua tabel yang diperlukan:

```bash
php artisan migrate
```

Opsional, isi database dengan data contoh:

```bash
php artisan db:seed
```

### Langkah 5: Konfigurasi Penyimpanan

```bash
php artisan storage:link
```

### Langkah 6: Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi sekarang dapat diakses di http://localhost:8000

## Struktur Database

Struktur Database dapat dilihat di https://dbdiagram.io/d/SiSaku-6800af6b1ca52373f5581630

## Alur Aplikasi

1. Admin membuat akun untuk guru dan siswa
2. Admin mengkonfigurasi kelas dan menugaskan guru
3. Guru mencatat transaksi tabungan siswa (setoran/penarikan)
4. Siswa dapat melihat riwayat transaksi dan status tabungan mereka
5. Sistem menghasilkan notifikasi untuk acara penting

## Pemecahan Masalah

Jika Anda mengalami masalah selama instalasi:

1. Pastikan semua dependensi diinstal dengan benar
2. Verifikasi kredensial database di file `.env`
3. Periksa kompatibilitas versi PHP
4. Bersihkan cache aplikasi:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

## Konfigurasi Tambahan

Untuk penerapan produksi, pertimbangkan:
- Menyiapkan konfigurasi server yang tepat
- Mengkonfigurasi server email untuk notifikasi
- Menyiapkan tugas terjadwal menggunakan scheduler Laravel
- Menerapkan prosedur backup
