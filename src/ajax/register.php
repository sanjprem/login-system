<?php 

    // allow the config
    define('__CONFIG__', true);
    // require the config
    require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $return = [];

        $email = Filter::String($_POST['email']);

        $user_found = User::Find($email);

        if($user_found) {
            // user exisit
            $return['error'] = "Email is already in use.";
            $return['is_logged_in'] = false;
        } else {
            // add user
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();
            $_SESSION['user_id'] = (int) $user_id;

            // return and redirect
            $return['redirect'] = '/login.php?message=account-approval';
            $return['is_logged_in'] = true;
        }
        $return['name'] = "Sanjeevan Premkumar";
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        exit('Invalid URL');
    }

?>