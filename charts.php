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
            <li class="nav-item active">
                <form action="charts.php" method="POST">
                    <input type="text" id="id" value="-1" name="id" readonly hidden>
                    <input type="submit" class="nav-link" value="Graficas" style="background-color:transparent;border:none" id="empleados" disabled>
                </form>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <form action="tablasAdmin.php" method="POST">
                    <input type="text" id="id" value="-1" name="id" readonly hidden>
                    <input type="submit" class="nav-link" value="Tablas" style="background-color:transparent;border:none" id="empleados">
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

<?php
    include("conexion.php");

    $enero = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=1;');
    $febrero = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=2;');
    $marzo = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=3;');
    $abril = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=4;');
    $mayo = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=5;');
    $junio = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=6;');
    $julio = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=7;');
    $agosto = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=8;');
    $septiembre = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=9;');
    $octubre = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=10;');
    $noviembre = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=11;');
    $diciembre = $con -> prepare('SELECT COUNT(fecha) FROM `prestamos` WHERE MONTH(fecha)=12;');
    
    $enero->execute();
    $febrero->execute();
    $marzo->execute();
    $abril->execute();
    $mayo->execute();
    $junio->execute();
    $julio->execute();
    $agosto->execute();
    $septiembre->execute();
    $octubre->execute();
    $noviembre->execute();
    $diciembre->execute();
 
    $res1 = $enero->fetchAll();
    $res2 = $febrero->fetchAll();
    $res3 = $marzo->fetchAll();
    $res4 = $abril->fetchAll();
    $res5 = $mayo->fetchAll();
    $res6 = $junio->fetchAll();
    $res7 = $julio->fetchAll();
    $res8 = $agosto->fetchAll();
    $res9 = $septiembre->fetchAll();
    $res10 = $octubre->fetchAll();
    $res11 = $noviembre->fetchAll();
    $res12 = $diciembre->fetchAll();
 
    foreach ($res1 as $fila):
        $cantidadEne = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res2 as $fila):
        $cantidadFeb = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res3 as $fila):
        $cantidadMar = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res4 as $fila):
        $cantidadAbr = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res5 as $fila):
        $cantidadMay = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res6 as $fila):
        $cantidadJun = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res7 as $fila):
        $cantidadJul = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res8 as $fila):
        $cantidadAgos = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res9 as $fila):
        $cantidadSep = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res10 as $fila):
        $cantidadOctu = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res11 as $fila):
        $cantidadNomb = $fila['COUNT(fecha)'];
    endforeach;
    foreach ($res12 as $fila):
        $cantidadDic = $fila['COUNT(fecha)'];
    endforeach;
 
    $dataPoints = array( 
        array("y" => $cantidadEne, "label" => "Enero" ),
        array("y" => $cantidadFeb, "label" => "Febrero" ),
        array("y" => $cantidadMar, "label" => "Marzo" ),
        array("y" => $cantidadAbr, "label" => "Abril" ),
        array("y" => $cantidadMay, "label" => "Mayo" ),
        array("y" => $cantidadJun, "label" => "Junio" ),
        array("y" => $cantidadJul, "label" => "Julio" ),
        array("y" => $cantidadAgos, "label" => "Agosto" ),
        array("y" => $cantidadSep, "label" => "Septiembre" ),
        array("y" => $cantidadOctu, "label" => "Octubre" ),
        array("y" => $cantidadNomb, "label" => "Noviembre" ),
        array("y" => $cantidadDic, "label" => "Diciembre" )
    );
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

</head>

<body id="page-top">
    <div class="cloumn">
    <div id="content-wrapper" class="d-flex flex-column">
            <script>
                window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "lithg1",
                    title:{
                        text: "Prestamos"
                    },
                    axisY: {
                        title: "Pretamos realizados"
                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0.## prestamos",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
                }
            </script>
        </div>
    </div>

        <!-- End of Content Wrapper -->
    <!-- Canvas -->
    <div id="chartContainer" style="height: 470px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <br>

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