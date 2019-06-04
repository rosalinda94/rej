<?php

require 'funciones.php';


$errors=[];

function buscarUsuario($email, $pass) {
  $archivo= file_get_contents("archivo.json");

  $usuarios= json_decode($archivo, true);

  foreach ($usuarios as $usuario){
    if($usuario["email"]==$email && password_verify($pass, $usuario['password'])){
      return $usuario;
    }
  }

  return null;
}

if (!empty($_POST)) {
  if (buscarUsuario($_POST['email'], $_POST['password'])) {
        $_SESSION['nombre']=$_POST['email'];
        echo $_SESSION['nombre'] ;
      //  redirect('index.php');
  } else {

  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include_once 'head.php'; ?>

  <body>
    <?php include_once 'header.php'; ?>

    <section class="login">
      <article id="login">
    		<h2>Bienvenido nuevamente a MiClub</h2>
        <p class="condiciones">Tu equipo más cerca que nunca</p>
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
        <input type="submit" name="boton" value="Iniciar sesión" id="boton"><br>
        <article class="condiciones">
          <p> <br>Al continuar aceptas las <b>Condiciones del servicio </b> y la
            <b>Política de la privacidad </b> de MiClub </p>
          <p><b><a href="password.php">¿Olvidaste tu contraseña?</a></b></p>
          <p><b>¿Aún no sos parte de MiClub? <a href="register.php">Registrate</a></b></p>
          </article>
        </article>

      </form>
    	</article>
    </section>
    <?php
    include_once 'footer.php';
     ?>
  </body>
</html>
