<?php
class UserValidator{
  private $user;

  private $errors=[];

  public function __construct(array $data){
    $this->user=$data;
  }

  public function validate(){
    if(!filter_var($this->user['email'], FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = 'El email no es valido';
    }


  }

  public function addError($errors){
    if(empty($this->user['login'])){
      $errors[]='El usuario no esta registrado';
    }
  }


  public function getError($field){
    return $this->errors[$field] ?? '';
  }

  public function isValid(){
    return empty($this->errors);
  }
}

?>
