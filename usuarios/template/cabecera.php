<?php 
/* session_start();
if (!isset($_SESSION['txtCorreo'])) {
    header("Location:../index.php");
}else{
    if($_SESSION['txtCorreo']=="ok") {
        $userName=$_SESSION["txtCorreo"];
    }
} */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatCoin - Usuarios</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/comic-sans-ms.ttf"  type="text/css">
    <link rel="stylesheet" href="./css/play.ttf"  type="text/css">
</head>
<body>
    <br>
    <div id="cabecera" class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a id="inicio" class="nav-link cabecera" href="index.php">INICIO</a>
                </li>
                <li class="nav-item">
                    <a id="jugar" class="nav-link" href="jugar.php">CÓMO JUGAR</a>
                </li>
                <li class="nav-item">
                    <a id="nosotros" class="nav-link" href="nosotros.php">NOSOTROS</a>
                </li>
                <li class="nav-item">
                    <a id="registro" class="nav-link" href="usuario.php">USUARIO</a>
                </li>
                <li class="nav-item">
                    <a id="sesion" class="nav-link" href="../../models/cerraruser.php">CERRAR SESIÓN</a>
                </li>
                <!-- <a class="nav-item nav-link" href="<?php /* echo $url; */?>cerrar.php">Cerrar <?php /* echo $txtCorreo; */ ?></a> -->
            </ul>
        </nav>
    </div>
