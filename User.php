<?php
/**
 * class user melakukan login
 */
class User
{
  private $db;
  private $error;

  function __construct($db_conn){
    $this->db=$db_conn;
    session_start();
  }

  public function Register($nama,$email,$password){
    try {
      $hashPass = password_hash($password,PASSWORD_DEFAULT);

      $query = $this->db->prepare("INSERT INTO tblogin(nama,email,password)
      VALUES (:nama,:email,:password)");

      $query->bindParam(':nama',$nama);
      $query->bindParam(':email',$email);
      $query->bindParam(':password',$hashPass);
      $query->execute();
    } catch (PDOException $e) {
      if($e->errorInfo[0]==23000){
        $this->error = "email sudah digunakan";
        return false;
      }else{
        echo $e->getMessage();
        return false;
      }
    }
  }

  public function login($user,$password){
    try {
      $query = $this->db->prepare("SELECT * FROM tblogin WHERE email=:email");
      $query->bindParam(':email',$email);
      $query->execute();
      $data = $query->fetch();

      if($query->rowCount()>0){
        if(password_verify($password,$data['password'])){
          $_SESSION['user_session'] = $data['id'];
          return true;
        }else{
          $this->error = "email atau password salah!";
          return false;
        }
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function isLogin(){
    if (isset($_SESSION['user_session'])) {
      return true;
    }
  }

  public function getUser(){
    if(!$this->isLogin()){
      return false;
    }
    try {
      $query = $this->db->prepare("SELECT * FROM tblogin WHERE id=:id");
      $query->bindParam(':id',$_SESSION['user_session']);
      $query->execute();
      return $query->fetch();
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function logout(){
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }

  public function getLastError(){
    return $this->error;
  }
}
