<?php
    include("db.php");
    session_start();

    $id_delete = $_SESSION['id'];
    
    $query_deleteDoc = "DELETE FROM Docentes WHERE id='$id_delete'";
    $res_deleteDoc = mysqli_query($conn, $query_deleteDoc);
    
?>