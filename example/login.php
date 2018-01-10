<?php
require_once("account.php");

session_start();
extract($_POST);

$username = $_POST["user"];
$password = $_POST["pass"];

$user = Account::findByUsername($username);

if($user->isUserExist($username)){
    if($user->verifyPassword($password)){
        $_SESSION["user_logged_in"] = "yes";
        $_SESSION["user_name"] = $username;
        echo "Login Success";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=edit.php>';
        //header("Location:");
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