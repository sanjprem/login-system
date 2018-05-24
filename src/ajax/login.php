<?php 

    // allow the config
    define('__CONFIG__', true);
    // require the config
    require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $return = [];

        $email = Filter::String($_POST['email']);
        $password = $_POST['password'];

        $user_found = User::Find($email, true);

        if($user_found) {

            $user_id = (int) $user_found['user_id'];
            $hash = (string) $user_found['password'];

            if(password_verify($password, $hash)) {
                // user signed in
                $return['redirect'] = '/dashboard.php';
                $_SESSION['user_id'] = $user_id;
            } else {
                // invalid login info
                $return['error'] = "Invalid email or password.";
            }

            $return['error'] = "Email is already in use.";
        } else {
            $return['error'] = "Account not registered. <a href='/register.php'>Create an account?</a>";
        }
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        exit('Invalid URL');
    }

?>