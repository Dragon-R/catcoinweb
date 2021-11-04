<?php include("template/cabecera.php"); ?>
<?php 
include("administrador/config/bd.php");

$txtAlias=(isset($_POST['txtAlias']))?$_POST['txtAlias']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtGenero=(isset($_POST['txtGenero']))?$_POST['txtGenero']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtNacimiento=(isset($_POST['txtNacimiento']))?$_POST['txtNacimiento']:"";
$txtContrasena=(isset($_POST['txtContrasena']))?$_POST['txtContrasena']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

if ($accion) {
    $sentenciaSQL= $conexion->prepare("INSERT INTO usuario (alias,nombre,genero,email,fecha_nac,contrasena) VALUES (:alias,:nombre,:genero,:email,:fecha_nac,:contrasena);");
    $sentenciaSQL->bindParam(':alias',$txtAlias);
    $sentenciaSQL->bindParam(':nombre',$txtNombre);
    $sentenciaSQL->bindParam(':genero',$txtGenero);
    $sentenciaSQL->bindParam(':email',$txtEmail);
    $sentenciaSQL->bindParam(':fecha_nac',$txtNacimiento);
    $sentenciaSQL->bindParam(':contrasena',$txtContrasena);

    $sentenciaSQL->execute();
    header("Location:index.php");
}

?>

    <div id="index" class="container">
        <div class="row">
            <form id="registro" method="POST" enctype="multipart/form-data">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="alias" class="col-form-label">Alias:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="alias" class="form-control" name="txtAlias" id="txtAlias" value="<?php echo $txtAlias; ?>" placeholder="Alias" minlength="5" maxlength="15" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="nombre" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre Completo" minlength="3" maxlength="30" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="nombre" class="col-form-label">Género:</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="txtGenero" id="txtGenero" value="<?php echo $txtGenero; ?>" aria-label="Default select example" required>
                            <option selected>Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="correo" class="col-form-label">Correo Electrónico:</label>
                    </div>
                    <div class="col-auto">
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo $txtEmail; ?>" placeholder="Email" minlength="5" maxlength="50" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="date" id="nacimiento" class="form-control" name="txtNacimiento" id="txtNacimiento" value="<?php echo $txtNacimiento; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="password" class="col-form-label">Contraseña:</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="password" class="form-control" name="txtContrasena" id="txtContrasena" value="<?php echo $txtContrasena; ?>" aria-describedby="passwordHelpInline" placeholder="letras, números, etc." minlength="8" maxlength="16" required>
                    </div>
                </div>
                <div id="btn_jugar" class="col">
                    <input id="btnregistrar" type="submit" class="btn btn-lg" name="accion" value="REGISTRAR">
                </div>
            </form>
        </div>
    </div>

<?php include("template/pie.php"); ?>