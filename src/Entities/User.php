<?php
class User{
  private $id;
  private $email;
  private $password;
  private $rawPassword;
  private $registrationDate;
  private $nombre;
  private $apellido;
  private $socio;
  private $sexo;
  private $actividad;

  public function __construct(){
    $tz= new DateTimeZone('America/Argentina/Buenos_Aires');
    $this->registrationDate = new DateTime('now', $tz);
  }

  public function getId() : int{
    return $this->id;
  }

  public function setEmail(string $email){
    $this->email=$email;
  }

  public function getEmail() : string{
    return $this->email;
  }
  public function setPassword(string $password){
    $this->rawPassword = $password;
    $this->password=password_hash($password , PASSWORD_DEFAULT);
  }

  public function getPassword($raw = false) : string{
    if ($raw) {
      return $this->rawPassword;
    }

    return $this->password;
  }

  public function getRegistrationDate(){
    return $this->registrationDate;
  }

  public function save($pdo){

          $sql= 'INSERT INTO users (email,password, created_at) VALUES (:email,:password, :created_at)';

          $stmt = $pdo->prepare($sql);

          $stmt->bindValue('email', $this->getEmail());
          $stmt->bindValue('password',$this->getPassword());
          $stmt->bindValue('created_at', $this->getRegistrationDate()->format('Y-m-d H:m:s'));

          $result=$stmt->execute();
  }



    public function buscar() {
      /*CONSULTO EN LA BASE DE DATOS SI EXISTEN ESTOS CAMPOS*/
        $db= conexion();
        $socios = $db-> prepare("SELECT id, email, password FROM users WHERE email=:email");
        $socios->bindValue(":email", $this->getEmail());
        $socios->execute();

        $results = $socios->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $socio){
          if($socio["email"]== $this->getEmail() && password_verify($this->getPassword(true), $socio['password'])) {
            $this->registerLogin();
            return $socio;
          }
        }

        return false;
      }

      private function registerLogin()
      {
        $db= conexion();
        $user = $db-> prepare("INSERT INTO login (id, email, action, date)
        VALUES (null,:email, 'ingreso',NOW())");
        $user->bindValue(":email", $this->getEmail());
        $user->execute();
      }

      /* ---------------- Register
      /*  $user->setNombre($_POST['nombre']);
        $user->setApellido($_POST['apellido']);
        $user->setSocio($_POST['socio']);
        $user->setSexo($_POST['sexo']);
        $user->setActividad($_POST['actividad']);*/
      public function setNombre(string $nombre){
        $this->nombre=$nombre;
      }

      public function getNombre() : string{
        return $this->nombre;
      }
      //----------------------------------------------------
      public function setApellido(string $apellido){
        $this->apellido=$apellido;
      }

      public function getApellido() : string{
        return $this->apellido;
      }
      //----------------------------------------------------

      public function setSocio(string $socio){
        $this->socio=$socio;
      }

      public function getSocio() : string{
        return $this->socio;
      }
      //----------------------------------------------------
      public function setSexo(string $sexo){
       $this->sexo=$sexo;
      }

      public function getSexo() : string{
       return $this->sexo;
      }
      //----------------------------------------------------
      public function setActividad(string $actividad){
        $this->actividad=$actividad;
      }

      public function getActividad() : string{
        return $this->actividad;
      }
      //----------------------------------------------------

      private function registerUsuario()
      {
        if (buscar()!= false){
          $db= conexion();

          $consulta = $db-> prepare("INSERT INTO person (id, name, lastName, partner, sex, avatar, email)
          VALUES (null,:name, :lastName, :partner, :sex, :avatar, :email)");

          $consulta->bindValue(":name", $name);
          $consulta->bindValue(":lastName", $lastName);
          $consulta->bindValue(":partner", $partner);
          $consulta->bindValue(":sex", $sex);
          $consulta->bindValue(":avatar", $hash);
          $consulta->bindValue(":email", $email);

          $consulta->execute();

          $user = $db-> prepare("INSERT INTO users (id, email, password,created_at)
          VALUES (null,:email, :password, NOW())");

          $user->bindValue(":email", $email);
          $user->bindValue(":password",$password);

          $user->execute();
          redirect('login.php');
        }
        return false;

      }

}


 ?>
