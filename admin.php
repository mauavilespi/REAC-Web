<!-- BD -->
<?php include("./includes/db.php")?>
<?php session_start();?>

<?php if(isset($_SESSION['usuario'])){
    header("location:./captura.php");
} else{ ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administraci&oacute;n</title>
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
                <form id="form_acceso" autocomplete="off">
                
                    <div class="row">
                        <h1 class="center-align">Administraci&oacute;n</h1>
                    </div>

                    <div class="row">
                        <div class="input-field col l8 offset-l2">
                            <i class="material-icons prefix">person_outline</i>
                            <input type="text" id="username" name="username" data-validetta="required,minLength[5]"> 
                            <label for="username">Usuario</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col l8 offset-l2">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" id="pass" name="pass" data-validetta="required,minLength[5]">
                            <label for="pass">Contrase&nacute;a</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l2 offset-l5">
                            <button type="submit" class="btn blue darken-2 waves-effect waves-light">
                                <i class="material-icons right">send</i>Acceder
                            </button>
                        </div>
                    </div>

                </form>
        </div>
    </main>
</body>

</html>

<?php } ?>