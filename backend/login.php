<?php
session_start();
include 'db.php';
error_reporting(E_ERROR | E_PARSE);
$email = $_POST['email'];
$password = $_POST['password'];
if($conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)) {
    $loginQuery = $conn->prepare("SELECT * FROM `users` WHERE `email`='$email'"); 
    $loginQuery->execute();
    $resultRow = $loginQuery->fetch();
    $rowCount = $loginQuery->rowCount();
    $result = $loginQuery->setFetchMode(PDO::FETCH_ASSOC);
    if($result && $rowCount > 0){
        $dbPassword = $resultRow['password'];
        if(password_verify($password, $dbPassword)) {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $dbPassword;
            echo 'success';
        } else {
            echo false;
        }
    } else {
    	echo false;
    }
}
?>