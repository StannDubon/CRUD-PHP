<?php

include("conexion.php");

if(isset($_POST['edit']))
    $id = $_GET['id'];
    $producto = $_POST['producto_update'];
    $precio = $_POST['precio_update'];
    $marca = $_POST['marca_update'];


    $query = "UPDATE productos SET producto_nombre = '$producto', producto_precio = $precio, producto_marca = '$marca' WHERE producto_id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = 'Producto Actualizado';
    $_SESSION['message_type'] = 'info';

    header("location: index.php");
?>