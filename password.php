<?php

require 'funciones.php';

$errors=[];
$encontrado=0;

if (!empty($_POST)) {
        // Busco el json
        $archivo= file_get_contents("archivo.json");
        // Lo coloco como array
        $usuarios= json_decode($archivo, true);
        // Recorro el array
        foreach ($usuarios as $key => $usuario){
          if($usuario["email"]==$_POST["email"] && $usuario["socio"]==$_POST["socio"] ){
            //Modifico la contraseña del usuario
            $usuarios[$key]['password']=  password_hash($_POST['password'],PASSWORD_DEFAULT);
            // coloco una variable para saber si se encontro y luego poder hacer el if
            $encontrado = 1;
            break;
          }
        }
        //Hago el if de que si encontrado tiene algun valor me pase el array a json y se suba
        if ($encontrado!=0){
        $json= json_encode($usuarios, JSON_PRETTY_PRINT);
        file_put_contents('archivo.json',$json);

        $errors[]="Contraseña modificada sastifactoriamente";
      }else{
        $errors[]= "Los datos del socio no son correctos";

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
