<?php
require_once(__DIR__ . "/../../../autoload.php");

use Model\Account;
session_start();
extract($_POST);
$user = \Model\Account::findByUsername($username);

if($user->isUserExist($username)){
    if($user->verifyPassword($password)){
        $_SESSION["isLogin"] = "yes";
        $_SESSION["username"] = $username;
        echo "Login Success";
        if($user->privilege == 5){
            $_SESSION["identity"] = "user";
            header("Location: ../../../public/index.php");
        }else if($user->privilege == 10){
            $_SESSION["identity"] = "admin";
            header("Location: ../../../public/admin.php");
        }
    }
    else{
        echo("<script> alert('Invalid Password')</script>");
        header("Refresh:0 ../../../public/index.php");
    }
}
else{
    echo("<script> alert('Account Not Found')</script>");
    header("Refresh:0 ../../../public/index.php");
}

?>