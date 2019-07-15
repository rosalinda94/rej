<?php
require 'funciones.php';
require 'src/Entities/User.php';
require 'src/Validators/UserValidator.php';

$errors='';

if(!empty($_POST)){
  $user= new User;
  $user->setEmail($_POST['email']);
  $user->setPassword($_POST['password']);

  if ($user->buscar()) {
    session_start();

    $_SESSION[$user];
        // guardarlo en la variable session

    // redirigir
     header('location:home.php');
  } else {
    $errors=true;
  }


/*
  try {
    $pdo= new PDO('mysql:dbname=miclub;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql= 'INSERT INTO users (email,password, created_at) VALUES (:email,:password, :created_at)';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue('email', $user->getEmail());
    $stmt->bindValue('password',$user->getPassword());
    $stmt->bindValue('created_at', $user->getRegistrationDate()->format('Y-m-d H:m:s'));

    $result=$stmt->execute();
  } catch (\Exception $e) {
    die('Error al guardar en la base de datos');
  }*/
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
        <p><?= $errors ? 'No se encontro el usuario' : ''?></p>

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
