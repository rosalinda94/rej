<?php
include_once ("header-home.php");
include_once ("head.php");
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body class="body">
    <div class="home-logueado">
    <section class="aside">
      <article class="profile-aside">
        <a class="profile-picture" href="profile.php"><img src="img/foto-perfil.jpg" alt=""></a>
        <!-- poner el nombre del usuario -->
        <a class="profile-picture" href="profile.php"><h3 class="user-name">Maria Juana Perez</h3></a>
      </article>

      <article class="Accesos-directos">
        <h4>Accesos Directos</h4>
        <ul>
          <li><i class="fas fa-futbol"></i>Futbol Masculino</li>
          <li><i class="far fa-futbol"></i>Fútbol Femenino</li>
          <li><i class="fas fa-child"></i>Colonia de Vacaciones</li>
        </ul>
      </article>

      <article class="Listado-completo">
        <h4>Institucional</h4>
        <h4>Noticias</h4>
        <h4>Nuestra historia</h4>
        <h4>Polideportivo</h4>
        <ul>
          <li><b>FEDERADOS</b></li>
          <ul>
            <li><i class="fas fa-futbol"></i>Futbol Masculino</li>
            <li><i class="far fa-futbol"></i>Fútbol Femenino</li>
            <li><i class="fas fa-basketball-ball"></i>Basquet</li>
            <li><i class="fas fa-volleyball-ball"></i>Voley</li>
            <li><i class="fas fa-baseball-ball"></i>Tenis</li>
            <li><i class="fas fa-user"></i>Deportes adaptados</li>
            <li><i class="fas fa-user-ninja"></i>Taekwondo</li>
          </ul>
          <li><b>RECREATIVOS</b></li>
          <ul>
            <li><i class="fas fa-child"></i>Colonia de Vacaciones</li>
            <li><i class="fas fa-dumbbell"></i>Gimnasio</li>
            <li><i class="fas fa-running"></i>Running</li>
          </ul>
        </ul>
      </article>
    </section>

<!-- inicio home principal -->

    <section class="principal">
      <article class="publicar">
        <div class="que-pensas">
          <a class="profile-picture" href="profile.php"><img src="img/foto-perfil.jpg" alt=""></a>
          <textarea name="name" rows="1" cols="70" class="comentario" placeholder="¿Qué estas pensando...?"></textarea>
        </div>
        <div class="que-publicar">
          <label for="file-upload" class="custom-file-upload" style="width:120px;">
            <i class="fa fa-cloud-upload"></i> Foto / video
          </label>
          <input id="file-upload" type="file"/>
          <button style="width:120px;">Etiquetar</button>
          <input type="text" name="" value="">
          <select class="sentimiento-select" name="Sentimiento" style="width:120px;">
            <option disabled selected>Sentimiento</option>
            <option value="fel">Feliz</option>
            <option value="tr">Triste</option>
            <option value="ag">Agradecido</option>
            <option value="en">Enamorado</option>
            <option value="loc">Loco</option>
            <option value="gen">Genial</option>
            <option value="rel">Relajado</option>
            <option value="eno">Enojado</option>
          </select>
          <button type="submit" name="ok"><i class="fas fa-check"></i></button>
        </div>
      </article>
      <article class="publicacion">
        <div class="">
          <a class="profile-picture" href="profile.php"><img src="img/foto-perfil.jpg" alt=""></a>
          <!-- poner el nombre del usuario -->
          <p>Maria Juana Perez</p>
          <p>horario</p>
        </div>
        <div class="publicacion-user">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="publicacion-imagenes">
          <img src="img/img1.png" alt="">
          <img src="img/img1.png" alt="">
          <img src="img/img1.png" alt="">
          <img src="img/img1.png" alt="">
        </div>
        <div class="publicacion-reaccion">
          <ul>
            <li>personas que le gusta</li>
            <li>x comentarios</li>
          </ul>
        </div>
        <div class="publicacion-reaccionar">
          <ul>
            <li>Me gusta</li>
            <li>Comentar</li>
          </ul>
        </div>
        <div class="publicacion-comentarios">
          <a class="profile-picture" href="profile.php"><img src="img/foto-perfil.jpg" alt=""></a>
          <div class="">
            <h5>nombre usuario</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et</p>
            <ul>
              <li>Me gusta</li>
              <li>Responder</li>
              <li>fecha/hora</li>
            </ul>
          </div>
        </div>
        <textarea name="name" rows="2" cols="70" placeholder="Escribí aca tu comentario..."></textarea>
        <button type="submit" name="ok">1</button>
      </article>
    </section>

    <section class="aside2">
      <article class="publicidad">
        publicidad
      </article>
      <article class="calendario">
        calendario
      </article>
    </section>
    </div>
  </body>
</html>
