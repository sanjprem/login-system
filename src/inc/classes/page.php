<?php

    class Page {
        // force the user to login and redirect
        static function ForceLogin() {
            if(isset($_SESSION['user_id'])) {

            } else {
                header("Location: /login.php"); exit;
            }
        }

        static function ForceDashboard() {
            if(isset($_SESSION['user_id'])) {
                header("Location: /dashboard.php"); exit;
            } else {

            }
        }
    }

?>