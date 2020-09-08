function delete_docente(e) { 
    $.ajax({
        method: "POST",
        url: "./includes/delete_docente.php",
        cache:"false",
        success: function () {
            location.reload();
        }
    });
}
