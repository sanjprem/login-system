<?php 

    include_once "partials/header.php"; 

    Page::ForceLogin();

    $user_id = $_SESSION['user_id'];

    $User = new User($_SESSION['user_id']);

?>

<div class="container">
    <h1>Dashboard </h1>
    <p>Hello <?php echo $User->email; ?> </p>
    <p><a href="/logout.php">Logout</a></p>
</div>

<?php include_once "partials/footer.php"; ?>