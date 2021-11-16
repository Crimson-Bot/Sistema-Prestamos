<?php
// $id = $_GET['idPrestamo'];
// $nombre = $_GET['nombrePrestamo'];
// $cantidadPrestamo = $_GET['cantidadPrestamo'];
// $plazo = $_GET['plazo'];
// date_default_timezone_set('America/Mexico_City');
// $dateAndTime = date("n");

include_once 'conexion.php';
// --------------------------------------------------------------------------------------------------------------
    $id = $_POST['idPrestamo'];
    $nombre = $_POST['nombrePrestamo'];
    $cantidadPrestamo = $_POST['cantidadPrestamo'];
    $plazo = $_POST['plazo'];
    date_default_timezone_set('America/Mexico_City');
    $dateAndTime = date("Y-m-d H:i:s");

    $consulta_insert = $con->prepare('INSERT INTO prestamos(id,nombre,cantidad,plazo,fecha) VALUES(:id,:nombre,:cantidad,:plazo,:fecha)');
        $consulta_insert->execute(array(
            ':id' => $id,
            ':nombre' => $nombre,
            ':cantidad' => $cantidadPrestamo,
            ':plazo' => $plazo,
            ':fecha' => $dateAndTime,
        ));
        header('Location: tablas.php?id='.$id.'&nombre='.$nombre.' ');
    
    // $consulta_insert = $con->prepare('INSERT INTO prestamos(id,nombre,cantidad,plazo,fecha) VALUES(:id,:nombre,:cantidad,:plazo,:fecha)');
    //     $consulta_insert->execute(array(
    //         ':id' => $id,
    //         ':nombre' => $nombre,
    //         ':cantidad' => $cantidadPrestamo,
    //         ':plazo' => $plazo,
    //         ':fecha' => $dateAndTime,
    //     ));
    //     header('Location: tablas.php');


?>