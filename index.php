<?php
$pageTitle = "Home";
require_once("layouts/header.php");
session_start();
if (!isset($_SESSION['login'])) {
    header('location: signup.php');
    die();
}
?>

<body>
    <div class="wrapper">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <form id="index-form" class="pop_form">
                    <div class="title text-center">Profile</div>
                    <div class="form-group row">
                        <label for="profile-name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9"><input type="text" name="profile-name" id="profile-name" class="form-control" value=""></div>
                    </div>
                    <div class="form-group row">
                        <label for="profile-email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9"><input type="text" name="profile-email" id="profile-email" class="form-control" value="" readonly></div>
                    </div>
                    <div class="form-group row">
                        <label for="profile-dob" class="col-sm-3 col-form-label">DOB</label>
                        <div class="col-sm-9"><input type="date" name="profile-dob" id="profile-dob" class="form-control" placeholder=""></div>
                    </div>
                    <div class="form-group row">
                        <label for="profile-age" class="col-sm-3 col-form-label">Age</label>
                        <div class="col-sm-9"><input type="text" name="profile-age" id="profile-age" class="form-control" placeholder="Automatically Generated" readonly></div>
                    </div>
                    <div class="form-group row">
                        <label for="profile-contact" class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9"><input type="tel" name="profile-contact" id="profile-contact" class="form-control" placeholder=""></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="profile-submit">Save</button>
                    <a class="btn btn-primary btn-block" href="php/controllers/logoutController.php" role="button">LogOut</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>