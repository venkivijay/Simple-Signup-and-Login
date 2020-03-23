<?php
session_start();
require_once("connectionController.php");
require('../functions.php');

$errorCode = array("email" => 0, "password" => 0);

if (empty($_POST["email"])) {
    $errorCode["email"] = 1;
} else if (!isEmailValid($_POST["email"])) {
    $errorCode["email"] = 2;
} else $email = $_POST["email"];

if (empty($_POST["password"])) {
    $errorCode["password"] = 1;
} else $password = $_POST["password"];

if (isset($email) && isset($password)) {
    $result = isCredentialsValid($email, $password);
    if ($result != -1 && password_verify($password, $result['password'])) {
        $_SESSION['login'] = TRUE;
        $_SESSION['id'] = $result['id'];
        $_SESSION['name'] = $result['name'];
        echo json_encode(['code' => $errorCode, 'result' => "success"]);
        exit;
    } else {
        $errorCode["email"] = 3;
        $errorCode["password"] = 2;
    }
}
echo json_encode(['code' => $errorCode, 'result' => null]);
