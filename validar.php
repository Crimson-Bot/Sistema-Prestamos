<?php
session_start();

if(isset($_POST['guardar'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if($pass == "admin" && $user == "admin"){
        header('Location: dasboardAdmin.php');
    }else{
        header('Location: validarSQL.php?id='.$pass.'&nombre='.$user.' ');
    }
}