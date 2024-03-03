<?php

include("conexion.php");

if (isset($_POST['save'])){
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];
    
    
    $query = "INSERT INTO productos(producto_nombre, producto_precio, producto_marca) VALUES ('$producto', $precio, '$marca')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = 'Producto Agregado';
    $_SESSION['message_type'] = 'success';
    
    header("location: index.php");
}

?>