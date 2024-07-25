## INIT PROJECT
- PHP 8.1
- MYSQL 5.7
- NODE 16.19.1

- [UPDATE TAG PROJECT](./init-project/tag-git.md)

Berikut adalah langkah-langkah tambahan untuk menginstal Laravel Echo Server yang ada di project

#### Install Redis

Untuk menggunakan Laravel Echo Server, Anda perlu menginstal Redis terlebih dahulu. Pilih salah satu dari dua panduan berikut sesuai dengan sistem operasi yang Anda gunakan:

- [Install Redis di Linux](./init-project/install-redis-linux.md)
- [Install Redis di Windows](./init-project/install-redis-windows.md)

#### Setting Laravel Echo Server

Setelah Redis terinstal, Anda perlu melakukan konfigurasi Laravel Echo Server. Ikuti panduan berikut:

- [Setting Laravel Echo Server](./init-project/setting-1-laravel-echo.md)

#### Running Queue

Untuk menjalankan Laravel Echo Server dengan benar, Anda perlu menjalankan queue listener. Gunakan perintah berikut:

```bash
php artisan queue:listen redis --queue="T5CloudService"
```

Anda bisa melihat panduan detail pada file berikut:

- [Setting Queue Listener](./init-project/setting-2-queue-listen.md)

## Instalasi
#### 1. Clone Repository

Begin by cloning the project repository from GitLab:

```bash
git clone <URL_GitLab_repository> project_name
cd project_name
```

#### 2. Install PHP Dependencies

Install PHP dependencies using Composer:

```bash
composer install
```

#### 3. Install Node.js Dependencies

Navigate to the project directory and install Node.js dependencies using npm or Yarn:

```bash
cd project_name
npm install # or use yarn if you prefer
```

#### 4. Configure Environment

Copy the `.env.example` file to `.env` and adjust configurations such as database connection:

```bash
cp .env.example .env
```

#### 5. Generate Application Key

Generate the Laravel application key using the artisan command:

```bash
php artisan key:generate
```

#### 6. Migrate Database

If the project requires a database, run migrations to create the necessary tables:

```bash
php artisan migrate
php artisan db:seed # to populate the database with role and user data
```

#### 7. Run Server

Run the Laravel development server and Vite development server simultaneously. Ensure you are in the project root directory and run the following commands:

```bash
php artisan serve # in the first terminal
npm run build # or yarn dev in the second terminal
```

or

```bash
php artisan serve # in the first terminal
npm run dev # or yarn dev in the second terminal
```

After these steps, you should be able to access your Laravel application at `http://localhost:8000` and the assets managed by Vite and Tailwind CSS will work properly. Make sure to adapt the above steps according to your project structure and specific configurations.

## Strukur Direktori
Beberapa direktori penting dalam proyek ini adalah:

- `resources/views`: Direktori untuk file blade Laravel.
- `routes`: Direktori untuk file rute Laravel.
- `database/migrations`: Direktori untuk file migrasi database.

## Kontribusi
Jika kamu ingin berkontribusi ke proyek ini, silakan buat pull request atau buka isu di GitHub.

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).
