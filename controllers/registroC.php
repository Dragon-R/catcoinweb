<?php 
    include("models/bd.php");

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

/*     session_start();
    if ($_POST) {
        if (($_POST['user']==$txtAlias) && ($_POST['contrasena']==$txtContrasena)) {
            $_SESSION['user']="ok";
            $_SESSION['userName']=$txtAlias;
            header('Location:index.php');
        }else{
            $mensaje="Error: El usuario o contraseña son incorrectos";
        }
    } */
?>