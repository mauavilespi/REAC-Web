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
    <link rel="icon" href="./images/LogoESCOM.png" type="image">
    <title>Contactos Docentes REAC </title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/card.css">
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Icons Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <img src="./images/Header6.jpg" alt="Contacto Docente" class="responsive-img">
    </header>

    <main class="valign-wrapper">      
        <div class="container">

            <div class="flex-sm-row-reverse">
                <br>
                <h1 class="d-flex justify-content-center center-align thin" style="font-size:3.5em">Contactos de los docentes para los cursos de Recuperaci&oacute;n Acad&eacute;mica</h1>
                <br>
            </div>
            
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                <?php 
                    while ($infoRow = $res_datos->fetch_assoc()){
                        echo '<div class="col">';

                        echo '<div class="card text-center border-info col">';
                        echo '<div class="card-body">';
                        echo '<div class="card-title align-center" id="cardTitle'.$infoRow['id'].'">'.$infoRow['nombre'].' '.$infoRow['apellido_pat'].' '.$infoRow['apellido_mat'].'</div>';
                        echo '<hr>';
                        
                        echo '<div class="card-text" style="display: none;" id="card'.$infoRow['id'].'">';
                        echo '<i class="material-icons">email</i>';
                        echo '<br>';
                        echo '<b> Correo </b> ';
                        echo '<br>';
                        echo '<span>'.$infoRow['correo'].'</span>';
                        echo '<br>';
                        echo '<br>';

                        echo '<i class="material-icons">devices</i>';
                        echo '<br>';
                        echo '<b> Plataforma / Tecnolog&iacute;a a utilizar </b>';
                        echo '<br>';
                        echo '<span>'.$infoRow['plataforma'].'</span>';
                        echo '<br>';
                        echo '<br>';
                        
                        echo '<i class="material-icons">insert_comment</i>';
                        echo '<br>';
                        echo '<b> Descripci&oacute;n u Observaciones: </b>';
                        echo '<br>';
                        echo '<span>'.$infoRow['descripcion'].'</span>';
                        echo '</div>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div> 
    </main>

    <!-- JS -->
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery-3.5.1.min.js"></script>
    <!-- Cards -->
    <script src="./js/card.js"></script>
    <!-- Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/77a5db5bb0.js"></script>
    <?php include("./mod/footer.php") ?>
</body>

</html>