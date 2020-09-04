<?php 
    include("./includes/db.php");
    session_start(); 

    if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ''){
        echo 'No tiene los permisos para acceder aquí';
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de datos</title>
</head>
<body>
    <h1> Captura de datos </h1>
    <h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>
    <a href="./includes/cerrar_sesion.php">Cerrar sesión</a>
    
</body>
</html>