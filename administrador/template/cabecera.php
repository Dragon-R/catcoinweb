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
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <?php $url="http://".$_SERVER['HTTP_HOST']."/catcoin" ?>
        <nav id="cabec" class="navbar navbar-expand navbar-dark bg-dark">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#">Administrador del sitio web</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/usuarios.php">Usuarios</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar <?php echo $nombreUsuario; ?></a>
                <a class="nav-item nav-link" href="<?php echo $url; ?>" target="_blank">Ver sitio web</a>
            </div>
        </nav>
        <br>
        <div id="texto" class="container-fluid">
            <div class="row">