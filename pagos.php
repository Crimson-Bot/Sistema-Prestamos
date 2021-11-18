<?php
include_once 'conexion.php';

$idUsuario = $_GET['idPago'];
$nombreUsuario = $_GET['nombrePago'];
$abonoPago = $_GET['abonoPago'];

$bd = "prestamos";
$user = 'root';
$password = '';
$dbhost = "localhost"; 
$conexion = mysqli_connect($dbhost, $user, $password, $bd);

$query = mysqli_query($conexion,"SELECT * FROM prestamos WHERE id = '".$idUsuario."'  ");
$nr = mysqli_num_rows($query);

if($nr == 1){
    if($abonoPago <= 0){
        echo '<script> alert("Pago no procesado... por favor digite una cantidad valida!!!")</script>';
        echo '<form method="POST" action="tablas.php">';
        echo '<input type="text" id="id" value='.$idUsuario.' name="id" readonly hidden>';
        echo '<input type="text" id="nombre" value='.$nombreUsuario.' name="nombre" readonly hidden>';
        echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('guardar').click(); </script>
        <?php echo '</form>';
    }else {
        $consulta_insert = $con->prepare('INSERT INTO pagos(id,nombre,abono) VALUES(:id,:nombre,:abono)');
        $consulta_insert->execute(array(
            ':id' => $idUsuario,
            ':nombre' => $nombreUsuario,
            ':abono' => $abonoPago,
        ));
        echo '<script> alert("Pago de $'.$abonoPago.' recibido... GRACIAS!!! ")</script>';
        echo '<form method="POST" action="tablas.php">';
        echo '<input type="text" id="id" value='.$idUsuario.' name="id" readonly hidden>';
        echo '<input type="text" id="nombre" value='.$nombreUsuario.' name="nombre" readonly hidden>';
        echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('guardar').click(); </script>
        <?php echo '</form>';
    }
}else if ($nr == 0){
    echo '<script> alert("Pago no procesado... usted no tiene ningun prestamo pendiente!!!")</script>';
    echo '<form method="POST" action="tablas.php">';
    echo '<input type="text" id="id" value='.$idUsuario.' name="id" readonly hidden>';
    echo '<input type="text" id="nombre" value='.$nombreUsuario.' name="nombre" readonly hidden>';
    echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
    <script type="text/javascript"> document.getElementById('guardar').click(); </script>
    <?php echo '</form>';
}
