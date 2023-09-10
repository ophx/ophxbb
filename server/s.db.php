<?php
    define("DB_SERVER", "".$config->host."");
    define("DB_USERNAME", "".$config->username."");
    define("DB_PASSWORD", "".$config->password."");
    define("DB_NAME", "".$config->database."");
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($mysqli === false){
        die($mysqli->connect_error);
    }