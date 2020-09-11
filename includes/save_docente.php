<?php
    include("db.php");
    session_start();
    if(isset($_SESSION['usuario'])){
    
    $id = $_SESSION['id'];
    $email = $_POST['email'];
    $plattform = $_POST['plattform'];
    $description = $_POST['description'];

    $query_add = "UPDATE Docentes SET correo='$email', plataforma='$plattform', descripcion='$description' WHERE id = '$id'";
    $resAddInfo = mysqli_query($conn, $query_add);

    } else{
    header("location:../index.php");
    }
    
?>