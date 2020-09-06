<?php
    include("db.php");
    
    session_start();
    
    $usuario = $_POST['username'];
    $password = $_POST['pass'];
    $password = md5($password);

    $query = "SELECT * FROM acceso WHERE user = '$usuario' and pass = '$password'";
    $res = mysqli_query($conn, $query);
    
    $row = mysqli_num_rows($res);

    if($row > 0){
        $_SESSION['usuario'] = $usuario;
        header("location:../captura.php");
    } else{
        echo "Sus datos de acceso no se encuentran en nuestra Base de Datos, inténtelo nuevamente";
        echo '<br><a href="../admin.php">Regresar<a>';
    }
?>