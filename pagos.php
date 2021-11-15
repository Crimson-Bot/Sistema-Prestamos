<?php
include_once 'conexion.php';

$idUsuario = $_GET['idPago'];
$nombreUsuario = $_GET['nombrePago'];
$abonoPago = $_GET['abonoPago'];

$consulta_insert = $con->prepare('INSERT INTO pagos(id,nombre,abono) VALUES(:id,:nombre,:abono)');
        $consulta_insert->execute(array(
            ':id' => $idUsuario,
            ':nombre' => $nombreUsuario,
            ':abono' => $abonoPago,
        ));
        header('Location: tablas.php');

// Leer el archivo que se guardo pagos.
// Crear un nuevo archivo llamado que es un conjunto de pagos y de prestamos "reporte"
// En este archivo se guardaran el
// id, nombre, cantidad a pagar, cantidad restante, quincenas totales, quincenas restantes.
// cantidad restante se calculara restando el abono al pago total, el pago total se encuentra en el archivo prestamos, se abriran estos 2 archivos.
// quincenas restantes se calculara restando 1 a las quincenas totales del archivo prestamo (dependiendo del numeor de veces que se repita el id es el numero de quicenas que se va restar)
