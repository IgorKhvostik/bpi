1. clone the project from repository https://github.com/IgorKhvostik/bpi.git
2. install all packages using composer command "composer install"
3. create database "bpi" (InnoDB)
4. set your env. file
5. make migration through php artisan
6. Go to .env file and choose the provider ('coindesk' or 'blockchain') in constant "APP_PROVIDER"
7. to get Bitcoin rates do command "php artisan bpi:get" in your command line
8. In /storage/laravel.log you can check info about every command execution