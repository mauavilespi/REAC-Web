<?php 
    include("./includes/db.php");
    session_start(); 

    if(isset($_SESSION['usuario'])){
    

    $query_docentes = "SELECT * FROM Docentes";
    $res_docentes = mysqli_query($conn, $query_docentes);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de Datos</title>
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
    <script src="./js/captura.js"></script>
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
            <h1 class="center-align"> Captura de datos</h1>
            
            <form id="form_captura" autocomplete="off">
        
                <div class="row">
                    <div class="input-field col l4 offset-l4">
                        <select id="docente" name="docente" onchange="on_change()">
                            <option value="" disabled selected>ESCOM</option>

                            <?php 
                            while ($docRow = $res_docentes->fetch_assoc()){
                                echo '<option value="'.$docRow['id'].'">'.$docRow['nombre'].' '.$docRow['apellido_pat'].' '.$docRow['apellido_mat'].'</option>';
                            }
                            ?>

                        </select>
                        <label for="docente">Docente:</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col l2 offset-l3">
                        <a class="waves-effect waves-light btn green darken-2">Crear Docente</a>
                    </div>
                    <div class="col l2">
                        <a class="waves-effect waves-light btn amber darken-1">Editar Docente</a>
                    </div>
                    <div class="col l2">
                        <a class="waves-effect waves-light btn red lighten-1">Eliminar Docente</a>
                    </div>
                </div>

                <!-- Correo, plataforma y descripción -->
                <script>
                    function on_change(){
                        var id_doc=$('#docente').val();
                        $.ajax({
                            type:"POST",
                            url: "./includes/info_docente.php",
                            data: {id_doc: id_doc},
                            cache:"false",
                            success:function(respAX2){
                                var AX2 = JSON.parse(respAX2);
                                $("#email").val(AX2.correo);
                                $("#plattform").val(AX2.plataforma);
                                $("#description").val(AX2.descripcion);
                            }
                        });
                    };
                </script>
                <!-- -->

                <div class="row">
                    <div class="input-field col l4 offset-l2">
                        <input placeholder=" "  id="email" name="email" type="email" class="validate" value="">
                        <label for="email">Correo</label>
                    </div>

                    <div class="input-field col l4">
                        <input placeholder=" " id="plattform" name="plattform" type="text" value="">
                        <label class="active" for="plattform">Plataforma / Tecnolog&iacute;a a utilizar</label>
                    </div>

                    <div class="input-field col l4 offset-l4">
                        <textarea placeholder=" " id="description" name="description" class="materialize-textarea"></textarea>
                        <label class="active" for="description">Descripci&oacute;n u Observaciones</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col l2 offset-l5">
                        <button type="submit" class="btn blue darken-2 waves-effect waves-light">
                            Guardar  <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </form>

        <div class="row">
            <a href="./includes/cerrar_sesion.php">Cerrar sesi&oacute;n</a>
        </div>
        
  </main>

    
</body>
</html>

<?php } else {
    header("location:./admin.php");
} ?>