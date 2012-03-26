<?php
include_once "../db.php";

class Pokoj{
  private $zdjecie;
  private $id_pok;
  private $id_miejsce;
  private $tv;
  private $lodowka;
  private $wc;
  private $prszynic;
  private $wanna;
  private $jacuzzi;
  private $klimatyzacja;
  private $internet;
  private $zdjecia;
  
  const ID_POK = "pokoj.id_pok";
  const ID_MIEJSCE = "pokoj.id_miejsce";
  const TV = "pokoj.tv";
  const LODOWKA = "pokoj.lodowka";
  const WC = "pokoj.wc";
  const PRSZYNIC = "pokoj.prszynic";
  const WANNA = "pokoj.wanna";
  const JACUZZI = "pokoj.jacuzzi";
  const KLIMATYZACJA = "pokoj.klimatyzacja";
  const INTERNET = "pokoj.internet";
  const ZDJECIA = "pokoj.zdjecia";
  const ZDJECIE = "pokoj.zdjecie";

  function __construct(){
    $args = func_get_args();
    if(count($args) == 1 && is_array($args)){
      $this->zdjecie = $args[0]['zdjecie'];
      $this->id_pok = $args[0]['id_pok'];
      $this->id_miejsce = $args[0]['id_miejsce'];
      $this->tv = $args[0]['tv'];
      $this->lodowka = $args[0]['lodowka'];
      $this->wc = $args[0]['wc'];
      $this->prszynic = $args[0]['prysznic'];
      $this->wanna = $args[0]['wanna'];
      $this->jacuzzi  = $args[0]['jacuzzi'];
      $this->klimatyzacja = $args[0]['klimatyzacja'];
      $this->internet = $args[0]['internet'];
      $this->zdjecia = $args[0]['zdjecia'];
    } else{
      $this->zdjecie = $args[0];
      $this->id_pok = $args[1];
      $this->id_miejsce = $args[2];
      $this->tv = $args[3];
      $this->lodowka = $args[4];
      $this->wc = $args[5];
      $this->prszynic = $args[6];
      $this->wanna = $args[7];
      $this->jacuzzi  = $args[8];
      $this->klimatyzacja = $args[9];
      $this->internet = $args[10];
      $this->zdjecia = $args[11];
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

  public function zapiszNowyPokoj(){
    global $polaczenie;
    $kolumny =  self::ZDJECIE . ", " . self::ID_MIEJSCE . ", " . self::TV . ", " . self::LODOWKA . ", " . self::WC . ", " . self::PRSZYNIC . ", " . self::WANNA . ", " . self::JACUZZI . ", " . self::KLIMATYZACJA . ", " . self::INTERNET;
    $query = sprintf("INSERT INTO pokoj(" . $kolumny . ") values ('%s','%s','%s','%s','%s','%s','%s', '%s', '%s', '%s');",
                      mysql_real_escape_string($this->zdjecie),
                      mysql_real_escape_string($this->id_miejsce),
                      mysql_real_escape_string($this->tv),
                      mysql_real_escape_string($this->lodowka),
                      mysql_real_escape_string($this->wc),
                      mysql_real_escape_string($this->prszynic),
                      mysql_real_escape_string($this->wanna),
                      mysql_real_escape_string($this->jacuzzi),
                      mysql_real_escape_string($this->klimatyzacja),
                      mysql_real_escape_string($this->internet));
    $result = mysql_query($query,$polaczenie);
    if(!$result){
      throw new Exception("Blad zapisu do bazy");
    }
  }

  public static function doSelectByIdNoclegowni($noclegownieIds){
    global $polaczenie;
    $noclegownieIds = implode(', ', $noclegownieIds);

    $kolumny = self::ID_POK . ", " . self::ID_MIEJSCE . ", " . self::TV . ", " . self::LODOWKA . ", " . self::WC . ", " . self::PRSZYNIC . ", " . self::WANNA . ", " . self::JACUZZI . ", " . self::KLIMATYZACJA . ", " . self::INTERNET;
    $query = sprintf("SELECT " . $kolumny . " FROM pokoj
                      WHERE id_miejsce IN (%s)
                      ORDER BY pokoj.id_pok;",
                      mysql_real_escape_string($noclegownieIds));
    $result = mysql_query($query,$polaczenie);

    if(!$result){
      throw new Exception("Blad pobierania pokoju");
    }
    $pokoje = array();
    while($row = mysql_fetch_assoc($result)){
      $pokoje[] = new Pokoj('', $row['id_pok'], $row['id_miejsce'], $row['tv'], $row['lodowka'], $row['wc'], $row['prszynic'], $row['wanna'], $row['jacuzzi'], $row['klimatyzacja'], $row['internet'], '');
    }
    return $pokoje;
  }

  public function zapiszZmianyWPokoju(){
    global $polaczenie;
    $kolumny = self::ID_POK . ", " . self::TV . ", " . self::LODOWKA . ", " . self::WC . ", " . self::PRSZYNIC . ", " . self::WANNA . ", " . self::JACUZZI . ", " . self::KLIMATYZACJA . ", " . self::INTERNET;
    $dodajZdjecie = false;
    $saZmianyNaZdjeciu = ($this->zdjecie === NULL || $this->zdjecie != "");
    if($saZmianyNaZdjeciu){
      $kolumny .= ", " . self::ZDJECIE;
      $dodajZdjecie = true;
      if($this->zdjecie === NULL) $this->zdjecie = "";
    }
    $kolumny = explode(', ', $kolumny);

    $query = sprintf("UPDATE pokoj
                      SET $kolumny[1]='%s',$kolumny[2]='%s',$kolumny[3]='%s',$kolumny[4]='%s',
                          $kolumny[5]='%s',$kolumny[6]='%s',$kolumny[7]='%s', $kolumny[8]='%s' ". ($dodajZdjecie?", " . $kolumny[9]."='%s'":"") ."
                      WHERE $kolumny[0] = '$this->id_pok';",
                      mysql_real_escape_string($this->tv),
                      mysql_real_escape_string($this->lodowka),
                      mysql_real_escape_string($this->wc),
                      mysql_real_escape_string($this->prszynic),
                      mysql_real_escape_string($this->wanna),
                      mysql_real_escape_string($this->jacuzzi),
                      mysql_real_escape_string($this->klimatyzacja),
                      mysql_real_escape_string($this->internet),
                      mysql_real_escape_string($this->zdjecie));

    $result = mysql_query($query,$polaczenie);
    if(!$result){
      throw new Exception("Blad zapisu do bazy");
    }
  }

  public function usun(){
    global $polaczenie;
    $query = sprintf("DELETE FROM pokoj WHERE ". self::ID_POK ." = '$this->id_pok';");
    $result = mysql_query($query,$polaczenie);
    if(!$result){
      throw new Exception("Blad zapisu do bazy");
    }
  }
}


?>
