<?php
include_once 'conexion.php';

$id = $_POST['id'];
$bd = "prestamos";
$user = 'root';
$password = '';
$dbhost = "localhost"; 
$conexion = mysqli_connect($dbhost, $user, $password, $bd);

$query = mysqli_query($conexion,"SELECT * FROM prestamos WHERE id = '".$id."' ");
$nr = mysqli_num_rows($query);

if(isset($_POST['guardar'])){
    if($nr == 0){
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
            // header('Location: index.php');
            echo '<form method="POST" action="tablasAdmin.php">';
            echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
            echo '<input type="submit" id="save" name="save" hidden>'; ?>
            <script type="text/javascript"> document.getElementById('save').click(); </script>
            <?php echo '</form>';
        }else{
            echo '<script> alert("Los campos estan vacios")</script>';
            echo '<form method="POST" action="tablasAdmin.php">';
            echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
            echo '<input type="submit" id="save" name="save" hidden>'; ?>
            <script type="text/javascript"> document.getElementById('save').click(); </script>
            <?php echo '</form>';
            
        }
    } else if ($nr == 1){
        echo '<script> alert("Este Usuario todavía tiene un prestamo pendiente!!!")</script>';
        echo '<form method="POST" action="tablasAdmin.php">';
        echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
        echo '<input type="submit" id="save" name="save" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('save').click(); </script>
        <?php echo '</form>';
    }
    
}

if(isset($_POST['cancelar'])){
    echo '<form method="POST" action="tablasAdmin.php">';
    echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
    echo '<input type="submit" id="save" name="save" hidden>'; ?>
    <script type="text/javascript"> document.getElementById('save').click(); </script>
    <?php echo '</form>';
}