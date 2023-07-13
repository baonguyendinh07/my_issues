My Issues

# my_issues_be

## Laravel API (JWT Edition) for Laravel 10.2.4 (Php 8.1.21, MySQL 8.0.33)

## Installation & Start

1. run `composer install` to install dependencies
2. run `php artisan key:generate` to generate key
3. run `php artisan migrate:refresh` to migrate db update
4. run `php artisan serve` to start dev server
5. run `php artisan config:clear && php artisan cache:clear` when cannot start

### Secrets Generation

Every time you create a new project starting from this repository, the `php artisan jwt:secret` command will be
executed.