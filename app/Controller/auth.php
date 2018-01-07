<?php
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["identity"])){
        header("Location: ../../public/index.php");
    }
?>