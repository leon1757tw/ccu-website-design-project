<?php
require_once("../auth.php");
require_once(__DIR__ . "/../../../autoload.php");
use \Model\Account as Account;

extract($_POST);
$user = Account::findByUsername($_SESSION["username"]);

if($user->verifyPassword($oldPassword)){
    if($newPassword == $newPasswordCheck){
        $user->modifiedPassword($newPassword);
        echo "Modified Password Success";
        if($_SESSION["identity"] == "user"){
            header("Location: ../../../public/member_center.php");
        }
        else if($_SESSION["identity"] == "admin"){
            header("Location: ../../../public/admin_center.php");
        }
    }
    else{
        echo("<script> alert('Please Check Your New Password')</script>");
        if($_SESSION["identity"] == "user"){
            header("Refresh:0  url=../../../public/member_center.php");
        }
        else if($_SESSION["identity"] == "admin"){
            header("Refresh:0  url=../../../public/admin_center.php");
        }
    }
}
else{
    echo("<script> alert('Input Wrong Old Password')</script>");
    if($_SESSION["identity"] == "user"){
        header("Refresh:0  url=../../../public/member_center.php");
    }
    else if($_SESSION["identity"] == "admin"){
        header("Refresh:0  url=../../../public/admin_center.php");
    }
}
?>