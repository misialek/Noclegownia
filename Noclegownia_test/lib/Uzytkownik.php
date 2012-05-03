<?php
include_once "../db.php";

class Uzytkownik{
  private $id;
  private $typ_konta;
    const UZYTKOWNIK = 30;
    const RECEPCJONISTA = 20;
    const ADMIN = 10;
  private $imie;
  private $nazwisko;
  private $login;
  private $haslo;
  private $email;
  private $kod;
  private $data;
  private $status;
  private $id_miejsce;
  const WSZYSTKIE_KOLUMNY = "uzytkownik.id, uzytkownik.typ_konta, uzytkownik.imie, uzytkownik.nazwisko, uzytkownik.login, uzytkownik.haslo, uzytkownik.email, uzytkownik.kod, uzytkownik.data, uzytkownik.status, uzytkownik.id_miejsce";

  function __construct(){
    $args = func_get_args();
    if(count($args) == 1 && is_array($args)){
      $this->id = $args[0]['id'];
      $this->typ_konta = $args[0]['typ_konta'];
      $this->imie = $args[0]['imie'];
      $this->nazwisko = $args[0]['nazwisko'];
      $this->login = $args[0]['login'];
      $this->haslo = $args[0]['haslo'];
      $this->email = $args[0]['email'];
      $this->kod = $args[0]['kod'];
      $this->data  = $args[0]['data'];
      $this->status = $args[0]['status'];
      $this->id_miejsce = $args[0]['id_miejsce'];
    } else{
      $this->id = $args[0];
      $this->typ_konta = $args[1];
      $this->imie = $args[2];
      $this->nazwisko = $args[3];
      $this->login = $args[4];
      $this->haslo = $args[5];
      $this->email = $args[6];
      $this->kod = $args[7];
      $this->data  = $args[8];
      $this->status = $args[9];
      $this->id_miejsce = $args[10];
    }
  }

  public function __set($key,$val) {
    $this->$key=$val;
  }
  public function __get($key) {
    $vars = get_object_vars($this);
    foreach($vars as $varKey => $var){
      if($key == $varKey) return $var;
    }
    throw new Exception("No ". $key ." property in object");
  }

  public static function doSelectOneByLogin($login){
    global $polaczenie;
    $query = sprintf("SELECT " . self::WSZYSTKIE_KOLUMNY . " FROM uzytkownik
                      WHERE login = '%s';",
                      mysql_real_escape_string($login));
    $result = mysql_query($query,$polaczenie);
    if(!$result OR mysql_num_rows($result) != 1 ){
      header('Location: ../index.php ');
      die;
      //throw new Exception("Blad pobierania uzytkownika");
    }
    $row = mysql_fetch_assoc($result);
    return $uzytkownik = new Uzytkownik($row);
  }

}
?>
