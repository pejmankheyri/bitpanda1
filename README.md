## For easy and faster setup please follow this instructions

- Go to your develop source folder (for example):
```bash
cd /var/www/html/
```

- Clone the project to specific directory (Enter your username and password for proceed):
```bash
git clone https://github.com/pejmankheyri/bitpanda1.git your-path
```
- Move to your cloned path:
```bash
cd your-path
```

- Install the laravel dependencies:
```bash
composer install
```

- Copy the example envirenement file to project:
```bash
cp .env.example .env
```

- Generate new key for laravel project:
```bash
php artisan key:generate
```

- Create a new mysql database for project

- Open .env file for setting database configuration:
```bash
sudo nano .env
```

- Run laravel database migration:
```bash
php artisan migrate
```

- Seed the fake data to database:
```bash
php artisan migrate:refresh --seed
```

- Serve the laravel project for see results:
```bash
php artisan serve
```

## Access to required tests by link below:
- http://127.0.0.1:8000/
- http://127.0.0.1:8000/users/


## Run feature tests by this command:
```bash
php artisan test --testsuite=Feature
```
