About My Issues

My Issues là trang quản lý công việc miễn phí tương tự redmine, người dùng có thể tạo và quản lý project, thêm user, thêm issue vào project, và còn nhiều chức năng khác trong project.

1. Dự án được chia làm 2 phần:
   + Phần dành cho khách hàng (BE: PHP Laravel, FE: Reactjs)
   + Phần dành cho manager (BE: Ruby on Rails, FE: Reactjs)
2. Dự án được chia làm nhiều version, version 1 gồm các chức năng cơ bản.

3. Version 1:
 * Phần dành cho khách hàng:
  - Ngôn ngữ tiếng Việt, tiếng Anh
  - Chức năng login, logout, register bình thường, và đăng ký đăng nhập bằng Facebook, Google, Github
  - CRUD Project
  - CRUD Issue

 * Phần dành cho admin:
  - Ngôn ngữ tiếng Anh
  - CRUD users
  - CRUD projects
  - CRUD issues


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