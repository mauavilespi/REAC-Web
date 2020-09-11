<?php
    include("db.php");
    session_start();
    if(isset($_SESSION['usuario'])){

    $id_doc = $_POST['id_doc'];    
    $_SESSION['id'] = $id_doc;
    $respAX2 = [];

    $query_doc = "SELECT * FROM Docentes WHERE id = '$id_doc'";
    $res_doc = mysqli_query($conn, $query_doc);
    $docInfoRow = $res_doc->fetch_assoc();


    $respAX['correo'] = $docInfoRow['correo'];
    $respAX['plataforma'] = $docInfoRow['plataforma'];
    $respAX['descripcion'] = $docInfoRow['descripcion'];
    $respAX['nombre'] = $docInfoRow['nombre'];
    $respAX['apellido_pat'] = $docInfoRow['apellido_pat'];
    $respAX['apellido_mat'] = $docInfoRow['apellido_mat'];
    
        
    echo json_encode($respAX);
    
    } else{
    header("location:../index.php");
}
?>