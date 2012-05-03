<?php
include_once '../lib/Uzytkownik.php';
include_once '../lib/Noclegownia.php';
include_once '../lib/Pokoj.php';
include_once '../lib/Rezerwacja.php';
session_start();
//$_SESSION['login'] = 'misialek'; DEBUG LOGIN
$admin = new AdministrationActionClass();
$admin->init($_SESSION['login'], isset($_GET['akcja'])?$_GET['akcja']:"");

class AdministrationActionClass{
  private $user;
  public function init($login, $akcja){
    try{
      $this->user = Uzytkownik::doSelectOneByLogin($login);
      $typ_konta = $this->user->__get('typ_konta');
      if(!$typ_konta == Uzytkownik::ADMIN || !$typ_konta == Uzytkownik::RECEPCJONISTA){
        header('Location: uzytkownik.php ');
      }
      switch($akcja){
        case "dodajPokoj":
          $this->dodajPokoj();
          break;
        case "listujPokoje":
          $this->listujPokoje();
          break;
        case "listujRezerwacje":
          $this->listujRezerwacje();
          break;
        default:
          include "widok/indeks.php";
          die;
      }
    } catch(Exception $e){
      include "../error500.php";
    }
  }

  public function dodajPokoj(){
    $dostepneNoclegownie = Noclegownia::doSelectDostepneNoclegownie($this->user->__get('id'), $this->user->__get('typ_konta'));
    if(isset($_POST['nowy_pokoj'])){
      $this->stworzNowyPokoj($dostepneNoclegownie);
      include 'widok/zmianaWykonanaPomyslnie.php';
      die;
    }else{
      include 'widok/nowy_pokoj.php';
      die;
    }
  }

  public function listujRezerwacje(){
    $dostepneNoclegownie = Noclegownia::doSelectDostepneNoclegownie($this->user->__get('id'), $this->user->__get('typ_konta'));
    if(isset($_POST['lista_rezerwacji'])){
      $wszystkieAktywneRezerwacje = Rezerwacja::pobierzRezerwacjeDlaZarzadncy($this->user);
      foreach($wszystkieAktywneRezerwacje as $rezerwacja){
        $rezerwacja = $rezerwacja['rezerwacja'];
        if(isset($_POST["akceptuj_".$rezerwacja->__get('id_rez')])){
          $rezerwacja->__set('status', Rezerwacja::ZAAKCEPTOWANA);
          $rezerwacja->zapiszZmianeStatusu();
        }
        if(isset($_POST["odrzuc_".$rezerwacja->__get('id_rez')])){
          $rezerwacja->__set('status', Rezerwacja::ODRZUCONA);
          $rezerwacja->zapiszZmianeStatusu();
        }
        include 'widok/zmianaWykonanaPomyslnie.php';
        die;
      }
    }
    $wszystkieAktywneRezerwacje = Rezerwacja::pobierzRezerwacjeDlaZarzadncy($this->user);
    $aktywneRezerwacje = $this->podzielRezerwacjeNaNoclegownie($wszystkieAktywneRezerwacje);
    include 'widok/listuj_rezerwacje.php';
  }

  public function pokazPokoj(){
    $dostepneNoclegownie = Noclegownia::doSelectDostepneNoclegownie($this->user->__get('id'), $this->user->__get('typ_konta'));
    $wszystkieDostepnePokoje = $this->pobierzDostepnePokoje($dostepneNoclegownie);
    foreach($wszystkieDostepnePokoje as $pokoj){
      $nocleg = null;
      foreach($dostepneNoclegownie as $noclegownia){
        if($pokoj->__get('id_miejsce') == $noclegownia->__get('id')) $nocleg = $noclegownia;
      }
      if($pokoj->__get('id_pok') == $_GET['pokoj']){
        $_SESSION['modyfikowanePokoje'] =  array($pokoj->__get('id_pok'));
        include "widok/Podglad_pokoju.php";
        die;
      }
    }
    include "widok/pokoj_nie_istnieje.php";
    die;
  }

