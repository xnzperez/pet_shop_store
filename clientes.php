<!-- Client Section -->
<div class="row">
    <div class="col-md-8">
        <h2>Clientes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM clientes";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['cedula']; ?></td>
                        <td><?php echo $row['nombres']; ?></td>
                        <td><?php echo $row['apellidos']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td>
                            <a href="edit_client.php?cedula=<?php echo $row['cedula']; ?>" class="btn btn-warning">Modificar</a>
                            <a href="delete_client.php?cedula=<?php echo $row['cedula']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Add Client Section -->
    <div class="col-md-4">
        <h2>Agregar Cliente</h2>
        <div class="card card-body">
            <form action="save_client.php" method="POST">
                <div class="form-group">
                    <input type="text" name="cedula" class="form-control" placeholder="Cedula" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="nombres" class="form-control" placeholder="Nombres">
                </div>
                <div class="form-group">
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos">
                </div>
                <div class="form-group">
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                </div>
                <div class="form-group">
                    <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_client" value="Guardar Cliente">
            </form>
        </div>
    </div>
</div>
