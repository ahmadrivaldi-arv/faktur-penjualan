# Faktur Penjualan App

Panduan singkat menjalankan aplikasi faktur penjualan berbasis Laravel.

## Prasyarat
- PHP 8.2+
- Composer
- Node.js & npm
- Database MySQL / SQLite

## Langkah Instalasi
1. Clone repositori
   ```bash
   git clone https://github.com/ahmadrivaldi-arv/ujikom-faktur-penjualan.git
   cd ujikom-faktur-penjualan
   ```
2. Install dependency PHP & JS
   ```bash
   composer install
   npm install && npm run build
   ```
3. Konfigurasi environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   # sesuaikan koneksi database di file .env
   ```
4. Jalankan migrasi dan seeder (opsional)
   ```bash
   php artisan migrate --seed
   ```

# Database dummy ada di folder
```text
database/database.sql
```

## Menjalankan Aplikasi
```bash
php artisan serve
```
Akses aplikasi melalui `http://localhost:8000`.

## Login

### Default email dan password
```text
email: superadmin@example.com
password: password
```

Setelah login anda dapat mengelola:

- CRUD Perusahaan
- CRUD Customer + cetak PDF
- CRUD Produk
- CRUD Penjualan + cetak faktur PDF
- Dashboard statistik sederhana

## Perintah Tambahan
- Bersihkan cache config: `php artisan config:clear`
- Jalankan queue jika diperlukan: `php artisan queue:work`
