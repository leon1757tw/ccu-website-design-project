<?php
require_once("../auth.php");
require_once(__DIR__ . "/../../../autoload.php");
use \Model\Account as Account;

extract($_POST);
$user = Account::findByUsername($_SESSION["username"]);

$user->phone = $phone;
$user->email = $email;

if($user->modifiedAccountInfo()){
    echo "Modified Success";
    if($_SESSION["identity"] == "user"){
        header("Location: ../../../public/member_center.php");
    }
    else if($_SESSION["identity"] == "admin"){
        header("Location: ../../../public/admin_center.php");
    }
} else {
    echo("<script> alert('Modified Error')</script>");
    if($_SESSION["identity"] == "user"){
        header("Location: ../../../public/member_center.php");
    }
    else if($_SESSION["identity"] == "admin"){
        header("Location: ../../../public/admin_center.php");
    }
}
?>