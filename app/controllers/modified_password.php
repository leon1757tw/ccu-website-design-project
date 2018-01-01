<?php
require_once("../controllers/auth.php");
require_once("../model/account.php");

extract($_POST);
$user = Account::findByUsername($_SESSION["username"]);

if($user->verifyPassword($oldPassword)){
    if($newPassword == $checkNewPassword){
        $user->modifiedPassword($newPassword);
        echo "Modified Password Success";
        header("Location:");
    }
    else{
        echo "Please Check Your New Password";
        header("Location:");
    }
}
else{
    echo "Input Wrong Old Password";
    header("Location:");
}
?>