  public function listujPokoje(){
    if(isset($_GET['pokoj']) && !isset($_POST['lista_pokoi'])){
      $this->pokazPokoj();
      die;
    }
    $dostepneNoclegownie = Noclegownia::doSelectDostepneNoclegownie($this->user->__get('id'), $this->user->__get('typ_konta'));
    if(isset($_POST['lista_pokoi'])){
      $wszystkieDostepnePokoje = $this->pobierzDostepnePokoje($dostepneNoclegownie);
      $this->wykonajZmianyNaPokojach($wszystkieDostepnePokoje);
      include 'widok/zmianaWykonanaPomyslnie.php';
      die;
    }
    $wszystkieDostepnePokoje = $this->pobierzDostepnePokoje($dostepneNoclegownie);
    $dostepnePokoje = array();
    $dostepnePokojeIds = array();
    foreach($wszystkieDostepnePokoje as $pokoj){
      $dostepnePokoje[$pokoj->__get('id_miejsce')][] = $pokoj;
      $dostepnePokojeIds[] = $pokoj->__get('id_pok');
    }
    $_SESSION['modyfikowanePokoje'] = $dostepnePokojeIds;
    include 'widok/listuj_pokoje.php';
    die;
  }

  private function stworzNowyPokoj($dostepneNoclegownie){
      $idNoclegownia = isset($_POST['noclegownia'])?$_POST['noclegownia']:NULL;
      $tytul = isset($_POST['tytul'])?$_POST['tytul']:"";
      $opis = isset($_POST['opis'])?$_POST['opis']:"";
      $cena = isset($_POST['cena'])?$_POST['cena']:0;
      $tv = isset($_POST['tv'])?1:0;
      $lodowka = isset($_POST['lodowka'])?1:0;
      $wc = isset($_POST['wc'])?1:0;
      $prszynic = isset($_POST['prszynic'])?1:0;
      $wanna = isset($_POST['wanna'])?1:0;
      $jacuzzi = isset($_POST['jacuzzi'])?1:0;
      $klimatyzacja = isset($_POST['klimatyzacja'])?1:0;
      $internet = isset($_POST['internet'])?1:0;

      $isFileUploaded = isset($_FILES['zdjecie']['tmp_name']) && $_FILES['zdjecie']['tmp_name'] != "";
      $isFileUploaded = $isFileUploaded?in_array($_FILES['zdjecie']['type'], array('image/jpeg', 'image/png', 'image/gif')):false;
      $zdjecie = $isFileUploaded?file_get_contents($_FILES['zdjecie']['tmp_name']):"";

      $this->sprawdzDostepUseraDoNoclegowni($dostepneNoclegownie, $idNoclegownia);
      $nowyPokoj = new Pokoj('', $idNoclegownia, $tytul, $opis, $cena, $tv, $lodowka, $wc, $prszynic, $wanna, $jacuzzi, $klimatyzacja, $internet, $zdjecie);
      $nowyPokoj->zapiszNowyPokoj();
  }

  private function sprawdzDostepUseraDoNoclegowni($dostepneNoclegownie, $idNoclegownia){
      $userMaDostep = false;
      if(isset($_POST['noclegownia'])){
        foreach($dostepneNoclegownie as $noclegownia){
          if($noclegownia->__get('id') == $idNoclegownia){
            $userMaDostep=true;
            break;
          }
        }
      }
      if(!$userMaDostep){
        throw new Exception("Uzytkownik nie ma dostepu do tej noclegowni");
      }
      return true;
  }

  private function wykonajZmianyNaPokojach($wszystkieDostepnePokoje){
      $dostepnePokojeIds = isset($_SESSION['modyfikowanePokoje'])?$_SESSION['modyfikowanePokoje']:array();
      unset($_SESSION['modyfikowanePokoje']);
      foreach($wszystkieDostepnePokoje as $key => $pokoj){
        if(!in_array($pokoj->__get('id_pok'),$dostepnePokojeIds)){ //Gdyby przypadkiem pojawił się w międzyczasie jakiś pokój
          array_slice($wszystkieDostepnePokoje, $key, 1);      //mało prawdopodobne, ale zawsze lepiej się upewnić
          continue;
        }
        if(isset($_POST["delete_".$pokoj->__get('id_pok')])){
          $pokoj->usun();
          continue;
        }
        $pokoj = $this->zmienUstawieniaPokojuWZaleznosciOdZapostowanychDanych($pokoj);
        $pokoj->zapiszZmianyWPokoju();
      }
  }

