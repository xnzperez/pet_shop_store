<?php
// Verificar si se ha enviado el formulario para vender un producto
if (isset($_POST['save_product_sale'])) {
    // Incluir archivo de conexión a la base de datos
    include("db.php");

    // Obtener datos del formulario
    $producto_id = $_POST['producto_id'];
    $cliente_id = $_POST['cliente_id'];
    $fecha_venta = $_POST['fecha_venta'];
    $precio = $_POST['precio'];

    // Insertar datos en la tabla producto_vendido
    $query = "INSERT INTO producto_vendido (Producto_ID, Cliente_ID, Fecha_Venta, Precio) 
            VALUES ('$producto_id', '$cliente_id', '$fecha_venta', '$precio')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redireccionar a la página principal con un mensaje de éxito
        header("Location: index.php?success=1");
        exit();
    } else {
        // Mostrar mensaje de error si la inserción falla
        echo "Error al vender el producto: " . mysqli_error($conn);
    }
}

// Actualizar la tabla producto vendido "si"
$query = "UPDATE productos SET vendido = 'si' WHERE ID = '$producto_id'";
?>


<!-- Volver a la página generate_invoice.php -->
<div class="container p-4">
    <a href="generate_invoice.php" class="btn btn-primary">Volver a la página de generar factura</a>
</div>
