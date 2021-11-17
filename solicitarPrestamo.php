<?php
// $id = $_GET['idPrestamo'];
// $nombre = $_GET['nombrePrestamo'];
// $cantidadPrestamo = $_GET['cantidadPrestamo'];
// $plazo = $_GET['plazo'];
// date_default_timezone_set('America/Mexico_City');
// $dateAndTime = date("n");

include_once 'conexion.php';
// --------------------------------------------------------------------------------------------------------------
    $id = $_POST['idPrestamo'];
    $nombre = $_POST['nombrePrestamo'];
    $cantidadPrestamo = $_POST['cantidadPrestamo'];
    $plazo = $_POST['plazo'];
    date_default_timezone_set('America/Mexico_City');
    $dateAndTime = date("n");
    $sentencia_select=$con->prepare('SELECT * FROM empleados WHERE id = '.$id.' ');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    foreach($resultado as $fila):
        $sueldo = $fila['salario'];
    endforeach;
    $sueldo = $sueldo * 3;

    if($cantidadPrestamo < $sueldo){
        $consulta_insert = $con->prepare('INSERT INTO prestamos(id,nombre,cantidad,plazo,fecha) VALUES(:id,:nombre,:cantidad,:plazo,:fecha)');
        $consulta_insert->execute(array(
            ':id' => $id,
            ':nombre' => $nombre,
            ':cantidad' => $cantidadPrestamo,
            ':plazo' => $plazo,
            ':fecha' => $dateAndTime,
        ));
        // header('Location: tablas.php?id='.$id.'&nombre='.$nombre.' ');
        echo '<form method="POST" action="tablas.php">';
        echo '<input type="text" id="id" value='.$id.' name="id" readonly hidden>';
        echo '<input type="text" id="nombre" value='.$nombre.' name="nombre" readonly hidden>';
        echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('guardar').click(); </script>
        <?php echo '</form>';
    } else {
        echo '<script> alert("El prestamo no puede exceder 3 meses de sueldo")</script>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=index.php'>";
    }
    
    // $consulta_insert = $con->prepare('INSERT INTO prestamos(id,nombre,cantidad,plazo,fecha) VALUES(:id,:nombre,:cantidad,:plazo,:fecha)');
    //     $consulta_insert->execute(array(
    //         ':id' => $id,
    //         ':nombre' => $nombre,
    //         ':cantidad' => $cantidadPrestamo,
    //         ':plazo' => $plazo,
    //         ':fecha' => $dateAndTime,
    //     ));
    //     header('Location: tablas.php');


?>