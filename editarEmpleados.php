<?php
// $id = $_GET['idEditado'];
// $nombre = $_GET['nombreEditado'];
// $tipo = "";
// $sexo = "";
// $foto = $_GET['fotoEditado'];
// $salario = "";

$idd = $_GET['idEditado'];
// $editTipo = "";
// $editSalario = "";
// $editSexo = "";

// $leer = fopen("credenciales.txt", "r");
// while (!feof($leer)) {
//     $idEdit = fgets($leer);
//     $nombreEdit = fgets($leer);
//     $tipoEdit = fgets($leer);
//     $sexoEdit = fgets($leer);
//     $fotoEdit = fgets($leer);
//     $salarioEdit = fgets($leer);
//     if ($idEdit == $id) {

//         $editTipo = $tipoEdit;
//         $editSexo = $sexoEdit;
//         $editSalario = $salarioEdit;
//         break;
//     }
// }

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
    echo "<script>alert('Datos Editados Exitosamente!!!');</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=tablas.php'>";
}
