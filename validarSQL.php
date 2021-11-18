<?php
// include_once 'conexion.php';
$bd = "prestamos";
$user = 'root';
$password = '';
$dbhost = "localhost"; 
$conexion = mysqli_connect($dbhost, $user, $password, $bd);

$usuario=$_GET['nombre'];
$contrasenia=$_GET['id'];
session_start();

$query = mysqli_query($conexion,"SELECT * FROM empleados WHERE id = '".$contrasenia."' and nombre = '".$usuario."' ");
$nr = mysqli_num_rows($query);

if($nr == 1){
    // header('Location: tablas.php?id='.$contrasenia.'&nombre='.$usuario.' ');
    echo '<form method="POST" action="tablas.php">';
    echo '<input type="text" id="id" value='.$contrasenia.' name="id" readonly hidden>';
    echo '<input type="text" id="nombre" value='.$usuario.' name="nombre" readonly hidden>';
    echo '<input type="submit" id="guardar"  name="guardar" hidden>'; ?>
    <script type="text/javascript"> document.getElementById('guardar').click(); </script>
    
    <?php echo '</form>';
    // echo '<script> document.getElementById("guardar").submit(); // SUBMIT FORM </script>';

}else if ($nr == 0){
    session_destroy();
    echo '<script> alert("El Usuario que ingreso no existe")</script>';
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=index.php'>";
}


