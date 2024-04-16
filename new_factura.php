<?php
include("db.php");

// Verificar si se recibió el ID del cliente y el ID de la factura
if(isset($_POST['cliente_id']) && isset($_POST['factura_id'])) {
    // Obtener el ID del cliente y el ID de la factura enviados desde el formulario
    $cliente_id = $_POST['cliente_id'];
    $factura_id = $_POST['factura_id'];
    
    // Obtener la fecha actual
    $fecha_venta = date("Y-m-d H:i:s");

    // Insertar nueva factura en la tabla factura
    $query = "INSERT INTO factura (ID, Cliente, Fecha_Venta) VALUES ('$factura_id', '$cliente_id', '$fecha_venta')";
    $result = mysqli_query($conn, $query);

    // Verificar si la inserción fue exitosa
    if($result) {
        // Redireccionar a generate_invoice.php con el ID de la nueva factura
        header("Location: generate_invoice.php?factura_id=$factura_id");
        exit();
    } else {
        // Si hay un error en la inserción, mostrar mensaje de error
        echo "Error al crear nueva factura: " . mysqli_error($conn);
    }
} else {
    // Si no se recibió el ID del cliente o el ID de la factura, redireccionar a la página anterior
    header("Location: index.php");
    exit();
}
?>
