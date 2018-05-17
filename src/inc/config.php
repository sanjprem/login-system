<?php

    // page will not load if constant defined not called
    if(!defined('__CONFIG__')) { 
        exit('Access denied.');
    }

    include_once "classes/database.php";

    $con = Database::getConnection();

?>