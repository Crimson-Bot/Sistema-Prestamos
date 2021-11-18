<?php

include_once 'conexion.php';
// --------------------------------------------------------------------------------------------------------------
    $id = $_POST['idPrestamo'];
    $nombre = $_POST['nombrePrestamo'];
    $cantidadPrestamo = $_POST['cantidadPrestamo'];
    $plazo = $_POST['plazo'];
    date_default_timezone_set('America/Mexico_City');
    // $dateAndTime = date("n");
    $dateAndTime = date('Y-m-d H:i:s');
    $sentencia_select=$con->prepare('SELECT * FROM empleados WHERE id = '.$id.' ');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    foreach($resultado as $fila):
        $sueldo = $fila['salario'];
    endforeach;
    $sueldo = $sueldo * 3;

    $bd = "prestamos";
    $user = 'root';
    $password = '';
    $dbhost = "localhost"; 
    $conexion = mysqli_connect($dbhost, $user, $password, $bd);

    $query = mysqli_query($conexion,"SELECT * FROM prestamos WHERE id = '".$id."'  ");
    $nr = mysqli_num_rows($query);

    if($nr == 1){
        echo '<script> alert("Petición rechaza... usted ya tiene un prestamo pendiente!!!")</script>';
            echo '<form method="POST" action="tablas.php">';
            echo '<input type="text" id="id" value='.$id.' name="id" readonly hidden>';
            echo '<input type="text" id="nombre" value='.$nombre.' name="nombre" readonly hidden>';
            echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
            <script type="text/javascript"> document.getElementById('guardar').click(); </script>
            <?php echo '</form>';
    }else if ($nr == 0){
        if($cantidadPrestamo > 0){
            if($plazo > 0){
                if($cantidadPrestamo < $sueldo){
                    $consulta_insert = $con->prepare('INSERT INTO prestamos(id,nombre,cantidad,plazo,fecha) VALUES(:id,:nombre,:cantidad,:plazo,:fecha)');
                    $consulta_insert->execute(array(
                        ':id' => $id,
                        ':nombre' => $nombre,
                        ':cantidad' => $cantidadPrestamo,
                        ':plazo' => $plazo,
                        ':fecha' => $dateAndTime,
                    ));
                    echo '<script> alert("Petición recibida... Prestamo aceptado")</script>';
                    echo '<form method="POST" action="tablas.php">';
                    echo '<input type="text" id="id" value='.$id.' name="id" readonly hidden>';
                    echo '<input type="text" id="nombre" value='.$nombre.' name="nombre" readonly hidden>';
                    echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
                    <script type="text/javascript"> document.getElementById('guardar').click(); </script>
                    <?php echo '</form>';
                } else {
                    echo '<script> alert("El prestamo no puede exceder 3 meses de sueldo")</script>';
                    echo '<form method="POST" action="tablas.php">';
                    echo '<input type="text" id="id" value='.$id.' name="id" readonly hidden>';
                    echo '<input type="text" id="nombre" value='.$nombre.' name="nombre" readonly hidden>';
                    echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
                    <script type="text/javascript"> document.getElementById('guardar').click(); </script>
                    <?php echo '</form>';
                }
            }else{
                echo '<script> alert("Por favor seleccione un plazo!!!")</script>';
                echo '<form method="POST" action="tablas.php">';
                echo '<input type="text" id="id" value='.$id.' name="id" readonly hidden>';
                echo '<input type="text" id="nombre" value='.$nombre.' name="nombre" readonly hidden>';
                echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
                <script type="text/javascript"> document.getElementById('guardar').click(); </script>
                <?php echo '</form>';
            }
        }else{
            echo '<script> alert("Por favor digite una cantidad de prestamo valida!!!")</script>';
            echo '<form method="POST" action="tablas.php">';
            echo '<input type="text" id="id" value='.$id.' name="id" readonly hidden>';
            echo '<input type="text" id="nombre" value='.$nombre.' name="nombre" readonly hidden>';
            echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
            <script type="text/javascript"> document.getElementById('guardar').click(); </script>
            <?php echo '</form>';
        }
    }

?>