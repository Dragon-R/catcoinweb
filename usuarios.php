<?php 
include("models/bd.php"); 

$sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listaUsuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("template/cabecera.php"); ?>

    <div id="usuarios" class="container">
        <div class="row">
            <div class="col">
                <h1>Lista de Usuarios</h1>
                <table id="tab_usuarios" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alias</th>
                            <th>Nombres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaUsuario as $usuario) { ?>
                        <tr>
                            <td><?php echo $usuario['alias']; ?></td>
                            <td><?php echo $usuario['nombres']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include("template/pie.php"); ?>