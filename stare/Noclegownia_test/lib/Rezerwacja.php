<?php
include_once "../db.php";
include_once "Pokoj.php";
include_once "Uzytkownik.php";
include_once "Noclegownia.php";

class Rezerwacja{

  private $id_rez;
  private $id_pokoj;
  private $id_user;
  private $data_od;
  private $data_do;
  private $wartosc;
  private $status;
  //const WSZYSTKIE_KOLUMNY = "rezerwacje.id_rez, rezerwacje.id_pokoj, rezerwacje.id_user, rezerwacje.data_od, rezerwacje.data_do, rezerwacje.wartosc, rezerwacje.status";

  const NOWA = 0;
  const ODRZUCONA = 3;
  const ZAAKCEPTOWANA = 2;
  function __construct(){
    $args = func_get_args();
    if(count($args) == 1 && is_array($args)){
      $this->id_rez = $args[0]['id_rez'];
      $this->id_pokoj = $args[0]['id_pokoj'];
      $this->id_user = $args[0]['id_user'];
      $this->data_od = $args[0]['data_od'];
      $this->data_do = $args[0]['data_do'];
      $this->wartosc = $args[0]['wartosc'];
      $this->status = $args[0]['status'];
    } else{
      $this->id_rez = $args[0];
      $this->id_pokoj= $args[1];
      $this->id_user = $args[2];
      $this->data_od = $args[3];
      $this->data_do = $args[4];
      $this->wartosc = $args[5];
      $this->status = $args[6];
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

  public function zapiszZmianeStatusu(){
    global $polaczenie;
    $query = "UPDATE rezerwacje SET status = '{$this->status}' WHERE id_rez = {$this->id_rez}";
    $result = mysql_query($query,$polaczenie);
    if(!$result){
      throw new Exception("Blad zapisu do bazy");
    }
  }
  public static function pobierzRezerwacjeDlaZarzadncy(Uzytkownik $user){
    global $polaczenie;
    $user->__get('id');
    $query = "";
    $now = time();
    if($user->__get('typ_konta')==Uzytkownik::ADMIN){
      $query =
        "SELECT
            rezerwacje.id_rez, rezerwacje.id_pokoj, rezerwacje.data_od, rezerwacje.data_do, rezerwacje.wartosc, rezerwacje.login,
            concat(klient.login, ': ', klient.imie, ' ', klient.nazwisko) AS klient_nazwa,
            noclegownia.id AS id_miejsca, noclegownia.nazwa AS nazwa_miejsca, noclegownia.miejscowosc AS miejscowosc_miejsca,
            pokoj.tytul
          FROM rezerwacje
            JOIN pokoj ON rezerwacje.id_pokoj = pokoj.id_pok
            JOIN noclegownia ON pokoj.id_miejsce = noclegownia.id
            JOIN uzytkownik AS klient ON rezerwacje.login = klient.login
          WHERE rezerwacje.data_do > $now AND rezerwacje.status = ". self::NOWA ." ORDER BY rezerwacje.id_rez";
    } else if($user->__get('typ_konta')==Uzytkownik::RECEPCJONISTA){
      $query =
        "SELECT
          rezerwacje.id_rez, rezerwacje.id_pokoj, rezerwacje.data_od, rezerwacje.data_do, rezerwacje.wartosc,rezerwacje.login,
          concat(klient.login, ': ', klient.imie, ' ', klient.nazwisko) AS klient_nazwa,
          noclegownia.id AS id_miejsca, noclegownia.nazwa AS nazwa_miejsca, noclegownia.miejscowosc AS miejscowosc_miejsca,
          pokoj.tytul
        FROM rezerwacje
          JOIN pokoj ON rezerwacje.id_pokoj = pokoj.id_pok
          JOIN noclegownia ON pokoj.id_miejsce = noclegownia.id
          JOIN uzytkownik AS klient ON rezerwacje.login = klient.login
          JOIN uzytkownik as zarzadca ON zarzadca.id_miejsce = noclegownia.id
        WHERE rezerwacje.data_do > $now AND rezerwacje.status = ". self::NOWA ." AND zarzadca.id = {$user->__get('id')}
        ORDER BY rezerwacje.id_rez";
    }

    $result = mysql_query($query,$polaczenie);

    if(!$result){
      throw new Exception("Blad pobierania rezerwacji");
    }
    $rezerwacje = array();
    while($row = mysql_fetch_assoc($result)){
      $rezerwacja = new Rezerwacja($row['id_rez'], $row['id_pokoj'], $row['login'], $row['data_od'], $row['data_do'], $row['wartosc'], 0);
      $nazwa_klienta = $row['klient_nazwa'];
      $noclegownia = new Noclegownia($row['id_miejsca'], $row['nazwa_miejsca'], $row['miejscowosc_miejsca'],'' , '', '', '', '', '', '');
      $pokoj = $row['tytul'];
      $rezerwacje[] = array('rezerwacja' => $rezerwacja, 'nazwa_klienta' => $nazwa_klienta, 'noclegownia' => $noclegownia, 'pokoj' => $pokoj);
    }
    return $rezerwacje;
  }

}

?>
