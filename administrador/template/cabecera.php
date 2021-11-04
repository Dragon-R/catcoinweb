<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../index.php");
}else{
    if($_SESSION['usuario']=="ok") {
        $nombreUsuario=$_SESSION["nombreUsuario"];
    }
}
?>

<!doctype html>
<html lang="es">
    <head>
        <title>Admin</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
        <?php $url="http://".$_SERVER['HTTP_HOST']."/catcoin" ?>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador del sitio web</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/usuarios.php">Usuarios</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar</a>
                <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
            </div>
        </nav>
        <div class="container">
            <br>
            <div class="row">