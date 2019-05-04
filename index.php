<?php
include_once ("header.php");
 ?>


 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <title>nombre</title>
  </head>

  <body>
    <section class="home">
      <article>
        <h1>
          logo principal
        </h1>
        <h1>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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
          <h2>Contactanos</h2>
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
        <form>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputPassword4">Nombre</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Ingresar nombre">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Apellido</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Ingresar apellido">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Ingresar Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Comentario</label>
      <textarea name="name" rows="4" cols="50"></textarea>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
      </div>

    </section>

  </body>

  <?php
  include_once ("footer.php");
   ?>
</html>
