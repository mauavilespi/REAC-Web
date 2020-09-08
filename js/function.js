$(function () {
  //Select Docente
  $('select').formSelect();
  M.updateTextFields();
  
  //Form Acceso Admin
  $("#form_acceso").validetta({
    bubblePosition: "bottom",
    bubbleGapTop: 10,
    bubbleGapLeft: -5,

    onValid:function(e){
      e.preventDefault();
      $.ajax({
        method:"POST",
        url:"./includes/validate.php",
        data:$("#form_acceso").serialize(),
        cache: "false",
        success:function(respAX){
          var AX = JSON.parse(respAX);
          var titulo = '<h3 style="text-align:center;" class="thin">Administraci&oacute;n</h3>';
          
          if(AX.cod == 0){
            $.confirm({
              title: titulo,
              content: AX.msg,
              type:'red',
              typeAnimated: true,
              buttons: {
                tryAgain: {
                  text: 'Intentar de nuevo',
                  btnClass: 'btn-red',
                  action: function(){
                    location.reload();
                  }
                },
              }
            });
          } else {
            $.confirm({
              icon: 'fas fa-school',
              title:titulo,
              content: AX.msg,
              type:'green',
              typeAnimated: true,
              buttons: {
                acceder: {
                  text: 'Confirmar acceso',
                  btnClass: 'btn-green',
                  action: function(){
                    location.replace("./captura.php");
                  }
                }
              }
            });
          }
        }
      });
    }
  });
});

