<?php
include_once ("header.php");
 ?>


 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>BUDDY</title>
  </head>

  <body>
    <section class="home">
      <article>
        <img src="img/logo2-01.png" alt="logo">
        <h1 class="web">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </h1>
        <h1 class="mobile">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </h1>
      </article>
    </section>

    <section class="nosotros">
      <h2>Sobre nosotros</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </section>
    <section class="contacto">
        <div class="izquierda">
        <article class="contactos">
          <h2>Conoce más</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </article>
        <article class="datos">
          <h4>Nuestra oficina</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In inventore corporis architecto? Dicta quod, non.</p>
          <br>
          <h4>telefonos</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In inventore corporis architecto? Dicta quod, non.</p>
        </article>
      </div>

      <div class="derecha">
        <h2>contactanos</h2>
        <form class="mi-mensaje">
  <div class="form-contacto">
    <div class="nombres">
      <div class="form-group col-md-6">
        <label for="inputPassword4">Nombre</label>
        <input type="text" class="form-control" id="inputPassword4" placeholder="Ingresar nombre">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Apellido</label>
        <input type="text" class="form-control" id="inputPassword4" placeholder="Ingresar apellido">
      </div>
    </div>
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Ingresar Email">
    </div>
    <div class="form-group col-md-8">
      <label for="inputEmail4">Comentario</label>
      <textarea name="name" rows="4" cols="50" class="comentario">Escribí tu compentario acá...</textarea>
    </div>
  </div>

  <button type="submit" class="primary">Enviar</button>
</form>
      </div>

    </section>

  </body>

  <?php
  include_once ("footer.php");
   ?>
</html>
