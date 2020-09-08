$(function () {
    $("#form_editDocente").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
    
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