<?php
session_start();
if ($_POST) {
    if (($_POST['txtCorreo']==$txtCorreo) && ($_POST['txtContrasena']==$txtContrasena)) {
        $_SESSION['txtCorreo']="ok";
        $_SESSION['txtCorreo']=$txtCorreo;
        header('Location:index.php');
    }else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
    }
}
?>