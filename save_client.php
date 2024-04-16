<?php
include("db.php");

if (isset($_POST['save_client'])) {
    $id = $_POST['id']; // Aquí recibimos el ID ingresado manualmente desde el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $departamento = $_POST['departamento'];
    $celular = $_POST['celular'];

    $query = "INSERT INTO Clientes (ID, Nombre, Apellido, Direccion, Ciudad, Departamento, Celular) 
            VALUES ('$id', '$nombre', '$apellido', '$direccion', '$ciudad', '$departamento', '$celular')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar el cliente: " . mysqli_error($conn);
    }
}
?>
