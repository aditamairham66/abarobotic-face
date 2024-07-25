### INIT PROJECT
- PHP 8.1
- MYSQL 5.7
- NODE 16.19.1

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
