<?php
include("db.php");

if (isset($_POST['save_pet'])) {
    $id = $_POST['id']; 
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $tipo = $_POST['tipo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $precio = $_POST['precio']; // Nuevo campo para el precio
    
    // Manejo de la subida de la foto
    $foto = ''; // Variable para almacenar la ruta de la foto en la base de datos
    if(isset($_FILES['foto'])){
        $file_name = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $foto = 'uploads/' . $file_name; // Ruta donde se guardará la foto en el servidor
        move_uploaded_file($file_tmp, $foto); // Movemos la foto al directorio en el servidor
    }
    
    // Verificar si la clave 'cliente_id' está definida en $_POST
    $cliente_id = isset($_POST['cliente_id']) ? $_POST['cliente_id'] : '';

    $query = "INSERT INTO Mascotas (ID, Nombre, Raza, Tipo_Animal, Fecha_Nacimiento, Foto, Precio) 
            VALUES ('$id', '$nombre', '$raza', '$tipo', '$fecha_nacimiento', '$foto', '$precio')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar la mascota: " . mysqli_error($conn);
    }
}
?>
