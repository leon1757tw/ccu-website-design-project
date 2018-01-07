<?php
require_once(__DIR__ . "/../../../autoload.php");

use Model\Account;
extract($_POST);
$user = new Account();

if(!$user->isUserExist($username)){
    if($password == $passwordCheck){
        $user->username = $username;
        $user->password = $user->encryptPassword($password);
        $user->email = $email;
        $user->phone = $phone;
        $user->privilege = $user->setPrivilege($identity);
        if($user->createAccount()){
            echo("Account Create Success!");
            header("Location: ../../../public/index.php");
        } 
        else{
            echo("<script> alert('Request Error! Please Try Again')</script>");
            header("Refresh:0  url=../../../public/index.php"); 
        }
    }
    else{
        echo("<script> alert('Create Failed! Password Input Error')</script>");
        header("Refresh:0  url=../../../public/index.php"); 
    }
} 
else{
    echo("<script> alert('Create Failed! User is Already Exists!')</script>");
    header("Refresh:0  url=../../../public/index.php"); 
}

?>