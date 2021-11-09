<!DOCTYPE html>
<html lang="en">

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

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Inicio</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dasboardAdmin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="agregarEmpleado.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Agregar Empleado</span></a>
            </li>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <img src="https://img.icons8.com/color/48/000000/graph.png"/>
                    <span>Graficas</span></a>

            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tablas</span></a>
            </li>



                        <!-- Nav Item - Tables -->
            <li class="nav-item">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarEmpleado"> Eliminar usuario
                        </button>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Log out</span></a>
            </li>

            <li class="nav-item">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar"> Editar Usuario
                        </button>
            </li>




                            <!-- Inicio del modal ELIMINAR DATOS -->
                            <div class="modal fade" id="eliminarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar empleado</h5>
                        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <!-- Empiezo de formulario -->
                        <form method="GET" action="eliminarEmpleados.php">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">ID/Contraseña:</label>
                                <input type="text" class="form-control" name="idEliminado" id="idEliminado" placeholder="ID/Contraseña" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                <!-- Fin del modal para editar datos-->

                 <!-- Inicio del modal EDITAR DATOS -->
                 <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edición de datos</h5>
                        <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <!-- fORMULARIO  EDITAR DATOS-->
                        <form method="GET" action="editarEmpleados.php">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">ID/Contraseña:</label>
                                <input type="text" class="form-control" name="idEditado" id="idEditado" placeholder="ID/Contraseña" required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombreEditado" id="nombreEditar" placeholder="Nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tipo de empleado:</label>
                                <input type="text" class="form-control" name="tipoEditado" id="tipoEditado" placeholder="Tipo de empleado" required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Sexo:</label>
                                <input type="text" class="form-control" name="sexoEditado" id="sexoEditado" placeholder="Sexo del empleado" required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Foto:</label>
                                <input type="text" class="form-control" name="fotoEditado" id="fotoEditado" placeholder="Url"required>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Salario:</label>
                                <input type="text" class="form-control" name="salarioEditado" id="salarioEditado" placeholder="Salario"required>
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



                                <!--  Librerias para model-->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="./imagenes/1.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Datos de los Empleados</h1>
                    </div>
                    <center>
<?php
echo "<table border class='table'><tr>
<th scope='col'>ID</th>
<th scope='col'>Nombre</th>
<th scope='col'>Tipo</th>
<th scope='col'>Sexo</th>
<th scope='col'>Foto</th>
<th scope='col'>Salario</th> </tr>";
$mostrar = fopen('credenciales.txt', 'r');
while (!feof($mostrar)) {
    $id = fgets($mostrar);
    $nombre = fgets($mostrar);
    $tipo = fgets($mostrar);
    $sexo = fgets($mostrar);
    $foto = fgets($mostrar);
    $salario = fgets($mostrar);
    if ($id != "") {
        echo "<tr><td>" . $id . "</td><td>" . $nombre . "</td><td>" . $tipo . "</td><td>" . $sexo . "</td><td>" . $foto . "</td><td>" . $salario . "</td></tr>";
    }
}
fclose($mostrar);
echo "</table>";
?>
                    </center>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistema de Prestamos 2021</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->



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