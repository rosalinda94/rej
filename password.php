<?php

require 'funciones.php';

$errors=[];
$encontrado=0;

if (!empty($_POST)) {
  $email=$_POST['email'];
  $partner=$_POST['socio'];
  $password=$_POST['password'];

  function buscarUsuario($email, $partner, $password) {
  /*CONSULTO EN LA BASE DE DATOS SI EXISTEN ESTOS CAMPOS*/
    $db= conexion();
    // Busco al usuario
    $socios = $db-> prepare("SELECT email,partner  FROM person WHERE email=:email");
    $socios->bindValue(":email", $email);
    $socios->execute();

    foreach ($socios as $socio){
      if($socio["email"]==$email && $socio["partner"]==$partner ){
        $pass= password_hash($password,PASSWORD_DEFAULT);
        //Modifico la contraseña

        $update = $db-> prepare("UPDATE users SET password=$pass WHERE email= :email");
        $update->bindValue(":email", $email);
        $update->execute();

        // Ingreso en la tabla login el cambio de contraseña
        $user = $db-> prepare("INSERT INTO login (id, email, action, date)
        VALUES (null,:email, 'Modifico Contraeña',NOW())");
        $user->bindValue(":email", $email);
        $user->execute();
        return $socio;
      }
    }
  }
  if (buscarUsuario($email, $partner, $password)) {
     header('location:index.php');
  } else {
    $errors[]='Socio no registrado';
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
    		<h2>Restaurar la contraseña de MiClub</h2>
        <p class="condiciones">Necesitamos esta información para encontrar tu cuenta.</p>
      <form class="" action="password.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
          <p> <?= $errors['nombre'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="socio" name="socio" placeholder="Nro de Socio">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Nueva Contraseña">
        </div>
        <div class="condiciones">
          <?php foreach ($errors as $error) {
            echo $error;
            echo '<br>';
          } ?>
        </div>
        <input type="submit" name="boton" value="Restaurar contraseña" id="boton"><br>

      </form>
    	</article>
    </section>
    <?php
    include_once 'footer.php';
     ?>
  </body>
</html>
