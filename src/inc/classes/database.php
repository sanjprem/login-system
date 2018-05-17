<?php

    // page will not load if constant defined not called
    if(!defined('__CONFIG__')) { 
        exit('Access denied.');
    }

    class Database {
        
        protected static $con;

        private function __construct() {

            try {
                self::$con = new PDO('mysql:charset=utf8;host=localhost;port=3306;dbname=login_system', 'root', 'root');
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
            }
            catch(PDOException $e) {
                echo "Could not connect to database."; exit;
            }
        }

        public static function getConnection() {

            // if instance was not started, start it.
            if(!self::$con) {
                new Database();
            }

            // return the writeable db connection
            return self::$con;
        }
    }

?>