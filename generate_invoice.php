<?php
include("db.php");
include("includes/header.php");

$total = 0;

?>

<div class="container p-4">
    <div class="col-md-4">
        <h2>Seleccionar Compra</h2>
        <div class="card card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="comprar_mascota">Comprar Mascota</label>
                    <input type="checkbox" id="comprar_mascota" name="comprar_mascota" value="1">
                    <input type="number" id="cantidad_mascota" name="cantidad_mascota" class="form-control" placeholder="Cantidad">
                </div>
                <div class="form-group">
                    <label for="comprar_producto">Comprar Producto</label>
                    <input type="checkbox" id="comprar_producto" name="comprar_producto" value="1">
                    <input type="number" id="cantidad_producto" name="cantidad_producto" class="form-control" placeholder="Cantidad">
                </div>
                <div class="form-group">
                    <label for="comprar_vacuna">Comprar Vacuna</label>
                    <input type="checkbox" id="comprar_vacuna" name="comprar_vacuna" value="1">
                    <input type="number" id="cantidad_vacuna" name="cantidad_vacuna" class="form-control" placeholder="Cantidad">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="comprar">Comprar</button>
                <button type="button" class="btn btn-danger btn-block" onclick="limpiarFormulario()">Limpiar</button>
                <script>
                    function limpiarFormulario() {
                        document.getElementById("comprar_mascota").checked = false;
                        document.getElementById("comprar_producto").checked = false;
                        document.getElementById("comprar_vacuna").checked = false;
                        document.getElementById("cantidad_mascota").value = "";
                        document.getElementById("cantidad_producto").value = "";
                        document.getElementById("cantidad_vacuna").value = "";
                        document.getElementById("elementos_comprar").innerHTML = "";
                    }
                </script>
            </form>
        </div>
    </div>
</div>

<div class="col-md-8">
    <?php
    if (isset($_POST['comprar'])) {
        echo "<div id='elementos_comprar'>";
        echo "<h2>Elementos a comprar:</h2>";
        echo "<ul>";

        // Array para almacenar los precios de venta
        $precios_venta = array();

        // Comprar mascotas
        if(isset($_POST['comprar_mascota'])) {
            $cantidad_mascota = intval($_POST['cantidad_mascota']);
            echo "<li>Mascotas: $cantidad_mascota</li>";
            for ($i = 0; $i < $cantidad_mascota; $i++) {
                echo "<div class='form-group'>";
                echo "<label>ID Mascota:</label>";
                echo "<input type='text' class='form-control' name='mascota_id_$i' placeholder='ID de Mascota'>";
                // Campo para ingresar el precio de venta
                echo "<label>Precio Venta:</label>";
                echo "<input type='text' class='form-control' name='mascota_precio_$i' placeholder='Precio de Venta'>";
                echo "</div>";
                // Agregar el precio de venta al array
                array_push($precios_venta, $_POST["mascota_precio_$i"]);
            }
        }
        if(isset($_POST['comprar_producto'])) {
            $cantidad_producto = intval($_POST['cantidad_producto']);
            echo "<li>Productos: $cantidad_producto</li>";
            for ($i = 0; $i < $cantidad_producto; $i++) {
                echo "<div class='form-group'>";
                echo "<label>ID Producto:</label>";
                echo "<input type='text' class='form-control' name='producto_id_$i' placeholder='ID de Producto'>";
                // Campo para ingresar el precio de venta
                echo "<label>Precio Venta:</label>";
                echo "<input type='text' class='form-control' name='producto_precio_$i' placeholder='Precio de Venta'>";
                echo "</div>";
                // Agregar el precio de venta al array
                array_push($precios_venta, $_POST["producto_precio_$i"]);
            }
        }
        if(isset($_POST['comprar_vacuna'])) {
            $cantidad_vacuna = intval($_POST['cantidad_vacuna']);
            echo "<li>Vacunas: $cantidad_vacuna</li>";
            for ($i = 0; $i < $cantidad_vacuna; $i++) {
                echo "<div class='form-group'>";
                echo "<label>ID Vacuna:</label>";
                echo "<input type='text' class='form-control' name='vacuna_id_$i' placeholder='ID de Vacuna'>";
                // Campo para ingresar el precio de venta
                echo "<label>Precio Venta:</label>";
                echo "<input type='text' class='form-control' name='vacuna_precio_$i' placeholder='Precio de Venta'>";
                echo "</div>";
                // Agregar el precio de venta al array
                array_push($precios_venta, $_POST["vacuna_precio_$i"]);
            }
        }
        echo "</ul>";

        // Calcular la suma de los precios de venta
        $total_venta = array_sum($precios_venta);
        echo "<p>Total Venta: $total_venta</p>";

        echo "</div>";
    }
    ?>
</div>



<div class="container p-4">
    <form action="total_compra.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <button type="submit" class="btn btn-primary btn-block">Carrito de Compra</button>
    </form>
</div>

<div class="container p-4">
    <a href="index.php" class="btn btn-primary btn-block">Regresar</a>
</div>

<?php include("includes/footer.php"); ?>


