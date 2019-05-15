<?php
include_once 'header.php';
require 'funciones.php';

$emails='emilia_segura@hotmail.com';
$passwords=123;
$errors=[];

if (!empty($_POST)) {
    if (isset ($_POST['email'])) {
      if ($_POST['email']!=$emails) {
        $errors[]= 'Error de email';
      }
    }
    if (isset($_POST['password'])) {
      if ($_POST['password']!=$passwords) {
        $errors[]= 'Error de password';
      }
    }
    if (empty($errors)) {
      redirect('home.php');
    }
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
  </head>
  <body>
    <section class="login">
      <article id="login">
    		<h2>Te damos la bienvenida a Buddy</h2>
        <p class="condiciones">Encontrá a tu mascota ideal</p>
      <form class="" action="login.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
        </div>
        <div class="">
          <?php foreach ($errors as $error) {
            echo $error;
            echo '<br>';
          } ?>
        </div>
        <input type="submit" name="boton" value="Iniciar Sesion" id="boton"><br>
        <p class="condiciones"> o</p>

          <p> <br>Al continuar aceptas las <b>Condiciones del servicio </b> y la
            <b>Politica de la privacidad </b> de Buddy </p>
          <p><b>¿Olvidaste tu contraseña?</b></p>
          <p><b>¿Aun no estas en Buddy? <a href="register.php">Registrate</a>  </b></p>
        </article>

      </form>
    	</article>
    </section>
  </body>
</html>

<?php
include_once 'footer.php';
 ?>
