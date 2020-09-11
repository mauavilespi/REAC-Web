$(function () {
    $('.modal').modal();

    $("#form_addDocente").validetta({
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
            $.ajax({
                method:"POST",
                url:"./includes/save_newdocente.php",
                data:$("#form_addDocente").serialize(),
                cache: "false",
                success:function(){
                    $.confirm({
                        columnClass: 'small',
                        title: '<h3 style="text-align:center;" class="thin">Administraci&oacute;n</h3>',
                        icon: 'fa fa-check-circle fa-lg',
                        type: 'green',
                        content: "<p class='center-align' style='font-size:1.7em'>El docente se ha agregado con &eacute;xito</p>",
                        buttons: {
                            ok:function(){
                                location.reload();
                            }
                        }
                    });
                }
            });
        }
    });
});