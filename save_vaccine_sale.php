<?php
// Verificar si se recibieron los datos del formulario
if (isset($_POST['submit'])) {
    // Incluir el archivo de conexión a la base de datos
    include("db.php");

    // Incluir el archivo de encabezado
    include("includes/header.php");

    // Recuperar los datos del formulario
    $vacuna_id = $_POST['vacuna_id'];
    $cliente_id = $_POST['cliente_id'];
    $fecha_venta = $_POST['fecha_venta'];
    $precio = $_POST['precio'];

    // Consulta para insertar la venta de la vacuna en la tabla vacuna_vendida
    $query = "INSERT INTO vacuna_vendida (Vacuna_ID, Cliente_ID, fecha_venta, precio) VALUES ('$vacuna_id', '$cliente_id', '$fecha_venta', '$precio')";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $query);

    // Verificar si la consulta se ejecutó correctamente
    if ($result) {
        // Actualizar el estado de la vacuna a vendida en la tabla vacunas
        $update_query = "UPDATE vacunas SET vendida = 'si' WHERE ID = '$vacuna_id'";
        $update_result = mysqli_query($conn, $update_query);
        
        // Actualizar Stock de vacunas
        $update_stock_query = "UPDATE vacunas SET stock = stock - 1 WHERE ID = '$vacuna_id'";
        $update_stock_result = mysqli_query($conn, $update_stock_query);
        
        if ($update_result) {
            // Redireccionar a una página de éxito
            header("Location: success.php");
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al actualizar el estado de la vacuna</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al realizar la venta de la vacuna</div>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>

<?php include("includes/footer.php"); ?>
