<?php
include("db.php");

if(isset($_POST['save_invoice'])) {
    // Recibir los datos del formulario
    $cliente_id = $_POST['cliente_id'];
    $mascota_id = $_POST['mascota_id'];
    $producto_id = $_POST['producto_id'];
    $vacuna_id = $_POST['vacuna_id'];
    $fecha_venta = $_POST['fecha_venta'];
    $cantidad_mascota = $_POST['cantidad_mascota'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $cantidad_vacuna = $_POST['cantidad_vacuna'];
    $precio_mascota = $_POST['precio_mascota'];
    $precio_producto = $_POST['precio_producto'];
    $precio_vacuna = $_POST['precio_vacuna'];

    // Insertar factura
    $query_factura = "INSERT INTO factura (Cliente, Fecha_Venta) VALUES ('$cliente_id', '$fecha_venta')";
    mysqli_query($conn, $query_factura);

    // Obtener el ID de la factura recién insertada
    $factura_id = mysqli_insert_id($conn);

    // Calcular el precio total para cada tipo de producto
    $total_mascota = $precio_mascota * $cantidad_mascota;
    $total_producto = $precio_producto * $cantidad_producto;
    $total_vacuna = $precio_vacuna * $cantidad_vacuna;

    // Insertar detalle de factura
    $query_detalle = "INSERT INTO factura_detalle (Factura_ID, Mascota_ID, Producto_ID, Vacuna_ID, Cantidad_Mascota, Cantidad_Producto, Cantidad_Vacuna, Precio_Mascota, Precio_Producto, Precio_Vacuna) 
                    VALUES ('$factura_id', '$mascota_id', '$producto_id', '$vacuna_id', '$cantidad_mascota', '$cantidad_producto', '$cantidad_vacuna', '$total_mascota', '$total_producto', '$total_vacuna')";
    mysqli_query($conn, $query_detalle);

    // Actualizar el estado de la mascota vendida
    if (!empty($mascota_id)) {
        $query_update_mascota = "UPDATE mascotas SET owner = 'si' WHERE ID = $mascota_id";
        mysqli_query($conn, $query_update_mascota);
    }

    // Actualizar tabla mascota_vendida si se vendió una mascota, que tenga Mascota_ID, Cliente_ID, Fecha_Venta y Precio
    if (!empty($mascota_id)) {
        $query_mascota_vendida = "INSERT INTO mascota_vendida (Mascota_ID, Cliente_ID, Fecha_Venta, Precio) VALUES ('$mascota_id', '$cliente_id', '$fecha_venta', '$total_mascota')";
        mysqli_query($conn, $query_mascota_vendida);
    }

    // Actualizar el estado de los productos vendidos
    if (!empty($producto_id)) {
        $query_update_producto = "UPDATE productos SET vendido = 'si' WHERE ID = $producto_id";
        mysqli_query($conn, $query_update_producto);
    }

    // Actualizar el estado de las vacunas vendidas
    if (!empty($vacuna_id)) {
        $query_update_vacuna = "UPDATE vacunas SET vendida = 'si' WHERE ID = $vacuna_id";
        mysqli_query($conn, $query_update_vacuna);
    }

    echo "Factura creada correctamente";
}
?>
