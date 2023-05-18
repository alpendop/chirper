# chirper

Twitter clone

## Development environment

### Pre-requisites

* Node.js and PNPM
* PHP
* Composer

### Setup the environment and run

1. Generate a key for laravel server
```bash
php artisan key:generate
```
2. Copy the `.env.example` & `resources/webui/.env.example` file as `.env` and set your database of choice
3. Run migration
```bash
php artisan migrate
```
4. Start dev server
```bash
php artisan server
```
```bash
pnpm dev
```