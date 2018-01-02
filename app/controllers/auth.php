<?php
session_start();
if(!$_SESSION["isLogin"] == "yes"){
    header("Location: ./../view/index.php");
}
?>