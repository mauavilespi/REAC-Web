<?php
    include("db.php");
    
    session_start();
    
    $usuario = $_POST['username'];
    $password = $_POST['pass'];
    $password = md5($password);

    //Arreglo Asociativo
    $respAX = [];

    $query = "SELECT * FROM acceso WHERE user = '$usuario' and pass = '$password'";
    $res = mysqli_query($conn, $query);
    
    $row = mysqli_num_rows($res);

    if($row > 0){
        $_SESSION['usuario'] = $usuario;
        $respAX['cod'] = 1;
        $respAX['msg'] = "Bienvenido $usuario";
        //header("location:../captura.php");
    } else{
        $respAX['cod'] = 0;
        $respAX['msg'] = "El usuario $usuario no se encuentran en nuestra base de datos, inténtelo nuevamente";
        //echo '<br><a href="../admin.php">Regresar<a>';
    }

    echo json_encode($respAX);
    
?>