<?php include("controllers/sesionC.php"); ?>

<?php include("template/cabecera.php"); ?>

    <div id="sesion" class="container">
        <br>
        <br>
        <br>
        <div class="row justify-content-md-center">
            <form id="sesiones" method="POST" enctype="multipart/form-data">
                <div id="sesion_correo" class="row align-items-center">
                    <div class="col-4">
                        <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" value="" placeholder="Correo" minlength="5" maxlength="50" required>
                    </div>
                </div>
                <div id="sesion_contrasena" class="row align-items-center">
                    <div class="col-4">
                        <input type="password" class="form-control" id="txtContrasena" name="txtContrasena" value="" aria-describedby="passwordHelpInline" placeholder="Contraseña" minlength="8" maxlength="16" required>
                    </div>
                </div>
                <div id="btn_jugar" class="col">
                    <input id="btnregistrar" type="submit" class="btn btn-lg" name="accion" value="INICIAR SESIÓN">
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
    </div>

<?php include("template/pie.php"); ?>