<?php
    session_start();
    if(isset($_SESSION["username"])){
        if($_SESSION["identity"] == "admin"){
            header("Location: admin.php");
        }
    }
    else{
        header("Location: index.php");
    }
?>