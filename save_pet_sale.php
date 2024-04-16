<?php
// Verificar si se ha enviado el formulario para vender una mascota
if (isset($_POST['save_pet_sale'])) {
    // Incluir archivo de conexión a la base de datos
    include("db.php");

    // Obtener datos del formulario
    $id_mascota = $_POST['id_mascota'];
    $cliente_id = $_POST['cliente_id'];
    $fecha_venta = $_POST['fecha_venta'];
    $precio = $_POST['precio'];

    // Insertar datos en la tabla mascota_vendida
    $query = "INSERT INTO mascota_vendida (Mascota_ID, Cliente_ID, Fecha_Venta, Precio) VALUES ('$id_mascota', '$cliente_id', '$fecha_venta', '$precio')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redireccionar a la página principal con un mensaje de éxito
        header("Location: index.php?success=1");
        exit();
    } else {
        // Mostrar mensaje de error si la inserción falla
        echo "Error al vender la mascota: " . mysqli_error($conn);
    }
}

// Actualizar la tabla mascotas owner "si"
$query = "UPDATE mascotas SET owner = 'si' WHERE ID = '$id_mascota'";
?>

<!-- Volver a la página principal -->
<div class="container p-4">
    <a href="index.php" class="btn btn-primary">Volver a la página principal</a>
</div>
