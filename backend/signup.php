<?php
try {
session_start();
include 'db.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$created_at = date("Y-m-d H:i:s");

if($conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)) {
    $loginQuery = $conn->prepare("SELECT * FROM `users` WHERE `email`='$email'"); 
    $loginQuery->execute();
    $rowCount = $loginQuery->rowCount();
    $result = $loginQuery->setFetchMode(PDO::FETCH_ASSOC); 
    if($result && $rowCount > 0){
        echo 'email_exists';
        // echo false;
    } else {
        $registerQuery = "INSERT INTO `users` SET `fullname`='$fullname', `email`='$email', `password`='$hashed_password', status='1', `created_at`='$created_at' ,";
		
		if($conn->exec($registerQuery)){
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
		
            echo  "New record created successfully";
        } else {
            echo false;
        }
    }
}
}
catch (PDOException $e){
	echo $e->getMessage();
}

?>