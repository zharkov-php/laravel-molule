

## Laravel

copy .env from .env.example

`cp .env.example .env`

install all packages

`composer install`

run sail containers

`./vendor/bin/sail up`

run migrations

`./vendor/bin/sail artisan migrate`


run purchase testing

`php artisan test --filter=UserPurchaseTest
`
