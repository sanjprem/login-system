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

    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top  shadow-lg">
      <a class="navbar-brand text-white" href="/index.php" title="Home">Login System</a>
    </nav>

    <div class="container">
      <form action="" method="post" class="login mt-5">
        <div class="jumbotron m-auto py-4 border-light">
          <div class="login-icon d-table m-auto p-4 bg-light rounded-circle">
            <img src="/img/logo-icon.png" title="UXFocus Icon">
          </div>
          <div class="form-group mt-3">
              <label for="email" class="form-text text-muted text-uppercase">Email</label>
              <input type="text" class="form-control form-control-lg" id="email" name="email" required>
          </div>
          <div class="form-group">
              <label for="password" class="form-text text-muted text-uppercase">Password</label>
              <input type="password" class="form-control form-control-lg" id="password" name="password" required>
          </div>
          <div class="text-center"> 
              <input type="submit" class="btn text-white btn-lg btn-block mt-5" id="login" name="loginBtn" value="Sign In">
          </div>
        </div>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>    <!-- [htmlclean-protect] -->
    <!-- inject:js -->
    <!-- endinject -->
    <!-- [/htmlclean-protect] -->

  </body>
</html>