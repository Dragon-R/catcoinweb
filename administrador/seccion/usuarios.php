<?php include("../template/cabecera.php"); ?>
<?php 
include("../config/bd.php");

$txtId_usuario=(isset($_POST['txtId_usuario']))?$_POST['txtId_usuario']:"";
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

switch ($accion) {
    case "Agregar":
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
        header("Location:usuarios.php");
        break;
    case "Modificar":
        $sentenciaSQL= $conexion->prepare("UPDATE usuarios SET alias=:alias, nombres=:nombres, apellidos=:apellidos, genero=:genero, correo=:correo, contrasena=:contrasena, nacimiento=:nacimiento, pais=:pais, ciudad=:ciudad WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':alias',$txtAlias);
        $sentenciaSQL->bindParam(':nombres',$txtNombres);
        $sentenciaSQL->bindParam(':apellidos',$txtApellidos);
        $sentenciaSQL->bindParam(':genero',$txtGenero);
        $sentenciaSQL->bindParam(':correo',$txtCorreo);
        $sentenciaSQL->bindParam(':contrasena',$txtContrasena);
        $sentenciaSQL->bindParam(':nacimiento',$txtNacimiento);
        $sentenciaSQL->bindParam(':pais',$txtPais);
        $sentenciaSQL->bindParam(':ciudad',$txtCiudad);
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);

        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
    case "Cancelar":
        header("Location:usuarios.php");
        break;
    case "Seleccionar":
        $sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        $usuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
        $txtId_usuario=$usuario['id_usuario'];
        $txtAlias=$usuario['alias'];
        $txtNombres=$usuario['nombres'];
        $txtApellidos=$usuario['apellidos'];
        $txtGenero=$usuario['genero'];
        $txtCorreo=$usuario['correo'];
        $txtContrasena=$usuario['contrasena'];
        $txtNacimiento=$usuario['nacimiento'];
        $txtPais=$usuario['pais'];
        $txtCiudad=$usuario['ciudad'];
        break;
    case "Borrar":
        $sentenciaSQL= $conexion->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listaUsuarios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Datos de Usuario
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class = "form-group">
                                    <label for="txtAlias">Alias:</label>
                                    <input type="text" required class="form-control" value="<?php echo $txtAlias; ?>" name="txtAlias" id="txtAlias" placeholder="Alias">
                                </div>
                                <div class = "form-group">
                                    <label for="txtNombres">Nombres:</label>
                                    <input type="text" required class="form-control" value="<?php echo $txtNombres; ?>" name="txtNombres" id="txtNombres" placeholder="Nombres">
                                </div>
                                <div class = "form-group">
                                    <label for="txtApellidos">Apellidos:</label>
                                    <input type="text" required class="form-control" value="<?php echo $txtApellidos; ?>" name="txtApellidos" id="txtApellidos" placeholder="Apellidos">
                                </div>
                                <div class = "form-group">
                                    <label for="txtGenero">Genero:</label>
                                    <select class="form-select" name="txtGenero" id="txtGenero" value="<?php echo $txtGenero; ?>" aria-label="Default select example" required>
                                        <option selected>Masculino</option>
                                        <option>Femenino</option>
                                    </select>
                                </div>
                                <div class = "form-group">
                                    <label for="txtCorreo">Correo Electrónico:</label>
                                    <input type="email" required class="form-control" value="<?php echo $txtCorreo; ?>" name="txtCorreo" id="txtCorreo" placeholder="Correo Electrónico">
                                </div>
                                <div class = "form-group">
                                    <label for="txtNacimiento">Fecha de Nacimiento:</label>
                                    <input type="date" required class="form-control" value="<?php echo $txtNacimiento; ?>" name="txtNacimiento" id="txtNacimiento">
                                </div>
                                <div class = "form-group">
                                    <label for="txtPais">País:</label>
                                    <input type="text" class="form-control" value="<?php echo $txtPais; ?>" name="txtPais" id="txtPais" placeholder="Pais de origen">
                                </div>
                                <div class = "form-group">
                                    <label for="txtCiudad">Ciudad:</label>
                                    <input type="text" class="form-control" value="<?php echo $txtCiudad; ?>" name="txtCiudad" id="txtCiudad" placeholder="Ciudad de origen">
                                </div>
                                <div class="btn-group" role="group" aria-label="">
                                    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                                    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                                    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Alias</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Genero</th>
                                <th>Correo</th>
                                <th>Nacimiento</th>
                                <th>País</th>
                                <th>Ciudad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaUsuarios as $usuario) { ?>
                            <tr>
                                <td><?php echo $usuario['alias']; ?></td>
                                <td><?php echo $usuario['nombres']; ?></td>
                                <td><?php echo $usuario['apellidos']; ?></td>
                                <td><?php echo $usuario['genero']; ?></td>
                                <td><?php echo $usuario['correo']; ?></td>
                                <td><?php echo $usuario['nacimiento']; ?></td>
                                <td><?php echo $usuario['pais']; ?></td>
                                <td><?php echo $usuario['ciudad']; ?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="txtId_usuario" id="txtId_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

<?php include("../template/pie.php"); ?>