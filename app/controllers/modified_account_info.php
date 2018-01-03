<?php
require_once("../controllers/auth.php");
require_once("../model/account.php");

extract($_POST);
$user = Account::findByUsername($_SESSION["username"]);

$user->phone = $phone;
$user->email = $email;

if($user->modifiedAccountInfo()){
    echo "Modified Success";
    header("Location: ./../view/member_center.php");
} else {
    echo "Modified Error";
    header("Location: ");
}
?>