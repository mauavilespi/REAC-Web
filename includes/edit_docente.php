<?php
    include("db.php");
    session_start();
    if(isset($_SESSION['usuario'])){

    $id_edit = $_SESSION['id'];
    $newName_edit= $_POST['edit_name'];
    $newApePat_edit = $_POST['edit_apepat'];
    $newApeMat_edit = $_POST['edit_apemat'];

    $query_editDoc = "UPDATE Docentes SET nombre='$newName_edit', apellido_pat='$newApePat_edit', apellido_mat='$newApeMat_edit' WHERE id='$id_edit'";
    $res_editNew = mysqli_query($conn, $query_editDoc);

    } else{
    header("location:../index.php");
    }
    
?>