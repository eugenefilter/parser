# Alegria Parser

This project provides a small Laravel 12 skeleton to parse rental listings from [Alegria Realestate](https://alegria-realestate.com/ru/long-term). The code demonstrates a DDD-inspired structure with separate domain, application and infrastructure layers.

Due to environment limits the `vendor` directory is not included. Run `composer install` to fetch dependencies before running any commands.

## Usage

1. Copy `.env.example` to `.env` and set your MySQL credentials.
2. Execute `php artisan migrate` to create the tables.
3. Run `php artisan parse:alegria` to crawl listings and store them in the database.

