Berikut adalah langkah-langkah lebih lanjut untuk membuat dokumentasi yang lebih profesional untuk aplikasi Login+SpatiePermission, termasuk informasi mengenai system requirement dan lain-lain:

### 1. System Requirement

Sebelum menginstal aplikasi Login+SpatiePermission, pastikan sistem Anda memenuhi persyaratan berikut:

-   PHP versi 7.4 atau lebih tinggi
-   Composer
-   MySQL atau database lainnya yang didukung oleh Laravel
-   Web server seperti Apache atau Nginx

### 2. Instalasi Aplikasi Login+SpatiePermission

#### 2.1 Clone Repository

Clone repository Login+SpatiePermission dari GitHub:

```bash
git clone https://github.com/iqbalmahad/login
```

#### 2.2 Masuk ke Direktori Aplikasi

Pindah ke direktori aplikasi Login+SpatiePermission:

```bash
cd login
```

#### 2.3 Install Dependensi

Install dependensi menggunakan Composer:

```bash
composer install
```

#### 2.4 Salin File `.env`

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

#### 2.5 Atur File `.env`

Atur file `.env` dengan informasi database yang benar sesuai dengan sistem Anda.

#### 2.6 Generate Key Aplikasi

Generate key aplikasi Laravel:

```bash
php artisan key:generate
```

#### 2.7 Jalankan Migrasi Database

Jalankan migrasi untuk membuat struktur database:

```bash
php artisan migrate
```

#### 2.8 Jalankan Seeder

Jalankan seeder untuk menambahkan role dan permission:

```bash
php artisan db:seed --class=RolePermissionSeeder
```

Jalankan seeder untuk menambahkan pengguna:

```bash
php artisan db:seed --class=UserSeeder
```

### 3. Menjalankan Aplikasi

#### 3.1 Jalankan Server Laravel

Jalankan server Laravel untuk mengakses aplikasi:

```bash
php artisan serve
```

### 4. Mengakses Aplikasi

Setelah langkah-langkah ini dilakukan, Anda dapat mengakses aplikasi Login+SpatiePermission melalui browser dengan menggunakan pengguna admin atau pengguna biasa yang telah dibuat. Pastikan untuk login dengan akun yang sesuai untuk mengakses fitur aplikasi.

Dokumentasi yang lebih lengkap seperti ini akan membantu pengguna baru atau pengembang lain untuk lebih mudah memahami cara menginstal dan menjalankan aplikasi Login+SpatiePermission dengan benar. Jika Anda membutuhkan informasi tambahan atau penjelasan lebih lanjut, jangan ragu untuk bertanya!
