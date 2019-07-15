<?php
require 'funciones.php';
require 'src/Entities/User.php';
require 'src/Validators/UserValidator.php';

$errors=[];

if(!empty($_POST)){

$name=$_POST['nombre'];
  $lastName=$_POST['apellido'];
  $partner=$_POST['socio'];
  $sex=$_POST['sexo'];
  $email=$_POST['email'];
  $activity=$_POST['actividad'];
  $password=$_POST['password'];

  if (!isset($name)) {
    $errors['nombre'][]= 'Falta el campo nombre';
  }
  else {
    if (empty($name)) {
      $errors['nombre'][]= 'El nombre es requerido';
    }
  }
  if (!isset($lastName)) {
    $errors['apellido'][]= 'Falta el campo apellido';
  }
  else {
    if (empty($lastName)) {
      $errors['apellido'][]= 'El apellido es requerido';
    }
  }
  if (!isset($activity)) {
    $errors['actividad'][]= 'Falta el campo actividad';
  }

  if (!isset($partner)) {
    $errors['socio'][]= 'Falta el campo numero de socio';
  }
  else {
    if (!is_numeric($partner)) {
      $errors['socio'][]= 'Ingrese un valor numerico';
    }
  }

  if (!isset($sex)) {
    $errors['sexo'][]= 'Falta el campo sexo';
  }

  if (!isset($email)) {
    $errors['email'][]= 'Falta el campo email';
  }
  else {
    if (empty($email)) {
      $errors['email'][]= 'El email es requerido';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'][]= 'El email no es valido';
    }

  }
  if (isset($password) && isset($_POST['confpassword'])  ) {
    if (empty($password)) {
      $errors['password'][]= 'El password es requerido';
    }
    if (empty($_POST['confpassword'])) {
      $errors['confpassword'][]= 'El password de confirmacion es requerido';
    }
    if(strlen($password) < 5 || strlen($password) > 12) {
      $errors['password'][]= 'La contraseña debe ser mayor a 5 y menor a 12 caracteres';
    }
    if ($password!=$_POST['confpassword']) {
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
  $existe='';
      $db= conexion();
    $socios = $db-> prepare("SELECT email FROM users WHERE email=:email");
    $socios->bindValue(":email", $email);

      $socios->execute();
      foreach ($socios as  $socio) {
        $existe=$socio['email'];
      }
      if ($existe!=''){
      $errors['coincidirmail'][]= 'El mail ya existe';
      }

       if (empty($errors)) {

  $user= new User;
  $user->setNombre($_POST['nombre']);
  $user->setApellido($_POST['apellido']);
  $user->setSocio($_POST['socio']);
  $user->setSexo($_POST['sexo']);
  $user->setEmail($_POST['email']);
  $user->setPassword($_POST['password']);


  if (!$user->buscarUsuarioRegistrado()) {
     header('location:home.php');
  } else {
      $errors='Usuario Registrado';
  }
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
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="email" placeholder="Email"  name="email" value="<?= $_POST['email'] ?? ''?>">
        <p> <?= $errors['email'][0] ?? '' ?> </p>
        <p> <?= $errors['coincidirmail'][0] ?? '' ?> </p>
      </div>
        <div class="form-group">
          <select class="custom-select d-block w-100" name="actividad" value="<?= $_POST['actividad'] ?? ''?>">
            <option disabled selected>Actividad Favorita</option>
            <option value="ft" <?= (isset($_POST['actividad']) && $_POST['actividad']=='ft')? 'selected' : '' ?>>Futbol</option>
            <option value="hc" <?= (isset($_POST['actividad']) && $_POST['actividad']=='hc')? 'selected' : '' ?>>Hockey</option>
            <option value="bq" <?= (isset($_POST['actividad']) && $_POST['actividad']=='bq')? 'selected' : '' ?>>Basquet</option>
          </select>
          <p>  <?= $errors['actividad'][0] ?? '' ?> </p>
        <div class="form-group">
          <p align="left">Selecciona tu imagen de perfil</p>
          <input type="file" id="avatar" placeholder="avatar"  name="avatar">
          <p> <?= $errors['avatar'][0] ?? '' ?> </p>
        </div>
        <div class="form-group">
          <p align="left">Ingresa tu sexo: </p>
          <input type="radio" name="sexo"  value="F"> Femenino
          <input type="radio" name="sexo"  value="M"> Masculino
          <input type="radio" name="sexo" value="N"> No definido
          <p> <?= $errors['sexo'][0] ?? '' ?> </p>
        </div>
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
         <p><?= $errors ? 'El mail ya esta registrado' : ''?></p>

        <article class="condiciones">
          <p> <br>Al continuar aceptas las <b>Condiciones del servicio </b> y la
            <b>Política de la privacidad </b> de MiClub </p>
          <p><b>¿Ya eres miembro? <a href="login.php">Inicia Sesión</a></b></p> <a href="#"></a>
        </article>

      </form>
      </article>
    </section>
    <?php
    include_once ("footer.php");
     ?>
  </body>
</html>