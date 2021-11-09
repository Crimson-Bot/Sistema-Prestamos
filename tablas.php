<?php global $nombreUsuario, $idUsuario, $tipoUsuario, $sexoUsuario, $fotoUsuario, $salarioUsuario;
global $contTemp;
$contTemp = 0;
$idUsuario = $_GET['id'];
if ($idUsuario != 0) {
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
            if ($idUsuario == $claveid) {
                $nombreUsuario = $nombre;
                $tipoUsuario = $tipo;
                $sexoUsuario = $sexo;
                $fotoUsuario = $foto;
                $salarioUsuario = $salario;
            }
        }
        fclose($leer);
    }
} else {
    $nombreUsuario = "";
    $idUsuario = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Inicio</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo "dashboardEmpleado.php?id=" . $idUsuario . " " ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
            </li>




            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tablas</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Log out</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" ><?php echo $nombreUsuario ?></span>
                                <img class="img-profile rounded-circle"
                                    src="./imagenes/1.png">
                            </a>
                            <!-- Dropdown - User Information -->

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <h1 class="h3 mb-0 text-gray-800">Reporte de prestamo</h1> -->
                        <button class="btn btn-primary" id="btnCrearPdf">Generar reporte</button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalSolicitarPrestamo"> + Solicitar prestamo
                        </button>
                        <!-- <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar datos</button> -->
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModalAgregarPago">+ Agregar pago de quincena</button>
                    </div>
                </div>
                <!-- Tabla inicio -->


                <div class="container-fluid" id="i">
                    <h1>Reporte de prestamo</h1>
                    <!-- Colocar tabla aquí -->

                    <!-- Abrir archivo de deudas aquí -->
<?php
echo "<table border class='table'> <tr>
<th scope='col'>ID</th>
<th scope='col'>Nombre</th>
<th scope='col'>Quincenas Totales</th>
<th scope='col'>Monto Total</th>
  </tr>
  <tbody>";
$mostrar = fopen('prestamos.txt', 'r');
global $totalPrestamo, $totalQuincenas;
$totalPrestamo = $totalPrestamo - 1;
while (!feof($mostrar)) {
    $id = fgets($mostrar);
    if ($id == $idUsuario) {
        $nombre = fgets($mostrar);
        $totalPrestamo = fgets($mostrar);
        $totalQuincenas = fgets($mostrar);
    }
}
fclose($mostrar);
// tabla 2
$mostrar2 = fopen('pagos.txt', 'r');
global $restaPrestamos, $restaQuincenas, $temp;
$temp = $totalQuincenas;
$restaQuincenas = $totalQuincenas;
while (!feof($mostrar2)) {
    $id = fgets($mostrar2);
    if ($id == $idUsuario) {

        $nombre = fgets($mostrar2);
        $restaPrestamos = fgets($mostrar2);
        $totalPrestamo = $totalPrestamo - $restaPrestamos;
        $restaQuincenas = $restaQuincenas - 1;
        if ($restaQuincenas < 0) {
            echo "<tr><td>" . $id . "</td><td>" . $nombre . "</td><td>" . $totalPrestamo . "</td><td>" . 'RETRASO' . "</td></tr>";
        } else {

            echo "<tr><td>" . $id . "</td><td>" . $nombre . "</td><td>" . $totalPrestamo . "</td><td>" . $restaQuincenas . "</td></tr>";
        }

    }
}
fclose($mostrar2);
echo "</tbody></table>";
if ($totalPrestamo == 0) {
    // Eliminar prestamo aquí
    $leer = fopen("pagos.txt", "r");
    $escribir = fopen("temporal.txt", "a+");
    $validar = fopen("prestamos.txt", "r");
    $barrido = fopen("temp.txt", "a+");
    // prestamos
    while (!feof($validar)) {
        $idP = fgets($validar);
        $nombreP = fgets($validar);
        $montoP = fgets($validar);
        if ($idUsuario != $idP) {
            fputs($barrido, $idClaveP);
            fputs($barrido, $nombreClaveP);
            fputs($barrido, $montoP);
        }
    }
    // pagos
    while (!feof($leer)) {
        $idClave = fgets($leer);
        $nombreClave = fgets($leer);
        $monto = fgets($leer);
        if ($idUsuario != $idClave) {
            fputs($escribir, $idClave);
            fputs($escribir, $nombreClave);
            fputs($escribir, $monto);
        }
    }
    fclose($leer);
    fclose($escribir);
    fclose($validar);
    fclose($barrido);
    if (rename("temporal.txt", "pagos.txt") && rename("temp.txt", "prestamos.txt")) {
        echo "<script>alert('Datos Eliminados Exitosamente!!!');</script>";
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=index.php '>";
    }
}
?>

                <div class="container-fluid" id="i">

                </div>
                <!-- Tabla fin -->


                <!-- Inicio del modal EDITAR DATOS -->
                <div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edición de datos</h5>
                        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="editarEmpleados.php">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">ID/Contraseña:</label>
                                <input type="text" class="form-control" name="idEditado" id="idEditado" placeholder="ID/Contraseña" value="<?php echo $idUsuario; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombreEditado" id="nombreEditar" placeholder="Nombre" value="<?php echo $nombreUsuario; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Foto:</label>
                                <input type="text" class="form-control" name="fotoEditado" id="fotoEditado" placeholder="Url" value="<?php echo $fotoUsuario; ?>" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="tipoEditado" id="tipoEditado" value="<?php echo $tipoUsuario; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="sexoEditado" id="sexoEditado" value="<?php echo $sexoUsuario; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="salarioEditado" id="salarioEditado" value="<?php echo $salarioUsuario; ?>" readonly>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                <!-- Fin del modal para editar datos-->

                <!-- Inicio del modal solicitar prestamo -->
                <!-- Prestamo menor o igual que $18,000 -->
                <div class="modal fade" id="exampleModalSolicitarPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Solicitar prestamo</h5>
                        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>

                    <div class="modal-body">
                    <form action="solicitarPrestamo.php" method="GET" >
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Id del usuario</label>

                        <div class="prestamo">
                        <input type="text" name="idPrestamo" class="form-control" id="idSolicitarPrestamo" value="<?php echo $idUsuario; ?>" readonly>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre</label>
                            <input type="text" name="nombrePrestamo" class="form-control" id="nombreSolicitarPrestamo" value="<?php echo $nombreUsuario; ?>" readonly>
                        </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Cantidad del Prestamo</label>
                                <div class="prestamo">
                                <input type="num" class="form-control" name="cantidadPrestamo" id="cantidadSolicitarPrestamo" placeholder="Cantidad" required autocomplete="off">
                                <button id="btnBuscar" class="bnt btn-info">Validar</button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="select">
                                    <label for="">Plazo de quincenas</label>
                                    <select name="plazo" id="op">
                                        <option value="" hidden selected>--Seleccione--</option>
                                        <option value="8">8 Quincenas</option>
                                        <option value="16">16 Quincenas</option>
                                        <option value="24">24 Quincenas</option>
                                    </select>
                                </div>
                            </div>

                            <!-- div del modal body -->
                    </div>
                <!-- div del modal dialog -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-success" value="Guardar" >
                    </div>
                    </form>
                    </div>
                </div>
                </div>


                <!-- Fin del inicio del modal solicitar prestamo -->



                <!-- Inicio del modal para agregar pago -->
                <div class="modal fade" id="exampleModalAgregarPago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar pago</h5>
                        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>

                    <div class="modal-body">
                        <form method="GET" action="pagos.php" >
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Id del usuario</label>

                                <div class="prestamo">
                                <input type="text" name="idPago" class="form-control" id="idAgregarPago" value="<?php echo $idUsuario; ?>" readonly >
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre</label>
                                <input type="text" name="nombrePago" class="form-control" id="nombreAgregarPago" value="<?php echo $nombreUsuario; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Abono quincenal</label>
                                <input type="text" class="form-control" id="abonoAgregarPago" placeholder="$Abono" name="abonoPago" required>
                            </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                    </div>
                    </form>
                </div>
                </div>

                <!-- Fin del modal para agregar pago -->




                <!--  Librerias para model-->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


               <!-- Scrips para pdf -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", () =>{
                        const $boton = document.querySelector("#btnCrearPdf");
                        $boton.addEventListener("click", ()=>{
                            // Elegimos que parte del documento imprimir
                            const $elementoParaConvertir = document.getElementById("i");
                            html2pdf()
                            .set({
                                margin: 1,
                                filename: "documento.pdf",
                                image: {
                                    type: "jpeg",
                                    quality: 0.98
                                },

                                html2canvas: {
                                    // A mayo escala, mejores gráficos, pero mas peso
                                    scale: 3,
                                    letterRendering: true,
                                },

                                jsPDF: {
                                    unit: "in",
                                    format: "a3",
                                    // Landscape o portrait
                                    orientation: "portrait"
                                }
                            })
                            .from($elementoParaConvertir)
                            .save()
                            .catcher(err => console.log(err))
                        });
                    });
                </script>


            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
