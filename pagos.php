<?php
    $idUsuario = $_GET['idPago'];
    $nombreUsuario = $_GET['nombrePago'];
    $abonoPago = $_GET['abonoPago'];

$ruta = "pagos.txt";
        // Escribir en el archivo
        $fileSave = fopen("pagos.txt", "a");
        // Capturamos en el archivo
        fputs($fileSave,$idUsuario."\n");
        fputs($fileSave,$nombreUsuario."\n");
        fputs($fileSave,$abonoPago."\n");
        fclose($fileSave);
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php'>"; 
?>
