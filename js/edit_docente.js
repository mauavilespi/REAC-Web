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
            $.ajax({
                method:"POST",
                url:"./includes/edit_docente.php",
                data:$("#form_editDocente").serialize(),
                cache: "false",
                success:function(){
                    location.reload();
                }
            });
        }
    });
});