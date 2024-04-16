<?php
include("db.php");
include("includes/header.php");

$total = 0;




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

<?php include("includes/footer.php"); ?>

