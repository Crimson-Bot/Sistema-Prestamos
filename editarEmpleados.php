<?php
$idEmpleado = $_GET['idEditado'];
$nombreEmpleado = $_GET['nombreEditado'];
$tipoEmpleado = $_GET['tipoEditado'];
$sexoEmpleado = $_GET['sexoEditado'];
$fotoEmpleado = $_GET['fotoEditado'];
$salarioEmpleado = $_GET['salarioEditado'];

$leer = fopen("credenciales.txt", "r");
$escribir = fopen("temp.txt", "a+");
while (!feof($leer)) {
    $id = fgets($leer);
    $nom = fgets($leer);
    $apel = fgets($leer);
    $edad = fgets($leer);
    $puesto = fgets($leer);
    $sexo = fgets($leer);
    if ($idEmpleado != $id) {
        fputs($escribir, $id);
        fputs($escribir, $nom);
        fputs($escribir, $apel);
        fputs($escribir, $edad);
        fputs($escribir, $puesto);
        fputs($escribir, $sexo);
    } else {
        // Capturamos en el archivo
        fputs($escribir, $idEmpleado . "\n");
        fputs($escribir, $nombreEmpleado . "\n");
        fputs($escribir, $tipoEmpleado . "\n");
        fputs($escribir, $sexoEmpleado . "\n");
        fputs($escribir, $fotoEmpleado . "\n");
        fputs($escribir, $salarioEmpleado . "\n");
    }
}

fclose($leer);
fclose($escribir);
if (rename("temp.txt", "credenciales.txt")) {
    echo "<script>alert('Datos Editados Exitosamente!!!');</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=dasboardAdmin.php'>";
}
