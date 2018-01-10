<?php
require_once("account.php");

session_start();
extract($_POST);

$username = $_POST["account"];
$password = $_POST["password"];

$user = Account::findByUsername($username);

if($user->isUserExist($username)){
    if($user->verifyPassword($password)){
        $_SESSION["user_logged_in"] = "yes";
        $_SESSION["user_name"] = $username;
        echo "Login Success";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
        //header("Location:");
    }
    else{
        echo "Invalid Password";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
        //header("Location:");
    }
}
else{
    echo "Account Not Found";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
    //header("Location:");
}

?>