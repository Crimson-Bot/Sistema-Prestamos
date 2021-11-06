<?php
$idd = $_GET['idEliminado'];
 
$leer = fopen("credenciales.txt", "r");
$escribir = fopen("temp.txt", "a+");
while (!feof($leer)) {
    $id = fgets($leer);
    $nombre = fgets($leer);
    $tipo = fgets($leer);
    $sexo = fgets($leer);
    $foto = fgets($leer);
    $salario = fgets($leer);
    if ($idd != $id) {
        fputs($escribir, $id);
        fputs($escribir, $nombre);
        fputs($escribir, $tipo);
        fputs($escribir, $sexo);
        fputs($escribir, $foto);
        fputs($escribir, $salario);
    }
}
fclose($leer);
fclose($escribir);
if (rename("temp.txt", "credenciales.txt")) {
    echo "<script>alert('Datos Eliminados Exitosamente!!!');</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=dasboardAdmin.php'>";
}