  private function zmienUstawieniaPokojuWZaleznosciOdZapostowanychDanych($pokoj){
      if(isset($_POST["tytul_".$pokoj->__get('id_pok')])){
        $pokoj->__set('tytul', $_POST["tytul_".$pokoj->__get('id_pok')]);
      } else {
        $pokoj->__set('tytul', NULL);
      }
      if(isset($_POST["opis_".$pokoj->__get('id_pok')])){
        $pokoj->__set('opis', $_POST["opis_".$pokoj->__get('id_pok')]);
      } else {
        $pokoj->__set('opis', NULL);
      }
      if(isset($_POST["cena_".$pokoj->__get('id_pok')])){
        $pokoj->__set('cena', $_POST["cena_".$pokoj->__get('id_pok')]);
      } else {
        $pokoj->__set('cena', NULL);
      }
      if(isset($_POST["tv_".$pokoj->__get('id_pok')])){
        $pokoj->__set('tv', 1);
      } else {
        $pokoj->__set('tv', 0);
      }
      if(isset($_POST["lodowka_".$pokoj->__get('id_pok')])){
        $pokoj->__set('lodowka', 1);
      } else {
        $pokoj->__set('lodowka', 0);
      }
      if(isset($_POST["wc_".$pokoj->__get('id_pok')])){
        $pokoj->__set('wc', 1);
      } else {
        $pokoj->__set('wc', 0);
      }
      if(isset($_POST["prszynic_".$pokoj->__get('id_pok')])){
        $pokoj->__set('prszynic', 1);
      } else {
        $pokoj->__set('prszynic', 0);
      }
      if(isset($_POST["wanna_".$pokoj->__get('id_pok')])){
        $pokoj->__set('wanna', 1);
      } else {
        $pokoj->__set('wanna', 0);
      }
      if(isset($_POST["jacuzzi_".$pokoj->__get('id_pok')])){
        $pokoj->__set('jacuzzi', 1);
      } else {
        $pokoj->__set('jacuzzi', 0);
      }
      if(isset($_POST["klimatyzacja_".$pokoj->__get('id_pok')])){
        $pokoj->__set('klimatyzacja', 1);
      } else {
        $pokoj->__set('klimatyzacja', 0);
      }
      if(isset($_POST["internet_".$pokoj->__get('id_pok')])){
        $pokoj->__set('internet', 1);
      } else {
        $pokoj->__set('internet', 0);
      } if(isset($_POST["usun_zdjecie_".$pokoj->__get('id_pok')])){
        $pokoj->__set('zdjecie', NULL);
      }
      if(isset($_POST["zmien_zdjecie_".$pokoj->__get('id_pok')])){
        $zdjecie = 'zdjecie_'.$pokoj->__get('id_pok');
        $isFileUploaded = isset($_FILES[$zdjecie]['tmp_name']) && $_FILES[$zdjecie]['tmp_name'] != "";
        $pokoj->__set('zdjecie', $isFileUploaded?file_get_contents($_FILES[$zdjecie]['tmp_name']):"");
      }
      return $pokoj;
  }

  private function pobierzDostepnePokoje($dostepneNoclegownie){
    $dostepneNoclegownieIds = array();
    foreach($dostepneNoclegownie as $noclegownia){
      $dostepneNoclegownieIds[] = $noclegownia->__get('id');
    }
    return Pokoj::doSelectByIdNoclegowni($dostepneNoclegownieIds);
  }

  private function podzielRezerwacjeNaNoclegownie($wszystkieAktywneRezerwacje){
    $aktywneRezerwacje = array();
    foreach($wszystkieAktywneRezerwacje as $rezerwacja){
      $aktywneRezerwacje[$rezerwacja['noclegownia']->__get('id')][] = $rezerwacja;
    }
    return $aktywneRezerwacje;
  }
}
?>