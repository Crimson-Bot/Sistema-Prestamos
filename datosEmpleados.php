<?php
$nombre = $_GET['nombre'];
$id = $_GET['id'];
$tipo = $_GET['tipoEmpleado'];
$sexo = $_GET['sexo'];
$foto = $_GET['foto'];
$salario = $_GET['salario'];

$ruta = "credenciales.txt";
if (file_exists($ruta)) {
    $leer = fopen("credenciales.txt", "r");
    $flag = true;
    while (!feof($leer)) {
        $claveid = fgets($leer);
        if ($id == $claveid) {
            echo "ERROR.....ya existe un registro con ese ID<br>";
            $flag = false;
            break;
        }
    }
    fclose($leer);

    if ($flag == true) {
        // Escribir en el archivo
        $fileSave = fopen("credenciales.txt", "a+");
        // Capturamos en el archivo
        fputs($fileSave, $id . "\n");
        fputs($fileSave, $nombre . "\n");
        fputs($fileSave, $tipo . "\n");
        fputs($fileSave, $sexo . "\n");
        fputs($fileSave, $foto . "\n");
        fputs($fileSave, $salario . "\n");
        fclose($fileSave);
    }
} else {
    // Escribir en el archivo
    $fileSave = fopen("credenciales.txt", "a+");
    // Capturamos en el archivo
    fputs($fileSave, $id . "\n");
    fputs($fileSave, $nombre . "\n");
    fputs($fileSave, $tipo . "\n");
    fputs($fileSave, $sexo . "\n");
    fputs($fileSave, $foto . "\n");
    fputs($fileSave, $salario . "\n");
    fclose($fileSave);

}
