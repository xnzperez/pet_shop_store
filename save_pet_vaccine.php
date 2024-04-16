<?php
// Verificar si se ha enviado el formulario
if (isset($_POST['save_pet_vaccine'])) {
    // Incluir archivo de conexión a la base de datos
    include("db.php");

    // Obtener datos del formulario
    $id_mascota = $_POST['id_mascota'];
    $vacuna_id = $_POST['vacuna_id'];

    // Insertar datos en la tabla mascota_vacuna
    $query = "INSERT INTO mascota_vacuna (Mascota_ID, Vacuna_ID) VALUES ('$id_mascota', '$vacuna_id')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redireccionar a la página principal con un mensaje de éxito
        header("Location: index.php?success=1");
        exit();
    } else {
        // Mostrar mensaje de error si la inserción falla
        echo "Error al vacunar la mascota: " . mysqli_error($conn);
    }
}
?>
