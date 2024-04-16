<?php
require('fpdf/fpdf.php');

// Obtener el ID de factura
$factura_id = $_POST['factura_id'];

// Conectar a la base de datos
include("db.php");

// Consulta para obtener el precio total y el ID del cliente
$query = "SELECT factura.Precio_Total, factura.fecha_venta, clientes.Nombre, clientes.Direccion, clientes.Celular, clientes.Ciudad, clientes.Departamento FROM factura
        INNER JOIN clientes ON factura.Cliente = clientes.ID
        WHERE factura.ID = $factura_id";
$result = mysqli_query($conn, $query);

if ($result) {
    // Obtener los datos de la consulta
    $row = mysqli_fetch_assoc($result);
    
    // Asignar los valores a variables
    $precio_total = $row['Precio_Total'];
    $fecha_venta = $row['fecha_venta'];
    $nombre_cliente = $row['Nombre'];
    $direccion_cliente = $row['Direccion'];
    $celular_cliente = $row['Celular'];
    $ciudad_cliente = $row['Ciudad'];
    $departamento_cliente = $row['Departamento'];

    // Crear instancia de FPDF
    $pdf = new FPDF();

    // Agregar una página
    $pdf->AddPage();

    // Agregar logo
    $pdf->Image('logo_php.png', 10, 10, 40);

    // Salto de línea
    $pdf->Ln(10);

    // Configurar fuente y tamaño del texto para el título
    $pdf->SetFont('Arial', 'B', 20);

    // Título
    $pdf->Cell(0, 10, 'Factura Pet Shop Store', 0, 1, 'C');

    // Salto de línea
    $pdf->Ln(10);

    // Configurar fuente y tamaño del texto para el contenido
    $pdf->SetFont('Arial', '', 12);

    // salto de línea
    $pdf->Ln(10);

    // salto de línea
    $pdf->Ln(10);

    // Línea divisoria
    $pdf->Cell(0, 0, '', 'T');

    // Salto de línea
    $pdf->Ln(10);


    // ID de factura
    $pdf->Cell(0, 10, 'ID Factura: ' . $factura_id, 0, 1, 'L');

    // Fecha de venta
    $pdf->Cell(0, 10, 'Fecha de Venta: ' . $fecha_venta, 0, 1, 'L');

    // Nombre del cliente
    $pdf->Cell(0, 10, 'Cliente: ' . $nombre_cliente, 0, 1, 'L');

    // Dirección del cliente
    $pdf->Cell(0, 10, 'Dirección: ' . $direccion_cliente, 0, 1, 'L');

    // Celular del cliente
    $pdf->Cell(0, 10, 'Celular: ' . $celular_cliente, 0, 1, 'L');

    // Ciudad del cliente
    $pdf->Cell(0, 10, 'Ciudad: ' . $ciudad_cliente, 0, 1, 'L');

    // Departamento del cliente
    $pdf->Cell(0, 10, 'Departamento: ' . $departamento_cliente, 0, 1, 'L');

    // Línea divisoria
    $pdf->Cell(0, 0, '', 'T');

    // Salto de línea
    $pdf->Ln(10);

    // Precio total
    $pdf->Cell(0, 10, 'Precio Total: $' . $precio_total, 0, 1, 'L');

    // Información del banco
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Banco a Depositar: Nequi', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Numero de Cuenta: 3188548571', 0, 1, 'L');

    // Agregar imagen de código de barras al final del documento
    $pdf->Image('codigo_barras.png', 10, $pdf->GetY() + 10, 80);

    // Nombre del archivo
    $filename = "factura_$factura_id.pdf";

    // Salida del PDF (descarga)
    $pdf->Output("D", $filename);
} else {
    // Mostrar mensaje de error si la consulta falla
    echo "Error al obtener los datos de la factura.";
}
?>
