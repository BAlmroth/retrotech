# RetroTech – Laravel Admin Tool

RetroTech is a Laravel-based admin system for managing retro gaming consoles.

The application simulates a simple webshop admin panel where products and brands can be created, edited, filtered and deleted.

This project was built as part of a Laravel course assignment to practice building a CRUD application using a framework.

**Category:** Electronics 

## Features

- Login / logout with authentication
- Dashboard with greeting and product overview
- Full CRUD for products
- Full CRUD for brands
- Filter by brand and condition
- Sort by price and time of creation
- Pagination with filters preserved
- Confirm delete page to prevent accidental deletion
- Accessible alerts
- Custom error pages (404 and 500)

## Login

**Email:** admin@retrotech.se

**Password:** 123

## Filters

Products can be filtered by **brand** and **condition**, and the filters can be combined.

## Pagination

10 products per page on dashboard and 15 per page on products page.

## Factories & Seeders

The project uses factories and seeders so the application looks the same on every machine.

**Brands:** Nintendo, Sony, Microsoft, Sega, Atari

**Conditions:** New, Like New, Good, Acceptable, For Parts

**Products** are generated with `ProductFactory` using realistic retro console names such as Nintendo Switch, PlayStation 3, Sega Dreamcast and Xbox 360.


## Accessibility (A11Y)

- Semantic HTML elements throughout
- All form inputs have associated labels
- Validation errors are clearly displayed
- Alerts use `role="alert"` and `aria-live` for screen reader support
- Color contrast meets readability standards
- Layout works correctly when zooming in and out


## Error Pages

Custom pages for 404 and 500 errors, both with a link back to the previous page.


## Tech Stack

- PHP 8.2 / Laravel 12
- Blade templates
- CSS / JavaScript


## Installation

1. `git clone https://github.com/BAlmroth/retrotech`
2. `cd retrotech`
3. `composer install`
4. `npm install`
5. `cp .env.example .env`
6. Create a MySQL database named retrotech by running: `mysql -u root -p` (write your password for mySQL if you have one otherwise press enter)and `CREATE DATABASE retrotech;` and then `exit`
7. `php artisan key:generate`
8. `php artisan migrate`
9. `php artisan db:seed`
10. `php artisan serve`

Open in browser: http://localhost:8000 (or http://localhost:8001 if 8000 is occupied)
Login mail: `admin@retrotech.se` password: `123`

## Authors

Benita Almroth & Wilma Reistad