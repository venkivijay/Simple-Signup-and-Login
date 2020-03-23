<?php
session_start();
require_once("connectionController.php");
require('../functions.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $details = array("name" => "", "email" => "", "age" => 0, "dob" => 0, "contact" => 0);

    $result = getAllData($_SESSION['id']);

    if ($result != -1) {
        $details["name"] = $result["name"];
        $details["email"] = $result["email"];
        $details["age"] = $result["age"];
        $details["dob"] = $result["dob"];
        $details["contact"] = $result["contact"];
        echo json_encode(['details' => $details, 'result' => "success"]);
    } else
        echo json_encode(['result' => 'error']);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name'])) {
        updateName($_POST['name'], $_SESSION['id']);
    }
    if (!empty($_POST['dob'])) {
        updateDOB($_POST['dob'], $_SESSION['id']);
    }
    if (!empty($_POST['contact']) && preg_match('/^[0-9]{10}+$/', $_POST['contact'])) {
        updateContact($_POST['contact'], $_SESSION['id']);
    }
    storeInJSON();
    echo json_encode(['result' => "success"]);
}
