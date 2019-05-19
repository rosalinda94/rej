<?php
include_once 'header.php';
require 'funciones.php';

$errors=[];

if (!empty($_POST)) {
    if (empty($_POST['nombre'])) {
        $errors[]= 'Ingresar un nombre';
    }
    if (empty($_POST['socio'])) {
        $errors[]= 'Ingresar su numero de socio';
    }
    if (empty($_POST['email'])) {
        $errors[]= 'Ingresar el email';
    }
    if (empty($_POST['password'])) {
        $errors[]= 'Ingresar una contraseña';
    }
    if (empty($errors)) {
        $usuario = [
          'nombre' => $_POST['nombre'],
          'email' => $_POST['email'],
          'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      ];
      archivo('archivo.json', $usuario);
      redirect('login.php');
    }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <section class="register">
      <article id="register">
    		<h2>Te damos la bienvenida a MiCLub</h2>
        <p class="condiciones">Tu equipo más cerca que nunca</p>
      <form class="" action="register.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="socio" placeholder="Nro de socio" name="socio">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="email" placeholder="Email"  name="email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
        </div>
        <div class="condiciones">
          <?php foreach ($errors as $error) {
            echo $error;
            echo '<br>';
          } ?>
        </div>
        <input type="submit" name="boton" value="Iniciar Sesion" id="boton"><br>

        <article class="condiciones">
          <p> <br>Al continuar aceptas las <b>Condiciones del servicio </b> y la
            <b>Politica de la privacidad </b> de Buddy </p>
          <p><b>¿Ya eres miembro? <a href="login.php">Inicia Sesión</a></b></p> <a href="#"></a>
        </article>

      </form>
    	</article>
    </section>
  </body>
</html>

<?php
include_once 'footer.php';
 ?>
