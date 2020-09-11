$(function () {
    for (let index =1;index <500; index++ ){
        let idCardTitle = "#cardTitle"+index;
        let idCardBody = "#card"+index;
        
        $(idCardTitle).click(function(){
            $(idCardBody).toggle("slow");
        });
    }
    
});