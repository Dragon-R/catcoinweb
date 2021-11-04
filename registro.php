<?php include("template/cabecera.php"); ?>
<?php 
include("administrador/config/bd.php");

$txtAlias=(isset($_POST['txtAlias']))?$_POST['txtAlias']:"";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
$txtGenero=(isset($_POST['txtGenero']))?$_POST['txtGenero']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtContrasena=(isset($_POST['txtContrasena']))?$_POST['txtContrasena']:"";
$txtNacimiento=(isset($_POST['txtNacimiento']))?$_POST['txtNacimiento']:"";
$txtPais=(isset($_POST['txtPais']))?$_POST['txtPais']:"";
$txtCiudad=(isset($_POST['txtCiudad']))?$_POST['txtCiudad']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

if ($accion) {
    $sentenciaSQL= $conexion->prepare("INSERT INTO usuarios (alias, nombres, apellidos, genero, correo, contrasena, nacimiento, pais, ciudad) VALUES (:alias,:nombres,:apellidos,:genero,:correo,:contrasena,:nacimiento,:pais,:ciudad);");
    $sentenciaSQL->bindParam(':alias',$txtAlias);
    $sentenciaSQL->bindParam(':nombres',$txtNombres);
    $sentenciaSQL->bindParam(':apellidos',$txtApellidos);
    $sentenciaSQL->bindParam(':genero',$txtGenero);
    $sentenciaSQL->bindParam(':correo',$txtCorreo);
    $sentenciaSQL->bindParam(':contrasena',$txtContrasena);
    $sentenciaSQL->bindParam(':nacimiento',$txtNacimiento);
    $sentenciaSQL->bindParam(':pais',$txtPais);
    $sentenciaSQL->bindParam(':ciudad',$txtCiudad);

    $sentenciaSQL->execute();
    header("Location:index.php");
}

?>

    <div id="index" class="container">
        <div class="row">
            <form id="registro" method="POST" enctype="multipart/form-data">
                <div class="row g-3 align-items-center">
                    <div class="col-6">
                        <input type="text" id="alias" class="form-control" name="txtAlias" id="txtAlias" value="<?php echo $txtAlias; ?>" placeholder="Alias" minlength="5" maxlength="15" required>
                    </div>
                    <div class="col-6">
                        <input type="password" id="password" class="form-control" name="txtContrasena" id="txtContrasena" value="<?php echo $txtContrasena; ?>" aria-describedby="passwordHelpInline" placeholder="Contraseña" minlength="8" maxlength="16" required>
                    </div>
                    <div class="col-6">
                        <input type="text" id="nombres" class="form-control" name="txtNombres" id="txtNombres" value="<?php echo $txtNombres; ?>" placeholder="Nombres" minlength="3" maxlength="30" required>
                    </div>
                    <div class="col-6">
                        <input type="password" id="password" class="form-control" name="txtContrasena" id="txtContrasena" value="<?php echo $txtContrasena; ?>" aria-describedby="passwordHelpInline" placeholder="Repetir Contraseña" minlength="8" maxlength="16" required>
                    </div>
                    <div class="col-6">
                        <input type="text" id="apellidos" class="form-control" name="txtApellidos" id="txtApellidos" value="<?php echo $txtApellidos; ?>" placeholder="Apellidos" minlength="3" maxlength="30" required>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="date" id="nacimiento" class="form-control" name="txtNacimiento" id="txtNacimiento" value="<?php echo $txtNacimiento; ?>" placeholder="Fecha de Nacimiento" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <select class="form-select" name="txtGenero" id="txtGenero" value="<?php echo $txtGenero; ?>" aria-label="Default select example" required>
                            <option selected>Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input type="text" id="pais" class="form-control" name="txtPais" id="txtPais" value="<?php echo $txtPais; ?>" placeholder="Pais" minlength="3" maxlength="30" required>
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" value="<?php echo $txtCorreo; ?>" placeholder="Correo" minlength="5" maxlength="50" required>
                    </div>
                    <div class="col-6">
                        <input type="text" id="ciudad" class="form-control" name="txtCiudad" id="txtCiudad" value="<?php echo $txtCiudad; ?>" placeholder="Ciudad" minlength="3" maxlength="30" required>
                    </div>
                </div>
                <div id="btn_jugar" class="col">
                    <input id="btnregistrar" type="submit" class="btn btn-lg" name="accion" value="REGISTRAR">
                </div>
            </form>
        </div>
    </div>

<?php include("template/pie.php"); ?>