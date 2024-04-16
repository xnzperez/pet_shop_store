<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4">
    <!-- Sección para realizar consultas -->
    <div class="col-md-4">
        <h2>Realizar Consulta</h2>
        <div class="card card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <select name="consulta" class="form-control">
                        <!-- Opciones de consulta -->
                        <option value="listar_mascotas_disponibles">Listar Mascotas Disponibles</option>
                        <option value="listar_mascotas_vendidas">Listar Mascotas Vendidas por Cliente</option>
                        <option value="listar_mascotas_vacunadas">Listar Mascotas Vacunadas</option>
                        <option value="listar_mascotas_por_vacunar_mes">Listar Mascotas por Vacunar en el Mes</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block" name="consultar">Consultar</button>
            </form>
        </div>
    </div>

    <?php
    // Verificar si se envió el formulario de consulta
    if (isset($_POST['consultar'])) {
        $consulta = $_POST['consulta'];

        // Realizar consultas según la opción seleccionada
            switch ($consulta) {
                case 'listar_mascotas_disponibles':
                // Consulta para seleccionar las mascotas que no tienen un dueño y su Precio
                $query = "SELECT * FROM mascotas WHERE owner = 'no'";
                
        
                $result = mysqli_query($conn, $query);
        
            if (!$result) {
                echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta: " . mysqli_error($conn) . "</div>";
        } else {
            // Mostrar los resultados Nombre, Raza, Precio, Tipo_Animal
            echo "<div class='alert alert-success' role='alert'><h2>Mascotas Disponibles</h2>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>{$row['Nombre']} - Raza: {$row['Raza']} - Precio: {$row['Precio']} - Tipo: {$row['Tipo_Animal']}</li>";
            }
            echo "</ul></div>";
        }
                        break;


            
            

                case 'listar_mascotas_vendidas':
                    $query = "SELECT clientes.ID as Cliente_ID, clientes.Nombre as Nombre_Cliente, clientes.Apellido as Apellido_Cliente,
                    GROUP_CONCAT(mascotas.Nombre SEPARATOR ', ') as Mascotas_Vendidas
                    FROM mascota_vendida
                    INNER JOIN mascotas ON mascotas.ID = mascota_vendida.Mascota_ID
                    INNER JOIN clientes ON clientes.ID = mascota_vendida.Cliente_ID
                    GROUP BY clientes.ID";
        
                $result = mysqli_query($conn, $query);
        
                if (!$result) {
                    echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta: " . mysqli_error($conn) . "</div>";
            } else {
                // Mostrar los resultados
                echo "<div class='alert alert-success' role='alert'><h2>Mascotas Vendidas por Cliente, nombre, apellido, precio</h2>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>{$row['Nombre_Cliente']} {$row['Apellido_Cliente']} - Mascotas Vendidas: {$row['Mascotas_Vendidas']}</p>";
                }
                echo "</div>";
            }
                        break;
        
        

                    case 'listar_mascotas_vacunadas':
                        $query = "SELECT m.Nombre AS nombre_mascota, v.Nombre AS nombre_vacuna
                                FROM mascota_vacuna mv
                                INNER JOIN mascotas m ON mv.Mascota_ID = m.ID
                                INNER JOIN vacunas v ON mv.Vacuna_ID = v.ID";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta: " . mysqli_error($conn) . "</div>";
                        } else {
                            // Mostrar los resultados
                            echo "<div class='alert alert-success' role='alert'><h2>Mascotas Vacunadas</h2>";
                            echo "<ul>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>Mascota: {$row['nombre_mascota']} - Vacuna: {$row['nombre_vacuna']}</li>";
                            }
                            echo "</ul></div>";
                        }
                        break;
                    

                        case 'listar_mascotas_por_vacunar_mes':
                            // Construir la consulta SQL
$query = "SELECT * FROM mascotas WHERE vacuna = 'no'";

// Ejecutar la consulta SQL
$result = mysqli_query($conn, $query);

// Verificar si la consulta se ejecutó correctamente
if (!$result) {
    echo "<div class='alert alert-warning' role='alert'>Consulta no válida</div>";
} else {
    // Procesar los resultados de la consulta
    if (mysqli_num_rows($result) > 0) {
        // Mostrar las mascotas por vacunar
        echo "<div class='alert alert-success' role='alert'><h2>Mascotas por Vacunar</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['Nombre']} - Fecha de Nacimiento: {$row['Fecha_Nacimiento']}</li>";
        }
        echo "</ul></div>";
    } else {
        echo "<div class='alert alert-info' role='alert'>No hay mascotas por vacunar</div>";
    }
}


                

    


                            break;

                            
                            
            default:
                echo "<div class='alert alert-warning' role='alert'>Consulta no válida</div>";
        }
    }
    ?>
</div>

<!-- Volver al inicio -->
<div class="container p-4">
    <a href="index.php" class="btn btn-primary">Volver al Inicio</a>
</div>



<?php include("includes/footer.php"); ?>

