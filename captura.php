<?php 
    include("./includes/db.php");
    session_start(); 

    if(isset($_SESSION['usuario'])){
    

    $query_docentes = "SELECT * FROM Docentes order by nombre";
    $res_docentes = mysqli_query($conn, $query_docentes);
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
    <script src="./js/docentes.js"></script>
    <script src="./js/edit_docente.js"></script>
    <script src="./js/delete_docente.js"></script>
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
        <img src="./images/Header6.jpg" alt="Contacto Docente" class="responsive-img">
    </header>

    <main class="valign-wrapper">
        <div class="container">
            <h3 class="center-align thin"> Captura de datos</h3>
            
            <form id="form_captura" autocomplete="off">
        
                <div class="row">
                    <div class="input-field col l8 offset-l2 s9 m8 offset-m2">
                        <i class="material-icons prefix">assignment_ind</i>
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
                    <div class="col l1 s1 m1">
                         <a class="btn-floating btn waves-effect light-blue" id="crud_access" ><i class="material-icons">arrow_drop_down</i></a>
                    </div>
                </div>

                <div class="row" id="crud_docentes" style="display: none">
                    <!--Crear Docente -->
                    <div class="col l2 offset-l3 s6 offset-s3 m6 offset-m3" style="padding-bottom: 0.5em;">
                        <a class="waves-effect waves-light btn green darken-2 modal-trigger" style="width:100%;padding-bottom: 0.5em;" href="#modal1">Agregar Docente</a>
                    </div>
                
                    <!-- Editar Docente -->
                    <div class="col l2 s6 offset-s3 m6 offset-m3" style="padding-bottom: 0.5em;">
                        <a class="waves-effect waves-light btn amber darken-1 modal-trigger disabled" id="edit_doc" style="width:100%;padding-bottom: 0.5em;" href="#modal2">Editar Docente</a>
                    </div>

                    <!-- Eliminar Docente -->
                    <div class="col l2 s6 offset-s3 m6 offset-m3" style="padding-bottom: 0.5em;">
                        <a class="waves-effect waves-light btn red lighten-1 disabled" id="delete_doc" style="width:100%;">Eliminar Docente</a>
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
                                
                                $("#edit_doc").removeClass("disabled");
                                $("#delete_doc").removeClass("disabled");
                                $("#guardar_info").removeClass("disabled");

                                $("#edit_name").val(AX2.nombre);
                                $("#edit_apepat").val(AX2.apellido_pat);
                                $("#edit_apemat").val(AX2.apellido_mat);
                                
                            }
                        });
                    };
                </script>
                <!-- -->

                <div class="row">
                    <div class="input-field col l4 offset-l2 s12">
                        <i class="material-icons prefix">email</i>
                        <input placeholder=" "  id="email" name="email" type="text" data-validetta="required,email" value="">
                        <label for="email">Correo</label>
                    </div>

                    <div class="input-field col l4 s12">
                        <i class="material-icons prefix">devices</i>
                        <input placeholder=" " id="plattform" name="plattform" type="text" value="">
                        <label class="active" for="plattform">Plataforma / Tecnolog&iacute;a a utilizar</label>
                    </div>

                    <div class="input-field col l4 offset-l4 s12">
                        <i class="material-icons prefix">insert_comment</i>
                        <textarea placeholder=" " id="description" name="description" class="materialize-textarea"></textarea>
                        <label class="active" for="description">Descripci&oacute;n u Observaciones</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col l4 offset-l4 m6 offset-m3 s8 offset-s2">
                        <button type="submit" class="btn blue darken-2 waves-effect waves-light disabled" style="width:100%;" id="guardar_info">
                            Guardar  <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </form>



        <!--Agregar Docente (Modal1)-->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 class="center-align">Agregar Docente</h4>
                <p class="center-align">Si el docente no se encuentra en la lista, por favor agr&eacute;guelo</p>
                            
                <div class="row">
                                
                    <form id="form_addDocente" autocomplete="off">
                        <div class="input-field col l4 s12 m12">
                            <i class="material-icons prefix">perm_identity</i>
                            <input id="new_name" name="new_name" type="text" data-validetta="required,regExp[letters]">    
                            <label class="active" for="new_name">Nombre</label>
                        </div>

                        <div class="input-field col l4 s12 m12">
                            <input id="new_apepat" name="new_apepat" type="text" data-validetta="required,regExp[letters]">    
                            <label class="active" for="new_apepat">Apellido Paterno</label>
                        </div>

                        <div class="input-field col l4 s12 m12">
                            <input id="new_apemat" name="new_apemat" type="text" data-validetta="regExp[letters]">    
                            <label class="active" for="new_apemat">Apellido Materno</label>
                        </div>
                        
                        <div class="row">
                            <div class="col l4 offset-l4 s8 offset-s2 m6 offset-m3">
                                <button type="submit" class="btn blue darken-2 waves-effect waves-light" style="width:100%;">
                                Guardar  <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atr&aacute;s</a>
            </div>
        </div>
        <!---->

        <!-- Editar Docente -->
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4 class="center-align">Editar Docente</h4>
                <p class="center-align">Seleccione al Docente antes de editarlo</p>
            </div>

            <div class="row">
                <form id="form_editDocente" autocomplete="off">
                    <div class="input-field col l4 s12 m12">
                        <i class="material-icons prefix">perm_identity</i>
                        <input placeholder=" " id="edit_name" name="edit_name" type="text" data-validetta="required,regExp[letters]">    
                        <label class="active" for="edit_name">Nombre</label>
                    </div>

                    <div class="input-field col l4 s12 m12">
                        <input placeholder=" " id="edit_apepat" name="edit_apepat" type="text" data-validetta="required,regExp[letters]">    
                        <label class="active" for="edit_apepat">Apellido Paterno</label>
                    </div>

                    <div class="input-field col l4 s12 m12">
                        <input placeholder=" " id="edit_apemat" name="edit_apemat" type="text" value="" data-validetta="regExp[letters]">    
                        <label class="active" for="edit_apemat">Apellido Materno</label>
                    </div>
                                            
                    <div class="row">
                        <div class="col l4 offset-l4 s8 offset-s2 m6 offset-m3">
                            <button type="submit" class="btn blue darken-2 waves-effect waves-light" style="width:100%;">Guardar  <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </form>                    
            </div>
            
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atr&aacute;s</a>
            </div>
        </div>
        <!---->
    
        <div class="row right" style="padding-top:2em;">
            <a href="./includes/cerrar_sesion.php">Cerrar sesi&oacute;n <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
        
  </main>

  <?php include("./mod/footer.php") ?>
  
</body>
</html>

<?php } else {
    header("location:./admin.php");
} ?>