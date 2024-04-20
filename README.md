Ini adalah langkah-langkah untuk menginstal dan menjalankan aplikasi Logingi:

1. Clone repository dari GitHub:

    ```bash
    git clone https://github.com/iqbalmahad/login
    ```

2. Masuk ke direktori aplikasi:

    ```bash
    cd login
    ```

3. Install dependensi menggunakan Composer:

    ```bash
    composer install
    ```

4. Salin file `.env.example` menjadi `.env`:

    ```bash
    cp .env.example .env
    ```

5. Buat database sesuai dengan yang diatur dalam file `.env`.

6. Atur file `.env` dengan informasi database yang benar.

7. Generate key aplikasi:

    ```bash
    php artisan key:generate
    ```

8. Jalankan migrasi untuk membuat struktur database:

    ```bash
    php artisan migrate
    ```

9. Jalankan seeder untuk menambahkan role dan permission:

    ```bash
    php artisan db:seed --class=RolePermissionSeeder
    ```

10. Jalankan seeder untuk menambahkan pengguna:

    ```bash
    php artisan db:seed --class=UserSeeder
    ```

11. Jalankan server Laravel:
    ```bash
    php artisan serve
    ```

Setelah langkah-langkah ini dilakukan, kamu dapat mengakses aplikasi dengan menggunakan pengguna admin atau pengguna biasa yang telah dibuat. Perlu diingat bahwa pengguna admin memiliki hak akses lebih daripada pengguna biasa.
