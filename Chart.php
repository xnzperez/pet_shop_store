<?php include "includes/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h1>Mascotas más vendidas </h1>

    <!-- Contenedor para la gráfica de mascotas más vendidas por tipo de animal -->
    <div style="width: 50%;">
        <canvas id="mascotas-chart"></canvas>
    </div>

    <?php
    // Incluir archivo de conexión a la base de datos
    include("db.php");

    // Consulta para obtener las mascotas más vendidas por tipo de animal
    $query_mascotas = "SELECT Tipo_Animal, COUNT(*) as total_ventas FROM mascotas GROUP BY Tipo_Animal ORDER BY total_ventas DESC";
    $result_mascotas = mysqli_query($conn, $query_mascotas);
    ?>

    <script>
        // Datos para la gráfica de mascotas más vendidas por tipo de animal
        var mascotasData = {
            labels: [<?php while ($row = mysqli_fetch_assoc($result_mascotas)) { echo '"' . $row['Tipo_Animal'] . '",'; } ?>],
            datasets: [{
                label: 'Número de Ventas',
                data: [<?php mysqli_data_seek($result_mascotas, 0); while ($row = mysqli_fetch_assoc($result_mascotas)) { echo $row['total_ventas'] . ','; } ?>],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Configuración de la gráfica de mascotas más vendidas por tipo de animal
        var mascotasConfig = {
            type: 'bar',
            data: mascotasData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        };

        // Dibujar la gráfica de mascotas más vendidas por tipo de animal
        var mascotasChart = new Chart(document.getElementById('mascotas-chart'), mascotasConfig);
    </script>

    <h1>Productos más vendidos por Presentación</h1>

    <!-- Contenedor para la gráfica de productos más vendidos por presentación -->
    <div style="width: 50%;">
        <canvas id="productos-chart"></canvas>
    </div>

    <?php
    // Consulta para obtener los productos más vendidos por presentación
    $query_productos = "SELECT Presentacion, COUNT(*) as total_ventas FROM productos GROUP BY Presentacion ORDER BY total_ventas DESC";
    $result_productos = mysqli_query($conn, $query_productos);
    ?>

    <script>
        // Datos para la gráfica de productos más vendidos por presentación
        var productosData = {
            labels: [<?php while ($row = mysqli_fetch_assoc($result_productos)) { echo '"' . $row['Presentacion'] . '",'; } ?>],
            datasets: [{
                label: 'Número de Ventas',
                data: [<?php mysqli_data_seek($result_productos, 0); while ($row = mysqli_fetch_assoc($result_productos)) { echo $row['total_ventas'] . ','; } ?>],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Configuración de la gráfica de productos más vendidos por presentación
        var productosConfig = {
            type: 'bar',
            data: productosData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        };

        // Dibujar la gráfica de productos más vendidos por presentación
        var productosChart = new Chart(document.getElementById('productos-chart'), productosConfig);
    </script>

    <!-- Volver a la página principal -->
    <div class="container p-4">
        <a href="index.php" class="btn btn-primary">Volver a la página principal</a>
    </div>

</body>
</html>

<?php include "includes/footer.php"; ?>
