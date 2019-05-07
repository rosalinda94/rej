<?php
include_once 'header.php';
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
      <form>
        <div class="form-group">
          <input type="text" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" placeholder="Contraseña">
        </div>
        <input type="button" name="boton" value="Iniciar Sesion" id="boton"><br>
        <p class="condiciones"> o</p>
        <input type="button" name="boton" value="Continuar con facebook" id="boton-face">
        <article class="condiciones">
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
