# Larvel user application
## installation and usage
-Clone the project.
-Run composer install.
-Edit .env file to match your credentials.
-Run Migration i.e php artisan migrate or import users.sql to your mysql database.
-Run php artisan serve
-Access the endpoints using 127.0.0.1:8000/api/register and 127.0.0.1:8000/api/login
-Run seeder to add admin user to db :php artisan db:seed --class=AdminUserSeeder
-To Access admin dashboard use the endpoint:127.0.0.1:8000/users