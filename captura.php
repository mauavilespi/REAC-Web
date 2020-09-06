<?php 
    include("./includes/db.php");
    session_start(); 

    if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ''){
        echo 'No tiene los permisos para acceder aquí';
        die();
    }

    $query_docentes = "SELECT * FROM Docentes";
    $res_docentes = mysqli_query($conn, $query_docentes);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de datos</title>

    <!-- Materialize -->
    <link rel="stylesheet" href="./plugins/materialize/css/materialize.min.css">
</head>

<body>
    <h1> Captura de datos </h1>
    <h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>

    <div class="row">
    <div class="input-field col s4 offset-s4">
        <select>
            <option value="" disabled selected>Docentes:</option>
                <?php while ($row1 = mysqli_fetch_array($res_docentes)):; ?>
                    <option value='<?php echo $row1[0]?>'><?php echo $row1[1].' '.$row1[2].' '.$row1[3];?></option>
                <?php endwhile; ?>
        </select>
        <label>Docente</label>
    </div>
  </div>

    <a href="./includes/cerrar_sesion.php">Cerrar sesión</a>
    

    <!-- JS -->
    <script src="./plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="./plugins/materialize/js/materialize.min.js"></script>
    <script src="./js/function.js"></script>
</body>
</html>