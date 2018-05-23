<?php

    // page will not load if constant defined not called
    if(!defined('__CONFIG__')) { 
        exit('Access denied.');
    }

    // sessions always on
    if(!isset($_SESSION)) {
        session_start();
    }

    // allow errors
    error_reporting(-1);
    ini_set('display_errors', 'On');

    include_once "classes/database.php";
    include_once "classes/filter.php";
    include_once "functions.php";

    $con = Database::getConnection();

?>