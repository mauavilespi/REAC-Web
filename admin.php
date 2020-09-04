<!-- BD -->
<?php include("./includes/db.php")?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto Docente</title>
</head>

<body>
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