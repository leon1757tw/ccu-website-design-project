<?php
require_once("../model/account.php");

session_start();
extract($_POST);
$user = Account::findByUsername($username);

if($user->isUserExist($username)){
    if($user->verifyPassword($password)){
        $_SESSION["isLogin"] = "yes";
        $_SESSION["username"] = $username;
        echo "Login Success";
        header("Location: ./../view/index.php");
    }
    else{
        echo "Invalid Password";
        header("Location:");
    }
}
else{
    echo "Account Not Found";
    header("Location:");
}

?>