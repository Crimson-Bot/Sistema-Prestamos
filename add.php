<?php 
include_once 'conexion.php';

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $sexo = $_POST['sexo'];
    $foto = $_POST['foto'];
    $salario = $_POST['salario'];

    if (!empty($nombre) && !empty($tipo) && !empty($sexo) && !empty($foto) && !empty($salario)) {

        
        $consulta_insert = $con->prepare('INSERT INTO empleados(nombre,tipo,sexo,foto,salario) VALUES(:nombre,:tipo,:sexo,:foto,:salario)');
        $consulta_insert->execute(array(
            ':nombre' => $nombre,
            ':tipo' => $tipo,
            ':sexo' => $sexo,
            ':foto' => $foto,
            ':salario' => $salario,
        ));
        echo '<script> alert("Usuario agregado")</script>';
        // header('Location: agregarEmpleado.php');
        echo '<form method="POST" action="agregarEmpleado.php">';
        echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
        echo '<input type="submit" id="save" name="save" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('save').click(); </script>
        <?php echo '</form>';

    } else {
        echo '<script> alert("Los campos estan vacios")</script>';
        echo '<form method="POST" action="agregarEmpleado.php">';
        echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
        echo '<input type="submit" id="save" name="save" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('save').click(); </script>
        <?php echo '</form>';
    }
}