<?php
include("db.php");
include("includes/header.php");


// Obtener los ID ingresados de mascotas, productos y vacunas
$mascota_ids = isset($_POST['mascota_ids']) ? $_POST['mascota_ids'] : [];
$producto_ids = isset($_POST['producto_ids']) ? $_POST['producto_ids'] : [];
$vacuna_ids = isset($_POST['vacuna_ids']) ? $_POST['vacuna_ids'] : [];

// Función para calcular el precio de un producto o mascota por su ID
function calcularPrecio($tipo, $id) {
    global $conn;
    $query = "";
    if ($tipo === "mascota") {
        $query = "SELECT Precio FROM mascotas WHERE ID = $id";
    } elseif ($tipo === "producto") {
        $query = "SELECT Valor FROM productos WHERE ID = $id";
    } elseif ($tipo === "vacuna") {
        $query = "SELECT Dosis_Por_Peso FROM vacunas WHERE ID = $id";
    }

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row ? $row['Precio'] : 0;
}

// Calcular el total
$total = 0;
foreach ($mascota_ids as $id) {
    $total += calcularPrecio("mascota", $id);
}
foreach ($producto_ids as $id) {
    $total += calcularPrecio("producto", $id);
}
foreach ($vacuna_ids as $id) {
    $total += calcularPrecio("vacuna", $id);
}

// Mostrar el total
echo "<h2>Total de la compra: $total</h2>";
?>



<form action="total_compra.php" method="POST">
    <div class="form-group">
        <label for="factura_id">ID Factura</label>
        <input type="text" name="factura_id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" name="total" class="form-control" required>
    </div>
    <input type="submit" name="actualizar_total" class="btn btn-primary" value="Actualizar Total">
</form>

<?php
// Actualizar la tabla factura precio_total con el total de la compra
if(isset($_POST['factura_id'])) {
    $factura_id = $_POST['factura_id'];
    $total = $_POST['total'];

    $query = "UPDATE factura SET Precio_Total = '$total' WHERE ID = '$factura_id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "Precio total actualizado correctamente";
    } else {
        echo "Error al actualizar el precio total";
    }
}

?>



<!-- Volver a generate_invoice.php -->
<div class="container p-4">
    <form action="generate_invoice.php" method="POST">
        <button type="submit" class="btn btn-primary btn-block">Volver</button>
    </form>
</div>


<?php include("includes/footer.php"); ?>

