<?php
include_once 'conexion.php';

$id = $_GET['id'];
$bd = "prestamos";
$user = 'root';
$password = '';
$dbhost = "localhost"; 
$conexion = mysqli_connect($dbhost, $user, $password, $bd);

$query = mysqli_query($conexion,"SELECT * FROM prestamos WHERE id = '".$id."' ");
$nr = mysqli_num_rows($query);

if($nr == 0){
    $delete=$con->prepare('DELETE FROM empleados WHERE id=:id');

    $delete->execute(array(

        ':id'=>$id

    ));
    // header('Location: tablasAdmin.php');
    echo '<form method="POST" action="tablasAdmin.php">';
    echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
    echo '<input type="submit" id="save" name="save" hidden>'; ?>
    <script type="text/javascript"> document.getElementById('save').click(); </script>
    <?php echo '</form>';

} else if ($nr == 1){
    echo '<script> alert("Este Usuario todavía tiene un prestamo pendiente!!!")</script>';
    echo '<form method="POST" action="tablasAdmin.php">';
    echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
    echo '<input type="submit" id="save" name="save" hidden>'; ?>
    <script type="text/javascript"> document.getElementById('save').click(); </script>
    <?php echo '</form>';
}
