$(function () {

    $("#crud_access").click(function(){
        $("#crud_docentes").toggle("slow");
    });

    $("#form_captura").validetta({ 
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                method:"POST",
                url: "./includes/save_docente.php",
                data: $("#form_captura").serialize(),
                cache: "false",
                success: function () { 
                    $.alert({
                        columnClass: 'small',
                        title: '<h3 style="text-align:center;" class="thin">Administraci&oacute;n</h3>',
                        icon: 'fa fa-check-circle fa-lg',
                        type: 'green',
                        content: "<p class='center-align' style='font-size:1.7em'>Los datos se han guardado satisfactoriamente</p>",
                    });  
                }
            });
        }
    });
});