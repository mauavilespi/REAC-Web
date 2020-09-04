<?php
    session_start();

    if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ''){
        echo 'No tiene los permisos para acceder aquí';
        die();
    }
    
    session_destroy();
    header("location:../admin.php");
?>
