<?php
    session_start();
    if(isset($_SESSION["username"])){
        if($_SESSION["identity"] == "user"){
            header("Location: index.php");
        }
    }
    else{
        header("Location: index.php");
    }
?>