<?php

    // page will not load if constant defined not called
    if(!defined('__CONFIG__')) { 
        exit('Access denied.');
    }

    // allow errors
    error_reporting(-1);
    ini_set('display_errors', 'On');

    include_once "classes/database.php";
    include_once "classes/filter.php";

    $con = Database::getConnection();

?>