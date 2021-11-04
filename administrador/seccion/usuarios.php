<?php include("../template/cabecera.php"); ?>
<?php 
include("../config/bd.php");

$txtId_usuario=(isset($_POST['txtId_usuario']))?$_POST['txtId_usuario']:"";
$txtAlias=(isset($_POST['txtAlias']))?$_POST['txtAlias']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtGenero=(isset($_POST['txtGenero']))?$_POST['txtGenero']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtNacimiento=(isset($_POST['txtNacimiento']))?$_POST['txtNacimiento']:"";
$txtContrasena=(isset($_POST['txtContrasena']))?$_POST['txtContrasena']:"";
$txtPais=(isset($_POST['txtPais']))?$_POST['txtPais']:"";
$txtCiudad=(isset($_POST['txtCiudad']))?$_POST['txtCiudad']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch ($accion) {
    case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO usuario (alias,nombre,genero,email,fecha_nac,contrasena,pais,ciudad,direccion) VALUES (:alias,:nombre,:genero,:email,:fecha_nac,:contrasena,:pais,:ciudad,:direccion);");
        $sentenciaSQL->bindParam(':alias',$txtAlias);
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':genero',$txtGenero);
        $sentenciaSQL->bindParam(':email',$txtEmail);
        $sentenciaSQL->bindParam(':fecha_nac',$txtNacimiento);
        $sentenciaSQL->bindParam(':contrasena',$txtContrasena);
        $sentenciaSQL->bindParam(':pais',$txtPais);
        $sentenciaSQL->bindParam(':ciudad',$txtCiudad);
        $sentenciaSQL->bindParam(':direccion',$txtDireccion);

        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
    case "Modificar":
        $sentenciaSQL= $conexion->prepare("UPDATE usuario SET alias=:alias, nombre=:nombre, genero=:genero, email=:email, fecha_nac=:fecha_nac, contrasena=:contrasena, pais=:pais, ciudad=:ciudad, direccion=:direccion WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':alias',$txtAlias);
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':genero',$txtGenero);
        $sentenciaSQL->bindParam(':email',$txtEmail);
        $sentenciaSQL->bindParam(':fecha_nac',$txtNacimiento);
        $sentenciaSQL->bindParam(':contrasena',$txtContrasena);
        $sentenciaSQL->bindParam(':pais',$txtPais);
        $sentenciaSQL->bindParam(':ciudad',$txtCiudad);
        $sentenciaSQL->bindParam(':direccion',$txtDireccion);
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);

        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
    case "Cancelar":
        header("Location:usuarios.php");
        break;
    case "Seleccionar":
        $sentenciaSQL= $conexion->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        $usuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
        $txtId_usuario=$usuario['id_usuario'];
        $txtAlias=$usuario['alias'];
        $txtNombre=$usuario['nombre'];
        $txtGenero=$usuario['genero'];
        $txtEmail=$usuario['email'];
        $txtNacimiento=$usuario['fecha_nac'];
        $txtContrasena=$usuario['contrasena'];
        $txtPais=$usuario['pais'];
        $txtCiudad=$usuario['ciudad'];
        $txtDireccion=$usuario['direccion'];
        break;
    case "Borrar":
        $sentenciaSQL= $conexion->prepare("DELETE FROM metodo_pago WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        $sentenciaSQL= $conexion->prepare("DELETE FROM gana WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        $sentenciaSQL= $conexion->prepare("DELETE FROM juego WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        $sentenciaSQL= $conexion->prepare("DELETE FROM usuario WHERE id_usuario=:id_usuario");
        $sentenciaSQL->bindParam(':id_usuario',$txtId_usuario);
        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM usuario");
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
                    <label for="txtId_usuario">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtId_usuario; ?>" name="txtId_usuario" id="txtId_usuario" placeholder="ID">
                </div>
                <div class = "form-group">
                    <label for="txtAlias">Alias:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtAlias; ?>" name="txtAlias" id="txtAlias" placeholder="Alias">
                </div>
                <div class = "form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre de Usuario">
                </div>
                <div class = "form-group">
                    <label for="txtGenero">Genero:</label>
                    <select class="form-select" name="txtGenero" id="txtGenero" value="<?php echo $txtGenero; ?>" aria-label="Default select example" required>
                        <option selected>Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </div>
                <div class = "form-group">
                    <label for="txtEmail">Correo Electrónico:</label>
                    <input type="email" required class="form-control" value="<?php echo $txtEmail; ?>" name="txtEmail" id="txtEmail" placeholder="Correo Electrónico">
                </div>
                <div class = "form-group">
                    <label for="txtNacimiento">Fecha de Nacimiento:</label>
                    <input type="date" required class="form-control" value="<?php echo $txtNacimiento; ?>" name="txtNacimiento" id="txtNacimiento">
                </div>
                <div class = "form-group">
                    <label for="txtContrasena">Contraseña:</label>
                    <input type="password" required class="form-control" value="<?php echo $txtContrasena; ?>" name="txtContrasena" id="txtContrasena" placeholder="letras, números, etc.">
                </div>
                <div class = "form-group">
                    <label for="txtPais">País:</label>
                    <input type="text" class="form-control" value="<?php echo $txtPais; ?>" name="txtPais" id="txtPais" placeholder="Pais de origen">
                </div>
                <div class = "form-group">
                    <label for="txtCiudad">Ciudad:</label>
                    <input type="text" class="form-control" value="<?php echo $txtCiudad; ?>" name="txtCiudad" id="txtCiudad" placeholder="Ciudad de origen">
                </div>
                <div class = "form-group">
                    <label for="txtDireccion">Dirección:</label>
                    <input type="text" class="form-control" value="<?php echo $txtDireccion; ?>" name="txtDireccion" id="txtDireccion" placeholder="Dirección actual">
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
                <th>ID</th>
                <th>Alias</th>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Email</th>
                <th>Nacimiento</th>
                <th>Contraseña</th>
                <th>País</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaUsuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['id_usuario']; ?></td>
                <td><?php echo $usuario['alias']; ?></td>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['genero']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['fecha_nac']; ?></td>
                <td><?php echo $usuario['contrasena']; ?></td>
                <td><?php echo $usuario['pais']; ?></td>
                <td><?php echo $usuario['ciudad']; ?></td>
                <td><?php echo $usuario['direccion']; ?></td>
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