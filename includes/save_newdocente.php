<?php
    include("db.php");
    session_start();
    if((isset($_SESSION['usuario'])) && isset($_POST['new_name'])){
    
    $newName= $_POST['new_name'];
    $newApePat = $_POST['new_apepat'];
    $newApeMat = $_POST['new_apemat'];

    $query_newDoc = "INSERT INTO Docentes (nombre, apellido_pat, apellido_mat) VALUES ('$newName', '$newApePat', '$newApeMat')";
    $res_addNew = mysqli_query($conn, $query_newDoc);
    
    } else{
    header("location:../index.php");
    }
?>