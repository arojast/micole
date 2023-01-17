PHP --version : 8.^
Composer --version : 2.4.^

Project made in Laravel 9, see documentation at https://laravel.com/docs/9.x/

Sail is used to execute the project, so that it can be executed in containers independent of the configuration of the computer where it is downloaded, see the sail documentation at https://laravel.com/docs/9.x/sail#main-content

The project has 5 basic entities that make its operation possible, each one has its own Model, Migration and Factory; these are: User, Country, Region, City and School. The latter depends on the other entities. In the migrations, the structure of each one of them has been created and the factory has been started except in School, this is done because School is the one that depends on the others, having foreign keys.

For factories, the Faker PHP library has been used, see documentation at https://fakerphp.github.io/

An artisan command has been written to run the model factory, it is used in the form artisan runFactory {model}, model being the entity that you want to run, you can pass "All" as a parameter, so that all the factories are run

Example 
artisan runFactory School
artisan runFactory User
artisan runFactory All

INSTALL
-As a first step, docker-compose must be installed in order to run sail, see documentation at https://docs.docker.com/compose/install/
-In a console, go to the root of this project and run "composer install"
-Run command "php artisan sail:install" to install sail
-Run command "./vendor/bin/sail up -d" to upload docker containers
-Run command "./vendor/bin/sail artisan migrate" to run the migrations
-Run command "./vendor/bin/sail artisan runFactory {model}" to run the model factory
-Review the data created in mysql with the preferred client, review the .env file to know connection data
they tend to be
DB_CONNECTION=mysql
DB_HOST=mysql or 0.0.0.0
DB_PORT=3306
DB_DATABASE=micole
DB_USERNAME=sail
DB_PASSWORD=password

OUTPUT
-they are placed in the path "./databases/export/" excel files with data generated by the RunFactory command
-screenshots of the execution of the RunFactory command are placed in the path "./public/img/"



