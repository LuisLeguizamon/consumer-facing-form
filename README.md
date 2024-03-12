# Consumer Facing Form

### Description
* Platform that allows potential customers to submit their information for various insurance quotes

### Installation
* Clone this repository
* From project directory execute: ```composer install```
* Create a database
* Create .env file with DB variables: DB_DATABASE, DB_USERNAME and DB_PASSWORD
* From project directory execute: ```php artisan migrate```
* From project directory execute: ```php artisan key:generate```
* Install nvm to manage node and npm (optional but recommended)
* From project directory execute: ```npm install```
* From project directory execute: ```npm run build```

* To run a local server from project directory execute: ```php artisan serve```
* Route to register an admin user: 'http://127.0.0.1:8000/register'
* Route to login admin panel: 'http://127.0.0.1:8000/login';

### Built With
* [Laravel](https://laravel.com/) - v10
* [PHP](https://www.php.net/) - v8.2
* [Inertia.js](https://inertiajs.com/)
* [Vuejs](https://vuejs.org/) - v3
* [Tailwind CSS](https://tailwindcss.com/)
* [npm](https://www.npmjs.com/) - v9.6.7
* [nodejs](https://nodejs.org/es) - v18.17.1
* [MySQL](https://www.mysql.com/) - v8

### Tests
* PHPUnit is used to test the code. In order to run tests, execute from project directory: ```php artisan test```

### HOURS FOR DEVELOPMENT
- Define structure (schema, logic and UI strategy) based on requirements: 1 hour
- Installation and Readme setup: 30 minutes
- Tables: 30 minutes
- Main UI: 2 hours
- Divide UI on components and implement component for step 1: 1 hour
- UI for step 2 and 3: 1 hours
- Store information: 1 hour
- List submissions: 1 hour
- Tests: 1 hour
- Adjustments: 2 hour

<p align="right">(<a href="#top">back to top</a>)</p>
