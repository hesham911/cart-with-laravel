# Cart With Laravel

A simple cart system built using Laravel. This project demonstrates how to manage a shopping cart, add/remove items, calculate total, and handle session-based carts.

## 🛠️ Tech Stack
- Laravel 8
- PHP 7+
- Bootstrap (أو أي واجهة مستخدم استخدمتها)
- MySQL

## 🚀 Features
- Add/remove items to/from cart
- Quantity control
- Cart total calculation
- Basic UI for demonstration

## 📦 Installation

```bash
git clone https://github.com/hesham911/cart-with-laravel.git
cd cart-with-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
