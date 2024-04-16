<?php
include("db.php");

if (isset($_POST['save_vaccine'])) {
    $id = $_POST['id']; // Aquí recibimos el ID ingresado manualmente desde el formulario
    $nombre = $_POST['nombre'];
    $laboratorio = $_POST['laboratorio'];
    $descripcion = $_POST['descripcion'];
    $dosis = $_POST['dosis'];
    $stock = $_POST['stock'];
    $vencimiento = $_POST['vencimiento'];

    $query = "INSERT INTO Vacunas (ID, Nombre, Laboratorio, Descripcion, Dosis_Por_Peso, Stock, Vencimiento) 
            VALUES ('$id', '$nombre', '$laboratorio', '$descripcion', '$dosis', '$stock', '$vencimiento')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar la vacuna: " . mysqli_error($conn);
    }
}
?>
