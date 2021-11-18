<?php
session_start();

if(isset($_POST['guardar'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if($pass == "admin" && $user == "admin"){
        echo '<form method="POST" action="dasboardAdmin.php">';
        echo '<input type="text" id="id" value="-1" name="id" readonly hidden>';
        echo '<input type="submit" id="enviar"  name="enviar" hidden>'; ?>
        <script type="text/javascript"> document.getElementById('enviar').click(); </script>
        <?php echo '</form>';
        // header('Location: dasboardAdmin.php');
    }else{
        header('Location: validarSQL.php?id='.$pass.'&nombre='.$user.' ');
    }
}