$(function () {
    $("#delete_doc").on("click", function() { 
        $.confirm({
            title: '<h3 style="text-align:center;" class="thin">Administraci&oacute;n</h3>',
            type:'red',
            content: "<p class='center-align' style='font-size:1.7em'>¿Está seguro de eliminar al docente?</p>",
            typeAnimated: true,
            buttons: {
                tryAgain: {
                text: 'Confirmar',
                btnClass: 'btn-red',
                action:function(){
                    $.ajax({
                        method: "POST",
                        url: "./includes/delete_docente.php",
                        cache:"false",
                        success: function () {
                            location.reload();
                        }
                    });
                }
                },
                No: function(){
                }
            }
        });
    });
});
    