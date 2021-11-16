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
    header('Location: tablas.php?id='.$contrasenia.'&nombre='.$usuario.' ');
}else if ($nr == 0){
    session_destroy();
    echo '<script> alert("El Usuario que ingreso no existe")</script>';
    // header('Location: index.php');
    // header('Location: tablas.php?id='.$pass.'&nombre='.$user.' ');
}