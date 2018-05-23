<?php 

    // allow the config
    define('__CONFIG__', true);
    // require the config
    require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $return = [];

        $email = Filter::String($_POST['email']);
        $password = $_POST['password'];
        
        // validate: user does not exisit
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1) {
            // user exisit
            $User = $findUser->fetch(PDO::FETCH_ASSOC);
            $user_id = (int) $User['user_id'];
            $hash = (string) $User['password'];

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