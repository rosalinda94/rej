<?php
include_once ("header.php");
include_once ("head.php");


 ?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">

    <link rel="stylesheet" href="css/index.css">


  <body>
    <section class="home">
      <article>
        <img src="img/logo-blanco.png" alt="logo">
        <h1>MI CLUB</h1>
        <h2 class="web">
          Tu equipo, más cerca que nunca
        </h2>
        <h class="mobile">
          Tu equipo, más cerca que nunca
        </h2>
      </article>
    </section>
    <a id="nosotros"></a>
    <section class="nosotros">
      <h2>¿Quiénes somos?</h2>
      <p>
        <?php
        if(isset($_SESSION['nombre'])){
          echo $_SESSION['nombre'];
        }
         ?>
        Somos una Red Social que ayuda a los clubes a comunicarse con sus socios y que los mismos estén atentos y conectados a todas las noticias nuevas de la institución. El socio contará con las distintas opciones de contacto, eligiendo sus actividades favoritas y siguiéndolas minuto a minuto.
      </p>
      <p>
        Nuestro objetivo es lograr que los socios estén conectados en todo momento, que puedan recordar experiencias pasadas, que conozcan sus beneficios y participantes nuevos, como así también conozcan las modificaciones o información importante administrativa. Contectate a través de la computadora o del celular mediante funciones conocidas como grupos, chat y conversaciones instantáneas.
      </p>
    </section>

    <div class="Einfo">
    <section class="Ecomunicacion">
      <article class="texto">
        <h3>Comunicate de manera instantánea en cualquier momento y lugar</h3>
        <p>Terminá con las cadenas de correos electrónicos gracias a las publicaciones instantáneas. </p>
        <p>Conéctate con tus socios como así con tus empleados a través de las distintas opciones de MiClub.
        </p>
      </article>
      <article class="icono">
        <img src="img/icono1.png" alt="icono">
      </article>
    </section>

    <section class="EcomunicacionBlanco">
      <article class="textoIzq">
        <h3>La información que necesitas saber</h3>
        <p>En la sección de noticias podrás visualizar todas las publicaciones de personas y proyectos que te interesan.</p>
        <p>De esta manera, podrás mantenerte al tanto de las novedades importantes de la institución como así de las personas que vos quieras.
        </p>
      </article>
      <article class="icono">
        <img src="img/icono2.png" alt="icono">
      </article>
    </section>

    <section class="Ecomunicacion">
      <article class="texto">
        <h3>Tu grupo favorito</h3>
        <p>Los grupos son espacios privados para debatir, compartir documentos y opinar juntos. Se dividen en las secciones elegidas por la institución, separando así sus deportes como actividades.</p>
        <p>Siendo parte del mismo, podrás enterarte información exclusiva de dicho grupo.
        </p>
      </article>
      <article class="icono">
        <img src="img/icono3.png" alt="icono">
      </article>
    </section>
    </div>

<a id="contacto"></a>
    <section class="contacto">
        <div class="izquierda">
        <article class="contactos">
          <h2>Conoce más</h2>
          <p>Si tenés alguna duda sobre nuestro servicio, podes escribirnos dejandonos tus datos y nombre de la institución. </p>
        </article>
        <article class="datos">
          <h4>Nuestra oficina</h4>
          <p>Leandro N. Alem, 855, piso 27 <br>
            1006 CABA,<br>
            Argentina</p>
          <br>
          <h4>Telefonos</h4>
          <p>0800-999-2343<br>
            Lunes a viernes de 9:00 a 18:00hs</p>
        </article>
      </div>

      <div class="derecha">
        <h2>contactanos</h2>
        <form class="mi-mensaje">
  <div class="form-contacto">
    <div class="nombres">
      <div class="form-group col-md-6">
        <label for="inputPassword4"></label>
        <input type="text" class="form-control" id="inputPassword4" placeholder="Nombre">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4"></label>
        <input type="text" class="form-control" id="inputPassword4" placeholder="Apellido">
      </div>
    </div>
    <div class="form-group col-md-12">
      <label for="inputEmail4"></label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-8">
      <label for="inputEmail4"></label>
      <textarea name="name" rows="4" cols="50" class="comentario">Escribí tu comentario acá...</textarea>
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
