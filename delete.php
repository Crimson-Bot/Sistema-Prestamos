<?php
include_once 'conexion.php';

$id = $_GET['id'];

// mysqli_query($con, "DELETE FROM empleados WHERE id = '$id' ");
// mysqli_close($con);

$delete=$con->prepare('DELETE FROM empleados WHERE id=:id');

    $delete->execute(array(

        ':id'=>$id

    ));
header('Location: tablasAdmin.php');

// if (isset($_GET['id'])) {
//     echo "<script>alert(".$id.")</script>";
//     $delete = $con->prepare('DELETE FROM empleados WHERE id=:id');
//     $delete->execute(array(
//         ':id' => $id,
//     ));
//     header('Location: tablasAdmin.php');
// } else {
//     // header('Location: tablasAdmin.php');
//     echo "<script>alert(".$id.")</script>";
// }
