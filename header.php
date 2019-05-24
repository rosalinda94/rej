
    <header>
      <nav class="header">
        <ul class="logo">
          <li><a href="index.php"><img src="img/logo-blanco.png" alt=""></a></li>
        </ul>
        <ul class="links">
          <li><a href="login.php" style="text-decoration:none" <?= $_SESSION['usuario'] ?? ''?>>Iniciar Sesion</a></li>
          <li><a href="register.php" style="text-decoration:none">Registrarse</a></li>
          <li><a href="index.php" style="text-decoration:none">Nosotros</a></li>
          <li><a href="index.php" style="text-decoration:none">Contacto</a></li>
        </ul>

        <ul class="rmobile">
          <li class="hamburgesa"><a href="#">Inicio</a>
            <ul>
              <li><a href="login.php">Ingresar</a>
              <li><a href="register.php">Registrarse</a>
              <li><a href="index.php">Nosotros</a>
              <li><a href="index.php">Contacto</a>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
