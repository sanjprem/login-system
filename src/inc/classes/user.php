<?php

    // page will not load if constant defined not called
    if(!defined('__CONFIG__')) { 
        exit('Access denied.');
    }

    class User {

        private $con;

        public $user_id;
        public $email;
        public $reg_time;

        public function __construct($user_id) {
            $this->con = Database::getConnection();

            $user_id = Filter::Int($user_id);

            $user = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
            $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $user->execute();

            if($user->rowCount() == 1) {
                $user = $user->fetch(PDO::FETCH_OBJ);

                $this->email        = (string) $user->email;
                $this->user_id      = (int) $user->user_id;
                $this->reg_time     = (string) $user->reg_time;
            } else {
                header("Location: /logout.php"); exit;
            }
        }
    
        public static function Find($email, $return_assoc = false) {

            $con = Database::getConnection();

            // validate: user does not exisit
            $email = (string) Filter::String($email);

            $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
            $findUser->bindParam(':email', $email, PDO::PARAM_STR);
            $findUser->execute();

            if($return_assoc) {
                return $findUser->fetch(PDO::FETCH_ASSOC);
            }

            $user_found = (boolean) $findUser->rowCount();
            return $user_found;
        }
    }

?>