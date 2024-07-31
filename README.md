Steps to create a new Laravel.x auth project using bootstrap and laravel/ui

    Create a new Laravel 10.x project composer create-project laravel/laravel:^10 your-project-name*
    Install the needed package composer require laravel/ui
    Apply the new auth scaffolding using bootstrap and laravel/ui: php artisan ui bootstrap --auth
    Run npm i and
    Configure correctly the .env file
    Run php artisan migrate
    Run on two separeted terminals:
        run npm run dev to build iteratively our front-end packages and code
        run php artisan serve to build iteratively our back-end packages and code
    Start changing the world with your oustanding code!

Steps to use this project correctly:

    Copy and paste the .env.example file and rename it into .env without removing the env.example file
    Run composer install to install all our composer packages
    Run php artisan key:generate to generate our custom application key
    Run npm i to install all our npm packages
    Run on two separeted terminals:
        run npm run dev to build iteratively our front-end packages and code
        run php artisan serve to build iteratively our back-end packages and code
    Start changing the world with your oustanding code!
