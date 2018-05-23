<?php include_once "partials/header.php"; ?>

<div class="container">
    <form action="" method="post" class="js-register mt-5">
        <div class="login-icon d-table p-3 rounded-circle">
            <img src="/assets/img/logo-icon.png" title="UXFocus Icon">
        </div>
        <div class="jumbotron m-auto py-4 border-light">
            <h2 class="text-muted text-uppercase text-center py-3">Register </h2>
            <div class="form-group mt-3">
                <label for="email" class="form-text text-muted text-uppercase">Email</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" required="required">
            </div>
            <div class="form-group">
                <label for="password" class="form-text text-muted text-uppercase">Password</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password"  required="required">
            </div>
            <div class="alert alert-danger js-error" role="alert" style="display:none"></div>
            <div class="text-center"> 
                <input type="submit" class="btn text-white btn-lg btn-block mt-4" id="register" name="registerBtn" value="Sign Up">
            </div>
        </div>
    </form>
</div>

<?php include_once "partials/footer.php"; ?>