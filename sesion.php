<?php include("template/cabecera.php"); ?>

<?php
session_start();
if ($_POST) {
    if (($_POST['user']==$txtAlias) && ($_POST['contrasena']==$txtContrasena)) {
        $_SESSION['user']="ok";
        $_SESSION['userName']=$txtAlias;
        header('Location:index.php');
    }else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
    }
}
?>

    <div id="sesion" class="container">
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
                            <button type="submit" class="btn btn-primary">Entrar al administrador</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("template/pie.php"); ?>