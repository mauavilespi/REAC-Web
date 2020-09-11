<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        session_destroy();
        header("location:../admin.php");
    } else{
        header("location:../index.php");
    }
?>