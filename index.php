<!-- BD -->
<?php include("./includes/db.php")?>
<?php session_start();?>
<?php
    $query_datos = "SELECT * FROM Docentes WHERE correo IS NOT NULL OR plataforma IS NOT NULL OR descripcion IS NOT NULL";
    $res_datos = mysqli_query($conn, $query_datos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos Docentes REAC </title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Confirm jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Validetta -->
    <link rel="stylesheet" href="./plugins/validetta/validetta.min.css">
    <!-- Icons Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- JS -->
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery-3.5.1.min.js"></script>
    <!-- All - In -->
    <script src="./js/function.js"></script>
    <script src="./js/info.js"></script>
    <!-- Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/77a5db5bb0.js"></script>
   <!-- Confirm jQuery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Validetta -->
    <script src="./plugins/validetta/validetta.min.js"></script>
    <script src="./plugins/validetta/validettaLang-es-ES.js"></script>
</head>

<body>
    <header>
        <img src="./images/HeaderS.png" alt="Contacto Docente" class="responsive-img">
    </header>

    <main class="valign-wrapper">      
        <div class="container">
            <h1 class="center-align">Contactos de los docentes para los cursos de Recuperaci&oacute;n Acad&eacute;mica</h1>
    
            <div class="row">
                <?php 
                    while ($infoRow = $res_datos->fetch_assoc()){
                        echo '<div class="col l4">';
                        echo '<div class="card blue darken-2">';
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

</body>

</html>