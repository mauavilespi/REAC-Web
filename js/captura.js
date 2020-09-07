$(function () {
    $("#form_captura").submit(function (e) { 
        e.preventDefault();
        $.ajax({
            method:"POST",
            url: "./includes/save_docente.php",
            data: $("#form_captura").serialize(),
            cache: "false",
            success: function () {   
            }
        });
    });
});