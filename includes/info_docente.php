<?php
    include("db.php");
    session_start();

    $id_doc = $_POST['id_doc'];    
    $_SESSION['id'] = $id_doc;
    $respAX2 = [];

    $query_doc = "SELECT * FROM Docentes WHERE id = '$id_doc'";
    $res_doc = mysqli_query($conn, $query_doc);
    $docInfoRow = $res_doc->fetch_assoc();


    $respAX['correo'] = $docInfoRow['correo'];
    $respAX['plataforma'] = $docInfoRow['plataforma'];
    $respAX['descripcion'] = $docInfoRow['descripcion'];
        
    echo json_encode($respAX);
?>