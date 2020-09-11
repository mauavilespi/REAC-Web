$(function () {
    $("#form_editDocente").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        validators: {
            regExp: {
                letters : {
                    pattern : /^[a-zA-ZÀ-ÿ\u00f1\u00d1\s]*$/i, 
                    errorMessage : 'No se aceptan números'
                }
            }
        },  
        onValid:function(e){
            e.preventDefault();
            $.confirm({
                title: '<h3 style="text-align:center;" class="thin">Administraci&oacute;n</h3>',
                type:'orange',
                content: "<p class='center-align' style='font-size:1.7em'>¿Está seguro de editar al docente?</p>",
                typeAnimated: true,
                buttons: {
                   tryAgain: {
                    text: 'Confirmar',
                    btnClass: 'btn-orange',
                    action: function(){
                        $.ajax({
                            method:"POST",
                            url:"./includes/edit_docente.php",
                            data:$("#form_editDocente").serialize(),
                            cache: "false",
                            success:function(){
                                location.reload();
                            }
                        });
                      },
                    },
                    No: function(){
                    }
                }
            });
        },
    });
});
                