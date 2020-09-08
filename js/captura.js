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
                }
            });
        }
    });
});