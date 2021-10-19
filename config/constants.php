<?php
    //START SESSION 
    session_start();

    // creating constant for no repeating values
    define('SITEURL', 'http://localhost/food-bakery/');

    define ('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define ('DB_PASSWORD', '');
    define('DB_NAME', 'food-bakery');

    $con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //or die(mysqli_error()); //databse connection
    $db_select = mysqli_select_db($con, DB_NAME); //or die(mysqli_error()); //selecting database
?>