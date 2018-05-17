<?php 

    // allow the config
    define('__CONFIG__', true);
    // require the config
    require_once "inc/config.php"; 

?>

<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System</title>
    <!-- [htmlclean-protect] -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- [/htmlclean-protect] -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="/img/favicon.ico?v=1.1"> 
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top shadow-lg border-light p-0 mb-5">
        <a class="navbar-brand p-2 bg-light" href="/index.php">
            <img src="/img/logo-icon.png" width="30" height="30" alt="">
        </a>
        <a class="navbar-brand text-white" href="/index.php" title="Home">Login System</a>
    </nav>