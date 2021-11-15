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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="contenedor">
    <h2>CRUD EN PHP CON MYSQL</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre'];?>" class="input__text">
            <input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo'];?>"class="input__text">
        </div>
        <div class="form-group">
            <input type="text" name="sexo" value="<?php if($resultado) echo $resultado['sexo'];?>" class="input__text">
            <input type="text" name="foto" value="<?php if($resultado) echo $resultado['foto'];?>" class="input__text">
        </div>
        <div class="form-group">
            <input type="text" name="salario" value="<?php if($resultado) echo $resultado['salario'];?>" class="input__text">
        </div>

        <div class="btn__group">
            <a href="tablasAdmin.php" class ="btn btn_danger">Cancelar</a>
            <input type="submit" name="guardar" value="Guardar" class="btn btn_primary">
        </div>
    
    </form>
</div>
    
</body>
</html>