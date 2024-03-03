<?php

include("conexion.php");

if(isset($_GET['id']))
    $id = $_GET['id'];
    $query = "DELETE FROM productos WHERE producto_id=$id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("pinche naco, fallaste jajajajajajaja");
    }

    $_SESSION['message'] = 'Producto Eliminado';
    $_SESSION['message_type'] = 'danger';

    header("location: index.php")
?>