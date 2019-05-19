<?php
include_once 'header.php';
require 'funciones.php';
$errors=[];

$archivo= file_get_contents("archivo.json");
$usuario= json_decode($archivo, true);

$email= $usuario[0]["email"];
$passwords= $usuario[0]["password"];

function buscarPorEmail($email) {
 $archivo= file_get_contents("archivo.json");
  $usuarios= json_decode($archivo, true);
  foreach ($usuarios as $usuario){
    if($usuario["email"]==$email){
      return $usuario;
    }
  }

}

if (!empty($_POST)) {
    $pass=$_POST['password'];
    $correcto=password_verify($pass, $passwords);
    if (isset ($_POST['email'])) {
      if ($_POST['email']!=$email) {
        $errors[]= 'Error de email';
      }
    }
    if (isset ($_POST['password'])) {
      if ($correcto==false) {
        $errors[]= 'Error de password';
      }
    }
    if (empty($errors)) {
      $_SESSION["email"]=$_POST['email'];
      redirect('home.php');
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
            <b>Politica de la privacidad </b> de Buddy </p>
          <p><b>¿Olvidaste tu contraseña?</b></p>
          <p><b>¿Aún no sos parte de MiClub? <a href="register.php">Registrate</a></b></p>
          </article>
        </article>

      </form>
    	</article>
    </section>
  </body>
</html>

<?php
include_once 'footer.php';
 ?>
