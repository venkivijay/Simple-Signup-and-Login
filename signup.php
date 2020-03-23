<?php
$pageTitle = "SignUp";
require_once("layouts/header.php");
?>

<body>
    <div class="wrapper">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div id="success">
                    <img src="images/tick.svg">
                    <p>Registered Successfully</p>
                    <a href="login.php">Click here to login!</a>
                </div>
                <form id="signup-form" class="pop_form">
                    <div class="title text-center">SignUp</div>
                    <div class="form-group">
                        <label for="signup-name">Name</label>
                        <input type="text" name="name" id="signup-name" class="form-control">
                        <small id="nameErr"></small>
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Email</label>
                        <input type="email" name="email" id="signup-email" class="form-control">
                        <small id="emailErr"></small>
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input type="password" name="password" id="signup-password" class="form-control" aria-describedby="passwordHelp">
                        <small id="passwordHelp" class="text-muted">Password should be atleast 6 characters.</small>
                        <small id="passwordErr"></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="signup-submit">Submit</button>
                    <div class="small">
                        Already own an account?
                        <a href="login.php">Login Here!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>