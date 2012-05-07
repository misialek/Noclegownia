<?php
include_once '../db.php';
include_once '../lib/Uzytkownik.php';
class Noclegownia{
  private $id;
  private $nazwa;
  private $miejscowosc;
  private $kod_pocztowy;
  private $ulica;
  private $opis;
  private $ocena;
  private $typ;
  private $status;
  private $zdjecie;
  const WSZYSTKIE_KOLUMNY = "noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie";

  function __construct(){
    $args = func_get_args();
    if(count($args) == 1 && is_array($args)){
      $this->id = $args[0]['id'];
      $this->nazwa = $args[0]['nazwa'];
      $this->miejscowosc = $args[0]['miejscowosc'];
      $this->kod_pocztowy = $args[0]['kod_pocztowy'];
      $this->ulica = $args[0]['ulica'];
      $this->opis = $args[0]['opis'];
      $this->ocena = $args[0]['ocena'];
      $this->typ  = $args[0]['typ'];
      $this->status = $args[0]['status'];
      $this->zdjecie = $args[0]['zdjecie'];
    } else{
      $this->id = $args[0];
      $this->nazwa = $args[1];
      $this->miejscowosc = $args[2];
      $this->kod_pocztowy = $args[3];
      $this->ulica = $args[4];
      $this->opis = $args[5];
      $this->ocena = $args[6];
      $this->typ  = $args[7];
      $this->status = $args[8];
      $this->zdjecie = $args[9];
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

  public static function doSelectDostepneNoclegownie($userId, $userType = Uzytkownik::RECEPCJONISTA){
    global $polaczenie;
    $query = "";
    if($userType == Uzytkownik::RECEPCJONISTA){
      $query = sprintf("SELECT " . self::WSZYSTKIE_KOLUMNY . " FROM noclegownia, uzytkownik
                        WHERE uzytkownik.id = '%s' && uzytkownik.id_miejsce = noclegownia.id
                        ORDER BY noclegownia.nazwa",
                        mysql_real_escape_string($userId));
    } else if($userType == Uzytkownik::ADMIN){
      $query = sprintf("SELECT " . self::WSZYSTKIE_KOLUMNY . " FROM noclegownia");
    } else {
      throw new Exception("Uzytkownik nie ma dostepu");
    }

    $result = mysql_query($query,$polaczenie);
    if(!$result){
      throw new Exception("Blad pobierania noclegowni");
    }
    $results = array();
    while($row = mysql_fetch_assoc($result)){
      $results[] = new Noclegownia($row);
    }
    return $results;
  }
}

?>
