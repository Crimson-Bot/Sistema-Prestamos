<?php
$idEmpleado = $_GET['idEditado'];
$nombreEmpleado = $_GET['nombreEditado'];
$tipoEmpleado = $_GET['tipoEditado'];
$sexoEmpleado = $_GET['sexoEditado'];
$fotoEmpleado = $_GET['fotoEditado'];
$salarioEmpleado = $_GET['salarioEditado'];

// ------------------------------------------------------------------------------------------------------------
$validar = fopen("prestamos.txt", "r");
while (!feof($validar)) {
    $claveId = fgets($validar);
    if ($idEmpleado == $claveId) {
        echo "<script>alert('ERROR... los datos no se pueden editar con un prestamo pendiente!!!');</script>";
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=dasboardAdmin.php'>";
        break;
    } else {
        $leer = fopen("credenciales.txt", "r");
        $escribir = fopen("temp.txt", "a+");
        while (!feof($leer)) {
            $id = fgets($leer);
            $nombre = fgets($leer);
            $tipo = fgets($leer);
            $sexo = fgets($leer);
            $foto = fgets($leer);
            $salario = fgets($leer);
            if ($idEmpleado != $id) {
                fputs($escribir, $id);
                fputs($escribir, $nombre);
                fputs($escribir, $tipo);
                fputs($escribir, $sexo);
                fputs($escribir, $foto);
                fputs($escribir, $salario);
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
            break;
        }
    }
}
