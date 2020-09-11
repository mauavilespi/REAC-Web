<!-- BD -->
<?php include("./includes/db.php")?>
<?php session_start();?>
<?php
    $query_datos = "SELECT * FROM Docentes WHERE LENGTH(correo) > 0 ORDER BY nombre";
    $res_datos = mysqli_query($conn, $query_datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Contactos Docentes REAC </title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Icons Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- JS -->
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery-3.5.1.min.js"></script>
    <!-- Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/77a5db5bb0.js"></script>
</head>

<body>
    <header>
        <img src="./images/Header6.jpg" alt="Contacto Docente" class="responsive-img">
    </header>

    <main class="valign-wrapper">      
        <div class="container">

            <div class="row">
                <h2 class="center-align thin">Contactos de los docentes para los cursos de Recuperaci&oacute;n Acad&eacute;mica</h2>
            </div>
            
            <div class="row">
                <?php 
                    while ($infoRow = $res_datos->fetch_assoc()){
                        echo '<div class="col l4">';
                        echo '<div class="card medium small blue darken-2">';
                        echo '<div class="card-content white-text">';
                        echo '<span class="card-title align-center">'.$infoRow['nombre'].' '.$infoRow['apellido_pat'].' '.$infoRow['apellido_mat'].'</span>';
                        echo '<b>Correo: </b> <span>'.$infoRow['correo'].'</span>';
                        echo '<br>';
                        echo '<br>';
                        echo '<b>Plataforma / Tecnolog&iacute;a a utilizar: </b> <span>'.$infoRow['plataforma'].'</span>';
                        echo '<br>';
                        echo '<br>';
                        echo '<b>Descripci&oacute;n u Observaciones: </b> <span>'.$infoRow['descripcion'].'</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div> 
    </main>

    <?php include("./mod/footer.php") ?>
</body>

</html>