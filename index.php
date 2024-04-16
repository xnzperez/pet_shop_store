<?php include("includes/header.php"); ?>

<div class="container p-4">
    <!-- Formulario para registrar clientes -->
    <!-- Agregar Cliente Section -->
    <div class="col-md-4">
    <h2>Registrar Cliente</h2>
    <div class="card card-body">
        <form action="save_client.php" method="POST">
            <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="Cédula">
            </div>
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" name="apellido" class="form-control" placeholder="Apellido">
            </div>
            <div class="form-group">
                <input type="text" name="direccion" class="form-control" placeholder="Dirección">
            </div>
            <div class="form-group">
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad">
            </div>
            <div class="form-group">
                <input type="text" name="departamento" class="form-control" placeholder="Departamento">
            </div>
            <div class="form-group">
                <input type="text" name="celular" class="form-control" placeholder="Celular">
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_client" value="Guardar Cliente">
        </form>
    </div>
</div>

<!-- Formulario para registrar mascotas -->
<div class="col-md-4">
    <h2>Registrar Mascota</h2>
    <div class="card card-body">
        <form action="save_pet.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="ID de la Mascota">
            </div>
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" name="raza" class="form-control" placeholder="Raza">
            </div>
            <div class="form-group">
                <input type="text" name="tipo" class="form-control" placeholder="Tipo de Animal">
            </div>
            <div class="form-group">
                <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento">
            </div>
            <div class="form-group">
                <input type="file" name="foto" class="form-control-file">
            </div>
            <div class="form-group">
                <input type="text" name="precio" class="form-control" placeholder="Precio">
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_pet" value="Guardar Mascota">
        </form>
    </div>
</div>



    <!-- Formulario para registrar productos -->
    <div class="col-md-4">
    <h2>Registrar Producto</h2>
    <div class="card card-body">
        <form action="save_product.php" method="POST">
            <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="ID del Producto">
            </div>
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto">
            </div>
            <div class="form-group">
                <input type="text" name="proveedor" class="form-control" placeholder="Proveedor">
            </div>
            <div class="form-group">
                <textarea name="descripcion" class="form-control" placeholder="Descripción del Producto"></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="valor" class="form-control" placeholder="Valor del Producto">
            </div>
            <div class="form-group">
                <input type="text" name="presentacion" class="form-control" placeholder="Presentación">
            </div>
            <div class="form-group">
                <input type="text" name="unidad_medida" class="form-control" placeholder="Unidad de Medida">
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_product" value="Guardar Producto">
        </form>
    </div>
</div>


<!-- Formulario para registrar vacunas -->
<div class="col-md-4">
    <h2>Registrar Vacuna</h2>
    <div class="card card-body">
        <form action="save_vaccine.php" method="POST">
            <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="ID de la Vacuna">
            </div>
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre de la Vacuna">
            </div>
            <div class="form-group">
                <input type="text" name="laboratorio" class="form-control" placeholder="Laboratorio">
            </div>
            <div class="form-group">
                <textarea name="descripcion" class="form-control" placeholder="Descripción de la Vacuna"></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="dosis" class="form-control" placeholder="Dosis por Peso">
            </div>
            <div class="form-group">
                <input type="text" name="stock" class="form-control" placeholder="Stock">
            </div>
            <div class="form-group">
                <input type="date" name="vencimiento" class="form-control" placeholder="Fecha de Vencimiento">
                <small class="form-text text-muted">Fecha de Vencimiento (dd/mm/aaaa)</small>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_vaccine" value="Guardar Vacuna">
        </form>
    </div>
</div>


<!-- Sección para vacunar mascota de acuerdo a la tabla mascota_vacuna que tiene: mascota_id, vacuna_id --> 
<div class="col-md-4">
    <h2>Vacunar Mascota</h2>
    <div class="card card-body">
        <form action="save_pet_vaccine.php" method="POST">
            <div class="form-group">
                <input type="text" name="id_mascota" class="form-control" placeholder="ID de la Mascota">
            </div>
            <div class="form-group">
                <input type="text" name="vacuna_id" class="form-control" placeholder="ID de la Vacuna">
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_pet_vaccine" value="Vacunar Mascota">
        </form>
    </div>
</div>

<div class="container p-4">
    <!-- Sección para generar facturas -->
    <div class="col-md-4">
        <h2>Trámite Factura</h2>
        <div class="card card-body">
            <form action="new_factura.php" method="POST">
                <div class="form-group">
                    <input type="text" name="cliente_id" class="form-control" placeholder="ID Cliente">
                </div>
                <!-- Casilla para ingresar Factura ID -->
                <div class="form-group">
                    <input type="text" name="factura_id" class="form-control" placeholder="Factura ID">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="crear_tramite">Crear Trámite</button>
            </form>
        </div>
    </div>
</div>


    <!-- Sección para ver consultas disponibles -->
    <div class="col-md-4">
        <h2>Consultas</h2>
        <div class="card card-body">
            <a href="consulta.php" class="btn btn-primary btn-block">Ver Consultas</a>
        </div>
    </div>
</div>

<!-- Mostrar las ventas de mes: mascota, producto, vacuna --> 
<div class="col-md-4">
    <h2>Ventas del Mes</h2>
    <div class="card card-body">
        <a href="sales.php" class="btn btn-primary btn-block">Ver Ventas</a>
    </div>
</div>


<!-- Sección para mostrar todas las ventas registradas -->

<!-- Gráficos de Ventas Sección -->
<div class="col-md-4">
    <h2>Gráficos de Ventas</h2>
    <div class="card card-body">
        <a href="Chart.php" class="btn btn-primary btn-block">Ver Gráfico</a>
    </div>
</div>

<!-- Sección para actualizar mascotas, productos, vacunas -->
<div class="col-md-4">
    <h2>Actualizar Datos</h2>
    <div class="card card-body">
        <a href="update.php" class="btn btn-primary btn-block">Actualizar</a>
    </div>
</div>

<!-- Imprimir factura ingresando ID de la tabla factura para obtener el precio -->
<div class="container p-4">
    <!-- Sección para imprimir facturas -->
    <div class="col-md-4">
        <h2>Imprimir Factura</h2>
        <div class="card card-body">
            <form action="print_invoice.php" method="POST">
                <!-- Casilla para ingresar Factura ID -->
                <div class="form-group">
                    <label for="factura_id">ID de la Factura:</label>
                    <input type="text" id="factura_id" name="factura_id" class="form-control" placeholder="Ingrese el ID de la Factura">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="print_invoice">Imprimir Factura</button>
            </form>
        </div>
    </div>
</div>






<?php include("includes/footer.php"); ?>
