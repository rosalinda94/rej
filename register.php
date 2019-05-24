<?php
require 'funciones.php';

$errors=[];

if (!empty($_POST)) {

  if (!isset($_POST['nombre'])) {
    $errors['nombre'][]= 'Falta el campo nombre';
  }
  else {
    if (empty($_POST['nombre'])) {
      $errors['nombre'][]= 'El nombre es requerido';
    }
  }
  if (!isset($_POST['apellido'])) {
    $errors['apellido'][]= 'Falta el campo apellido';
  }
  else {
    if (empty($_POST['apellido'])) {
      $errors['apellido'][]= 'El apellido es requerido';
    }
  }
  if (!isset($_POST['actividad'])) {
    $errors['actividad'][]= 'Falta el campo actividad';
  }

  if (!isset($_POST['socio'])) {
    $errors['socio'][]= 'Falta el campo numero de socio';
  }
  else {
    if (!is_numeric($_POST['socio'])) {
      $errors['socio'][]= 'Ingrese un valor numerico';
    }
  }

  if (!isset($_POST['sexo'])) {
    $errors['sexo'][]= 'Falta el campo sexo';
  }

  if (!isset($_POST['email'])) {
    $errors['email'][]= 'Falta el campo email';
  }
  else {
    if (empty($_POST['email'])) {
      $errors['email'][]= 'El email es requerido';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'][]= 'El email no es valido';
    }

  }
  if (isset($_POST['password']) && isset($_POST['confpassword'])  ) {
    if (empty($_POST['password'])) {
      $errors['password'][]= 'El password es requerido';
    }
    if (empty($_POST['confpassword'])) {
      $errors['confpassword'][]= 'El password de confirmacion es requerido';
    }
    if(strlen($_POST['password']) < 5 || strlen($_POST['password']) > 12) {
      $errors['password'][]= 'La contraseña debe ser mayor a 5 y menor a 12 caracteres';
    }
    if ($_POST['password']!=$_POST['confpassword']) {
      $errors['confpassword'][]= 'Las contraseñas no coinciden';
    }
  }
  else {
    $errors['password'][]= 'Falta el campo password';
  }

  if (empty($_FILES['avatar'])) {
    $errors['avatar'][]= 'Agregar la imagen';
  }
  else {
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' ) {
      $errors['avatar'][]= 'La imagen debe ser png, jpg o jpeg';
    } else {
      $hash = md5($_FILES['avatar']['name']) . '.' . $ext;
      $destino= 'uploads/' . $hash;
      move_uploaded_file($_FILES['avatar']['tmp_name'], $destino);
    }
  }


  $json = file_get_contents('archivo.json');
  $usuarios = json_decode($json, true);

  foreach ($usuarios as $usuario){
    if($usuario['email']==$_POST['email']){
        $errors['coincidirmail'][]= 'El mail ya existe';
      }
    if($usuario['socio']==$_POST['socio']){
          $errors['coincidirsocio'][]= 'El socio ya existe';
        }
}

  if (empty($errors)) {
    $usuarios[]=[
      'nombre'=> $_POST['nombre'],
      'apellido'=> $_POST['apellido'],
      'socio'=> $_POST['socio'],
      'avatar'=> $destino,
      'actividad'=> $_POST['actividad'],
      'email'=> $_POST['email'],
      'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT),
    ];

    $json= json_encode($usuarios, JSON_PRETTY_PRINT);

    file_put_contents('archivo.json',$json);

    $user=$_POST['email'];
    session_start();
    $_SESSION["email"]=$user;

    redirect('home.php');

  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include_once 'head.php'; ?>
  <body>
    <?php require 'header.php' ?>
    <section class="register">
      <article id="register">
    		<h2>Te damos la bienvenida a MiCLub</h2>
        <p class="condiciones">Tu equipo más cerca que nunca</p>
      <form class="" action="register.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"
        value="<?= $_POST['nombre'] ?? ''?>">
          <p> <?= $errors['nombre'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" value="<?= $_POST['apellido'] ?? ''?>">
          <p> <?= $errors['apellido'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="socio" placeholder="Nro de socio" name="socio"value="<?= $_POST['socio'] ?? ''?>" >
          <p> <?= $errors['socio'][0] ?? '' ?> </p>
          <p> <?= $errors['coincidirsocio'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <label for="actividad">Actividades</label>
          <select class="" name="actividad" value="<?= $_POST['actividad'] ?? ''?>">
            <option value=""></option>
            <option value="ft" <?= (isset($_POST['actividad']) && $_POST['actividad']=='ft')? 'selected' : '' ?>>Futbol</option>
            <option value="hc" <?= (isset($_POST['actividad']) && $_POST['actividad']=='hc')? 'selected' : '' ?>>Hockey</option>
            <option value="bq" <?= (isset($_POST['actividad']) && $_POST['actividad']=='bq')? 'selected' : '' ?>>Basquet</option>
          </select>
          <p>  <?= $errors['actividad'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="email" placeholder="Email"  name="email" value="<?= $_POST['email'] ?? ''?>">
          <p> <?= $errors['email'][0] ?? '' ?> </p>
          <p> <?= $errors['coincidirmail'][0] ?? '' ?> </p>
        </div>
          <input type="file" id="avatar" placeholder="avatar"  name="avatar">
          <p> <?= $errors['avatar'][0] ?? '' ?> </p>

          <input type="radio" name="sexo" value="f"> Femenino
          <input type="radio" name="sexo" value="m"> Masculino
          <p> <?= $errors['sexo'][0] ?? '' ?> </p>
          <br>

        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
          <p> <?= $errors['password'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirmar contraseña">
          <p> <?= $errors['confpassword'][0] ?? '' ?> </p>
        </div>
        <div class="condiciones">
        </div>
        <input type="submit" name="boton" value="Registrarse" id="boton"><br>

        <article class="condiciones">
          <p> <br>Al continuar aceptas las <b>Condiciones del servicio </b> y la
            <b>Política de la privacidad </b> de MiClub </p>
          <p><b>¿Ya eres miembro? <a href="login.php">Inicia Sesión</a></b></p> <a href="#"></a>
        </article>

      </form>
    	</article>
    </section>
  </body>
</html>
