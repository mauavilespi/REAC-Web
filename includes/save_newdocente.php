<?php
    include("db.php");
    
    $newName= $_POST['new_name'];
    $newApePat = $_POST['new_apepat'];
    $newApeMat = $_POST['new_apemat'];

    $query_newDoc = "INSERT INTO Docentes (nombre, apellido_pat, apellido_mat) VALUES ('$newName', '$newApePat', '$newApeMat')";
    $res_addNew = mysqli_query($conn, $query_newDoc);
    
?>