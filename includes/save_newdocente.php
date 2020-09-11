<?php
    include("db.php");
    session_start();
    if((isset($_SESSION['usuario'])) && (isset($_POST['new_name']))){
    
    $newName= $_POST['new_name'];
    $newApePat = $_POST['new_apepat'];
    $newApeMat = $_POST['new_apemat'];

    $nuevoDocente = [];

    $query_newDoc = "INSERT INTO Docentes (nombre, apellido_pat, apellido_mat) VALUES (UPPER('$newName'), UPPER('$newApePat'), UPPER('$newApeMat'))";
    $res_addNew = mysqli_query($conn, $query_newDoc);
    $nuevoDocente ['mensaje'] = "<p class='center-align' style='font-size:1.7em'>El docente <span style='color:green'>".mb_strtoupper($newName, 'UTF-8').' '.mb_strtoupper($newApePat, 'UTF-8').' '.mb_strtoupper($newApeMat, 'UTF-8')."</span> se ha agregado con &eacute;xito</p>";
    
    echo json_encode($nuevoDocente);
    } else{
    header("location:../index.php");
    }
?>