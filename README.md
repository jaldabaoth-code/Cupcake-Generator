<h1>Cupcake Generator (PHP Checkpoint 2, WCS)</h1>

### The goal is to create your own uniques "Cupcakes"


---

## Simple MVC

### Steps

0. Clone the repo from Github
0. Run `composer install`
0. Create a database (e.g. named `checkpoint2`) : `create database database_name;`
0. Import the file <b>dataV1.sql</b> (at the root of the project) in your SQL server
0. Create <b>*config/db.php*</b> from <b>*config/db.php.dist*</b> file and add your DB parameters<br/>
    Don't delete the <b>*.dist*</b> file, it must be kept
    ```php
    define('APP_DB_HOST', 'your_db_host');
    define('APP_DB_NAME', 'your_db_name');
    define('APP_DB_USER', 'your_db_user_wich_is_not_root');
    define('APP_DB_PWD', 'your_db_password');
    ```
0. Run the internal PHP webserver with `php -S localhost:8000 -t public/`<br/>
    The option `-t` with `public` as parameter means your localhost will target the `/public` folder
0. Go to `localhost:8000` with your favorite browser
0. Clic on "Intructions" button

### Reminder : How does URL routing work ?

![Simple MVC.png](./Simple%20-%20MVC.png)

---

## The Links

<a href="https://github.com/WildCodeSchool/php_checkpoint2_orleans_march21">
Link to the repository of <b>PHP Checkpoint 2</b></a>
</br>
<a href="https://github.com/WildCodeSchool/php_checkpoint2_orleans_march21/tree/grialat_zurabi">
  Link to <b>my branch</b> repository of <b>PHP Checkpoint 2</b></a>

<a href="https://github.com/WildCodeSchool/simple-mvc">Link to the repository of <b>Simple-MVC</b></a>
