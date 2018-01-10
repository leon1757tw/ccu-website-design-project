<?php
require_once("account.php");

extract($_POST);
$user = new Account();

$username = $_POST["user"];
$password = $_POST["pass"];
$email = $_POST["email"];
$phone = $_POST["phone"];

if(!$user->isUserExist($username)){
    $user->username = $username;
    $user->password = $user->encryptPassword($password);
    $user->email = $email;
    $user->phone = $phone;
    if(!empty($user->createAccount())){
        echo("Account Create Success!");
        //header("Location:");
	echo '<meta http-equiv=REFRESH CONTENT=1;url=log.html>';
    } 
    else{
        echo("Request Error! Please Try Again");
        header("Location:");
    }
} 
else{
    echo("Create Failed! User is Already Exists!");
    header("Location:");
}

?>