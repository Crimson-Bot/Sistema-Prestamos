<?php
$user = $_GET['user'];
$pass = $_GET['pass'];
global $clave;
global $nombre;
global $subCadena;
$lenght = strlen($user);
$ruta = "credenciales.txt";
if (file_exists($ruta)) {
    $leer = fopen("credenciales.txt", "r");
    while (!feof($leer)) {
        $clave = fgets($leer);
        $nombre = fgets($leer);
        $subCadena = substr($nombre, 0, $lenght);
        if ($user == "admin" && $pass == "admin") {
            echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=dasboardAdmin.php'>";
            break;
        } else if ($pass == $clave && $subCadena == $user) {
            echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=dashboardEmpleado.php?id=" . $pass . "'>";
            // echo "<center>
            //     <br>
            //     <form method='GET' action='tablas.php'>
            //     <h1>Hola " . $subCadena . " se te redireccionara a tu Dashboard...</h1>
            //     <input type='hidden' name='idUsuario' value=" . $clave . " readonly>
            //     <input type='submit' class='btn btn-primary' value='Aceptar'>
            //     </form>
            //     </center>";
            break;
        }
    }
}
