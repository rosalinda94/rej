<?php
include_once ("head.php");


 ?>
    <header>
      <nav class="header">
        <div class="header-izq">
        <ul class="logo">
          <li><a href="home.php"><img src="img/logo-blanco.png" alt=""></a></li>
        </ul>
        <ul class="links-home">
          <li><a href="home.php" style="text-decoration:none">Inicio</a></li>
          <li><a href="profile.php" style="text-decoration:none">Perfil</a></li>
          <li><a href="inbox.php" style="text-decoration:none">Mensajes</a></li>
        </ul>
        </div>

        <ul class="header-der">
          <input type="search" placeholder="Buscar...">
          <li><a class="notification-picture" href="notification.php"><img src="img/campana1.png" alt=""></a></li>
          <li><a class="profile-picture" href="profile.php"><img src="img/foto-perfil.jpg" alt=""></a></li>
        </ul>


        <ul class="emobile-home">
          <input type="search" placeholder="Buscar...">
          <li><a href="notification.php"><img src="img/campana1.png" alt=""></a></li>
          <li><a href="profile.php"><img src="img/foto-perfil.jpg" alt=""></a></li>
          <select class="" name="">
            <option disabled selected></option>
            <option value="fel">Feliz</option>
          </select>
        </ul>
      </nav>
    </header>
