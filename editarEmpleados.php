<?php
include_once 'conexion.php';
if(isset($_GET['id'])){
    $id=(int) $_GET['id'];

    $buscar_id=$con->prepare('SELECT * FROM empleados WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
        ':id'=>$id
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: tablasAdmin.php');
}

if(isset($_POST['guardar'])){
    $nombre=$_POST['nombre'];
    $tipo=$_POST['tipo'];
    $sexo=$_POST['sexo'];
    $foto=$_POST['foto'];
    $salario=$_POST['salario'];

    if(!empty($nombre) && !empty($tipo) && !empty($sexo) && !empty($foto) && !empty($salario)){
        
            $consulta_update=$con->prepare('UPDATE empleados set 
            nombre =:nombre,
            tipo=:tipo,
            sexo=:sexo,
            foto=:foto,
            salario=:salario WHERE id=:id');
            $consulta_update->execute(array(
                ':nombre' => $nombre,
                ':tipo' => $tipo,
                ':sexo' => $sexo,
                ':foto' => $foto,
                ':salario' => $salario,
                ':id'=> $id
            ));
            header('Location: tablasAdmin.php');

    }else{
        echo '<script> alert("Los campos estan vacios")</script>';
    }
}
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dasboardAdmin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Inicio</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

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
                    <!-- <img src="https://img.icons8.com/color/48/000000/graph.png"/> -->
                    <span>Graficas</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tablas</span></a>
            </li>

            </li>
            <li class="nav-item">
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
                        <h1 class="h3 mb-0 text-gray-800">Editar Datos</h1>
                    </div>

                    <div class="contenedor">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre'];?>" class="form-control form-control-user">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo'];?>"class="form-control form-control-user">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="sexo" value="<?php if($resultado) echo $resultado['sexo'];?>" class="form-control form-control-user">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="foto" value="<?php if($resultado) echo $resultado['foto'];?>" class="form-control form-control-user">
                            </div>
                        </div>
                        <center>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="salario" value="<?php if($resultado) echo $resultado['salario'];?>" class="form-control form-control-user">
                            </div>
                        </center>

                        <center>
                            <br>
                            <div class="btn__group">
                                <a href="tablasAdmin.php" class ="btn btn-danger">Cancelar</a>
                                <input type="submit" name="guardar" value="Guardar" class="btn btn-success">
                            </div>
                        </center>
                    
                    </form>
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