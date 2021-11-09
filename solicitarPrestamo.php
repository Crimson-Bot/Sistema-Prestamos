<?php
$id = $_GET['idPrestamo'];
$nombre = $_GET['nombrePrestamo'];
$cantidadPrestamo = $_GET['cantidadPrestamo'];
$plazo = $_GET['plazo'];
date_default_timezone_set('America/Mexico_City');
$dateAndTime = date("n");

$ruta = "credenciales.txt";
if (file_exists($ruta)) {
    $leer = fopen("credenciales.txt", "r");
    while (!feof($leer)) {
        $claveid = fgets($leer);
        $nombre = fgets($leer);
        $tipo = fgets($leer);
        $sexo = fgets($leer);
        $foto = fgets($leer);
        $salario = fgets($leer);
        if ($id == $claveid) {
            $mesesSueldo = $salario * 3;
            break;
        }
    }
}
fclose($leer);
if ($cantidadPrestamo < $mesesSueldo) {
    $ruta = "prestamos.txt";
    if (file_exists($ruta)) {
        $leer = fopen("prestamos.txt", "r");
        $flag = true;
        while (!feof($leer)) {
            $claveid = fgets($leer);
            if ($id == $claveid) {
                echo "<script>alert('ERROR... Todavía tiene un prestamo pendiente!');</script>";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php?id=" . $id . "'>";
                //echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php'>";
                $flag = false;
                break;
            }
        }
        fclose($leer);

        if ($flag == true) {
            // Escribir en el archivo
            $fileSave = fopen("prestamos.txt", "a");
            // Capturamos en el archivo
            fputs($fileSave, $id . "\n");
            fputs($fileSave, $nombre);
            fputs($fileSave, $cantidadPrestamo . "\n");
            fputs($fileSave, $plazo . "\n");
            fputs($fileSave, $dateAndTime . "\n");
            fclose($fileSave);
            echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php?id=" . $id . "'>";
            //echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php'>";
        }
    } else {
        // Escribir en el archivo
        $fileSave = fopen("prestamos.txt", "a");
        // Capturamos en el archivo
        fputs($fileSave, $id . "\n");
        fputs($fileSave, $nombre);
        fputs($fileSave, $cantidadPrestamo . "\n");
        fputs($fileSave, $plazo . "\n");
        fputs($fileSave, $dateAndTime . "\n");
        fclose($fileSave);
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php?id=" . $id . "'>";
        //echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php'>";
    }
} else {
    echo "<script>alert('Tu prestamo no puede ser más de 3 meses de tu sueldo....');</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php?id=" . $id . "'>";
    //echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php'>";
}
