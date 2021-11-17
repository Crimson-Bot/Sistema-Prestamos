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
        // header('Location: tablas.php?id='.$idUsuario.'&nombre='.$nombreUsuario.' ');
        echo '<form method="POST" action="tablas.php">';
        echo '<input type="text" id="id" value='.$idUsuario.' name="id" readonly hidden>';
        echo '<input type="text" id="nombre" value='.$nombreUsuario.' name="nombre" readonly hidden>';
        echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('guardar').click(); </script>
        
        <?php echo '</form>';
// Leer el archivo que se guardo pagos.
// Crear un nuevo archivo llamado que es un conjunto de pagos y de prestamos "reporte"
// En este archivo se guardaran el
// id, nombre, cantidad a pagar, cantidad restante, quincenas totales, quincenas restantes.
// cantidad restante se calculara restando el abono al pago total, el pago total se encuentra en el archivo prestamos, se abriran estos 2 archivos.
// quincenas restantes se calculara restando 1 a las quincenas totales del archivo prestamo (dependiendo del numeor de veces que se repita el id es el numero de quicenas que se va restar)
