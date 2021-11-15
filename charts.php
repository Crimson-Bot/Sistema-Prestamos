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
            <li class="nav-item active">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <!-- <img src="https://img.icons8.com/color/48/000000/graph.png"/> -->
                    <span>Graficas</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tablasAdmin.php">
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

<?php
$contE = 0;
$contF = 0;
$contMar = 0;
$contA = 0;
$contMy = 0;
$contJn = 0;
$contJl = 0;
$contAgos = 0;
$contS = 0;
$contO = 0;
$contN = 0;
$contD = 0;
$mostrar = fopen('prestamos.txt', 'r');
while (!feof($mostrar)) {
    $id = fgets($mostrar);
    $nombre = fgets($mostrar);
    $prestamo = fgets($mostrar);
    $quincena = fgets($mostrar);
    $mes = fgets($mostrar);
    if ($id = !"") {
        if ($mes == 1) {
            $contE++;
        }
        if ($mes == 2) {
            $contF++;
        }
        if ($mes == 3) {
            $contMar++;
        }
        if ($mes == 4) {
            $contA++;
        }
        if ($mes == 5) {
            $contMy++;
        }
        if ($mes == 6) {
            $contJn++;
        }
        if ($mes == 7) {
            $contJl++;
        }
        if ($mes == 8) {
            $contAgos++;
        }if ($mes == 9) {
            $contS++;
        }if ($mes == 10) {
            $contO++;
        }if ($mes == 11) {
            $contN++;
        }if ($mes == 12) {
            $contD++;
        }
    }
}
fclose($mostrar);
$arrayMeses = array($contE, $contF, $contMar, $contA, $contMy, $contJn, $contJl, $contAgos, $contS, $contO, $contN, $contD);

$dataPoints = array(
    array("y" => $arrayMeses[0], "label" => "Enero"),
    array("y" => $arrayMeses[1], "label" => "Febrero"),
    array("y" => $arrayMeses[2], "label" => "Marzo"),
    array("y" => $arrayMeses[3], "label" => "Abril"),
    array("y" => $arrayMeses[4], "label" => "Mayo"),
    array("y" => $arrayMeses[5], "label" => "Junio"),
    array("y" => $arrayMeses[6], "label" => "Julio"),
    array("y" => $arrayMeses[7], "label" => "Agosto"),
    array("y" => $arrayMeses[8], "label" => "Septiembre"),
    array("y" => $arrayMeses[9], "label" => "Octubre"),
    array("y" => $arrayMeses[10], "label" => "Noviembre"),
    array("y" => $arrayMeses[11], "label" => "Diciembre"),
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