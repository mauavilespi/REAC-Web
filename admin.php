<!-- BD -->
<?php include("./includes/db.php")?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administraci&oacute;n</title>
    <!-- CSS -->
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Confirm jQuery -->
    <link rel="stylesheet" href="./plugins/confirm/css/jquery-confirm.css">
    <!-- Validetta -->
    <link rel="stylesheet" href="./plugins/validetta/validetta.min.css">

    <!-- JS -->
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery-3.5.1.min.js"></script>
    <!-- All - In -->
    <script src="./js/function.js"></script>
    <!-- Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/77a5db5bb0.js"></script>
    <!-- Confirms jQuery -->
    <script src="./plugins/confirm/js/jquery-confirm.js"></script>
    <!-- Validetta -->
    <script src="./plugins/validetta/validetta.min.js"></script>
    <script src="./plugins/validetta/validettaLang-es-ES.js"></script>

</head>

<body>
    <header>
        <img src="./images/Header.png" alt="Contacto Docente" class="responsive-img">
    </header>

    <form action="./includes/validate.php" method="POST">
        <h1>Administraci&oacute;n</h1>
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username">
        <br>
        <label for="pass">Password:</label>
        <br>
        <input type="password" id="pass" name="pass">
        <br>
        <input type="submit" value="Ingresar">
    </form>
</body>

</html>