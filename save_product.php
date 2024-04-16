<?php
include("db.php");

if (isset($_POST['save_product'])) {
    $id = $_POST['id']; // Aquí recibimos el ID ingresado manualmente desde el formulario
    $nombre = $_POST['nombre'];
    $proveedor = $_POST['proveedor'];
    $descripcion = $_POST['descripcion'];
    $valor = $_POST['valor'];
    $presentacion = $_POST['presentacion'];
    $unidad_medida = $_POST['unidad_medida'];

    $query = "INSERT INTO Productos (ID, Nombre_Producto, Proveedor, Descripcion_Producto, Valor, Presentacion, Unidad_Medida) 
            VALUES ('$id', '$nombre', '$proveedor', '$descripcion', '$valor', '$presentacion', '$unidad_medida')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar el producto: " . mysqli_error($conn);
    }
}
?>
