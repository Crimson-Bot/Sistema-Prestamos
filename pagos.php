<?php
$idUsuario = $_GET['idPago'];
$nombreUsuario = $_GET['nombrePago'];
$abonoPago = $_GET['abonoPago'];

$ruta = "pagos.txt";
// Escribir en el archivo
$fileSave = fopen("pagos.txt", "a");
// Capturamos en el archivo
fputs($fileSave, $idUsuario . "\n");
fputs($fileSave, $nombreUsuario . "\n");
fputs($fileSave, $abonoPago . "\n");
fclose($fileSave);
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php?id=" . $idUsuario . "'>";

// Leer el archivo que se guardo pagos.
// Crear un nuevo archivo llamado que es un conjunto de pagos y de prestamos "reporte"
// En este archivo se guardaran el
// id, nombre, cantidad a pagar, cantidad restante, quincenas totales, quincenas restantes.
// cantidad restante se calculara restando el abono al pago total, el pago total se encuentra en el archivo prestamos, se abriran estos 2 archivos.
// quincenas restantes se calculara restando 1 a las quincenas totales del archivo prestamo (dependiendo del numeor de veces que se repita el id es el numero de quicenas que se va restar)
