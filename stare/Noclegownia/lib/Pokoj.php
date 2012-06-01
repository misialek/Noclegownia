<?php
include_once "../db.php";

class Pokoj{
  private $id_pok;
  private $id_miejsce;
  private $tytul;
  private $opis;
  private $cena;
  private $tv;
  private $lodowka;
  private $wc;
  private $prszynic;
  private $wanna;
  private $jacuzzi;
  private $klimatyzacja;
  private $internet;
  private $zdjecie;

  const ID_POK = "pokoj.id_pok";
  const ID_MIEJSCE = "pokoj.id_miejsce";
  const TYTUL = "pokoj.tytul";
  const OPIS = "pokoj.opis";
  const CENA = "pokoj.cena";
  const TV = "pokoj.tv";
  const LODOWKA = "pokoj.lodowka";
  const WC = "pokoj.wc";
  const PRSZYNIC = "pokoj.prszynic";
  const WANNA = "pokoj.wanna";
  const JACUZZI = "pokoj.jacuzzi";
  const KLIMATYZACJA = "pokoj.klimatyzacja";
  const INTERNET = "pokoj.internet";
  const ZDJECIE = "pokoj.zdjecie";

  function __construct(){
    $args = func_get_args();
    if(count($args) == 1 && is_array($args)){
      $this->id_pok = $args[0]['id_pok'];
      $this->id_miejsce = $args[0]['id_miejsce'];
      $this->tytul = $args[0]['tytul'];
      $this->opis = $args[0]['opis'];
      $this->cena = $args[0]['cena'];
      $this->tv = $args[0]['tv'];
      $this->lodowka = $args[0]['lodowka'];
      $this->wc = $args[0]['wc'];
      $this->prszynic = $args[0]['prysznic'];
      $this->wanna = $args[0]['wanna'];
      $this->jacuzzi  = $args[0]['jacuzzi'];
      $this->klimatyzacja = $args[0]['klimatyzacja'];
      $this->internet = $args[0]['internet'];
      $this->zdjecie = $args[0]['zdjecie'];
    } else{
      $this->id_pok = $args[0];
      $this->id_miejsce = $args[1];
      $this->tytul = $args[2];
      $this->opis = $args[3];
      $this->cena = $args[4];
      $this->tv = $args[5];
      $this->lodowka = $args[6];
      $this->wc = $args[7];
      $this->prszynic = $args[8];
      $this->wanna = $args[9];
      $this->jacuzzi  = $args[10];
      $this->klimatyzacja = $args[11];
      $this->internet = $args[12];
      $this->zdjecie = $args[13];
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
    $kolumny =  self::ID_MIEJSCE . ", " . self::TYTUL . ", " . self::OPIS . ", " . self::CENA . ", " . self::TV . ", " . self::LODOWKA . ", " . self::WC . ", " . self::PRSZYNIC . ", " . self::WANNA . ", " . self::JACUZZI . ", " . self::KLIMATYZACJA . ", " . self::INTERNET . ", " . self::ZDJECIE;
    $query = sprintf("INSERT INTO pokoj(" . $kolumny . ") values ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s', '%s', '%s', '%s');",
                      mysql_real_escape_string($this->id_miejsce),
                      mysql_real_escape_string($this->tytul),
                      mysql_real_escape_string($this->opis),
                      mysql_real_escape_string($this->cena),
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

  public static function doSelectByIdNoclegowni($noclegownieIds){
    global $polaczenie;
    $noclegownieIds = implode(', ', $noclegownieIds);

    $kolumny = self::ID_POK . ", " . self::ID_MIEJSCE . ", " . self::TYTUL . ", " . self::OPIS . ", " . self::CENA . ", " . self::TV . ", " . self::LODOWKA . ", " . self::WC . ", " . self::PRSZYNIC . ", " . self::WANNA . ", " . self::JACUZZI . ", " . self::KLIMATYZACJA . ", " . self::INTERNET;
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
      $pokoje[] = new Pokoj($row['id_pok'], $row['id_miejsce'], $row['tytul'], $row['opis'], $row['cena'], $row['tv'], $row['lodowka'], $row['wc'], $row['prszynic'], $row['wanna'], $row['jacuzzi'], $row['klimatyzacja'], $row['internet'],'');
    }
    return $pokoje;
  }

  public function zapiszZmianyWPokoju(){
    global $polaczenie;
    $kolumny = self::ID_POK . ", " . self::TYTUL . ", " . self::TV . ", " . self::LODOWKA . ", " . self::WC . ", " . self::PRSZYNIC . ", " . self::WANNA . ", " . self::JACUZZI . ", " . self::KLIMATYZACJA . ", " . self::INTERNET . ", " . self::ZDJECIE . ", " . self::OPIS . ", " . self::CENA;

    $dodajZdjecie = ($this->zdjecie === NULL || $this->zdjecie != "");
    if($this->zdjecie === NULL) $this->zdjecie = "";

    $dodajOpis = $this->opis !== NULL;
    $dodajCene = $this->cena !== NULL;

    $kolumny = explode(', ', $kolumny);

    $this->zdjecie = mysql_real_escape_string($this->zdjecie);
    $this->opis = mysql_real_escape_string($this->opis);
    $this->cena = mysql_real_escape_string($this->cena);

    $var_query = ($dodajZdjecie?", " . $kolumny[10]."='$this->zdjecie'":"") . //są to zmienne częsci zapytania
                 ($dodajOpis?", " . $kolumny[11]."='$this->opis'":"") .   
                 ($dodajCene?", " . $kolumny[12]."='$this->cena'":"");
    $query = sprintf("UPDATE pokoj
                      SET $kolumny[1]='%s',$kolumny[2]='%s',$kolumny[3]='%s',$kolumny[4]='%s',
                          $kolumny[5]='%s',$kolumny[6]='%s',$kolumny[7]='%s', $kolumny[8]='%s',
                          $kolumny[9]='%s'" . "%s" .
                     " WHERE $kolumny[0] = '%s';",
                      mysql_real_escape_string($this->tytul),
                      mysql_real_escape_string($this->tv),
                      mysql_real_escape_string($this->lodowka),
                      mysql_real_escape_string($this->wc),
                      mysql_real_escape_string($this->prszynic),
                      mysql_real_escape_string($this->wanna),
                      mysql_real_escape_string($this->jacuzzi),
                      mysql_real_escape_string($this->klimatyzacja),
                      mysql_real_escape_string($this->internet),
                      $var_query,
                      mysql_real_escape_string($this->id_pok));

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
