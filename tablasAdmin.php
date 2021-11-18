<?php
$id = $_POST['id'];

if(empty($id)){
    header('Location: index.php');
}

include_once 'conexion.php';

$sentencia_select = $con->prepare('SELECT * FROM empleados ORDER BY id ASC');
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();
?>

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
            <li>
                <center>
                    <form action="dasboardAdmin.php" method="POST">
                        <input type="text" id="id" value="-1" name="id" readonly hidden>
                        <input type="submit" class="sidebar-brand d-flex align-items-center justify-content-center" value="INICIO" style="background-color:transparent;border:none" id="empleados">
                    </form>
                </center>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Agregar -->
            <li class="nav-item">
                <form action="agregarEmpleado.php" method="POST">
                    <input type="text" id="id" value="-1" name="id" readonly hidden>
                    <input type="submit" class="nav-link" value="Agregar Empleado" style="background-color:transparent;border:none" id="empleados">
                </form>
            </li>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <form action="charts.php" method="POST">
                    <input type="text" id="id" value="-1" name="id" readonly hidden>
                    <input type="submit" class="nav-link" value="Graficas" style="background-color:transparent;border:none" id="empleados">
                </form>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <form action="tablasAdmin.php" method="POST">
                    <input type="text" id="id" value="-1" name="id" readonly hidden>
                    <input type="submit" class="nav-link" value="Tablas" style="background-color:transparent;border:none" id="empleados" disabled>
                </form>
            </li>

            <li class="nav-item">
                <form action="index.php">
                    <input type="submit" class="nav-link" value="Log Out" style="background-color:transparent;border:none" id="empleados">
                </form>
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                                <img class="img-profile rounded-circle"
                                    src="./imagenes/1.png">
                            </a>
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
                    </div>
    <table class="table">
        <tr class="head">
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo de Empleado</th>
            <th scope="col">Sexo</th>
            <th scope="col">Fotografía</th>
            <th scope="col">Salario</th>
            <th scope="col" colspan="2" id="act">Acción</th>
        </tr>

        <?php foreach ($resultado as $fila): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['tipo']; ?></td>
            <td><?php echo $fila['sexo']; ?></td>
            <td><?php echo $fila['foto']; ?></td>
            <td><?php echo $fila['salario']; ?></td>
            <!-- Boton de Editar -->
            <td>
                <form action="editarEmpleados.php" method="POST">
                    <input type="text" name="idAd" value="-1" readonly hidden>
                    <input type="text" name="id" value="<?php echo $fila['id']; ?>" readonly hidden>
                    <input type="submit" class="btn btn-warning" value="Editar">
                </form>
            </td>
            <!-- Boton de Eliminar -->
            <td> <a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">Eliminar</a> </td>
            
        </tr>
        <?php endforeach?>

    </table>
</div>
                    </center>

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