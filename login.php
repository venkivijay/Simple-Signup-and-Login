<?php
$pageTitle = "Login";
require_once("layouts/header.php");
session_start();
if (isset($_SESSION['login'])) {
    header('location: index.php');
    die();
}
?>

<body>
    <div class="wrapper">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <form id="login-form" class="pop_form">
                    <div class="title text-center">LogIn</div>
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="email" name="email" id="login-email" class="form-control">
                        <small id="emailErr"></small>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" name="password" id="login-password" class="form-control">
                        <small id="passwordErr"></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="login-submit">Submit</button>
                    <div class="small">
                        Don't have an account?
                        <a href="signup.php">Signup Here!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>