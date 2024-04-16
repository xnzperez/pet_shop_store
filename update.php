<?php
include("db.php");
include("includes/header.php");

// Verificar si se ha enviado el formulario para vender una mascota
if (isset($_POST['save_pet_sale'])) {
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
?>

<div class="container p-4">
    <div class="col-md-4">
        <h2>Actualizar Mascota</h2>
        <div class="card card-body">
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label>ID Mascota:</label>
                    <input type="text" class="form-control" name="id_mascota" placeholder="ID de la Mascota">
                </div>
                <div class="form-group">
                    <label>ID Cliente:</label>
                    <input type="text" class="form-control" name="cliente_id" placeholder="ID del Cliente">
                </div>
                <div class="form-group">
                    <label>Fecha de Venta:</label>
                    <input type="date" class="form-control" name="fecha_venta">
                </div> 
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" class="form-control" name="precio" placeholder="Precio">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="save_pet_sale">Actualizar Mascota</button>
            </form>
        </div>
    </div>
</div>

<div class="container p-4">
    <div class="col-md-4">
        <h2>Actualizar Vacuna</h2>
        <div class="card card-body">
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label>ID Vacuna:</label>
                    <input type="text" class="form-control" name="id_vacuna" placeholder="ID de la Vacuna">
                </div>
                <div class="form-group">
                    <label>ID Cliente:</label>
                    <input type="text" class="form-control" name="cliente_id" placeholder="ID del Cliente">
                </div>
                <div class="form-group">
                    <label>Fecha de Venta:</label>
                    <input type="date" class="form-control" name="fecha_venta">
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" class="form-control" name="precio" placeholder="Precio">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="save_vaccine_sale">Actualizar Vacuna</button>
            </form>
        </div>
    </div>
</div>


<!-- Volver a la página principal -->
<div class="container p-4">
    <a href="index.php" class="btn btn-primary">Volver a la página principal</a>
</div>

<?php include("includes/footer.php"); ?>
