<?php
session_start();
if ($_POST) {
    if (($_POST['usuario']=="AdminCatCoin") && ($_POST['contrasenia']=="catcoin")) {
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="AdminCatCoin";
        header('Location:inicio.php');
    }else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
    }
}
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            <?php if(isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                            <?php } ?>
                            <form method="POST">
                                <div class = "form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" name="usuario" placeholder="Escribe tu usuario">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña:</label>
                                    <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Entrar al administrador</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>