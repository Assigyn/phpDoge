<?php

// Include DB config file.
include('db_config.php');

// Connection Doge_Club_BDD
$bdd = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

// Catching error 500
if (!$bdd) {
    echo "Error 500 : Can't connect to DB 'Doge_Club_BDD'. Check your config file." . "\n";
    exit(E_ERROR);
}