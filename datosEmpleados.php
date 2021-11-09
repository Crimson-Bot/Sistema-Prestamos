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
            echo "<script>alert('ERROR... Ya existe un usuario con ese ID!!!');</script>";
            echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=agregarEmpleado.php'>";
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
        echo "<script>alert('Datos Guardados Correctamente!!!');</script>";
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=agregarEmpleado.php'>";
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
    echo "<script>alert('Datos Guardados Correctamente!!!');</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=agregarEmpleado.php'>";

}
