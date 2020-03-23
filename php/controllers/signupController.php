<?php
require('connectionController.php');
require('../functions.php');

//Initializing error codes
$errorCode = array("name" => 0, "email" => 0, "password" => 0);

// Name Validation
if (empty($_POST["name"])) {
    $errorCode["name"] = 1;
} else {
    $name = $_POST["name"];
}

// Email Validation
if (empty($_POST["email"])) {
    $errorCode["email"] = 1;
} else if (!isEmailValid($_POST["email"])) {
    $errorCode["email"] = 2;
} else if (isEmailUnique($_POST["email"]) > 0) {
    $errorCode["email"] = 3;
} else {
    $email = $_POST["email"];
}

// Password Validation
if (empty($_POST["password"])) {
    $errorCode["password"] = 1;
} else if (strlen($_POST["password"]) < 6) {
    $errorCode["password"] = 2;
} else {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
}

//Database Interaction (Insertion)
if ($errorCode["name"] == 0 && $errorCode["email"] == 0 && $errorCode["password"] == 0) {
    if (initialInsert($name, $email, $password) === TRUE) {
        storeInJSON();
        echo json_encode(['code' => $errorCode, 'result' => "success"]);
    }
} else {
    echo json_encode(['code' => $errorCode, 'result' => null]);
}
