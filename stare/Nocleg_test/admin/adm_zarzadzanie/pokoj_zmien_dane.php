<?php
session_start();
include '../../db.php';
if(@$_SESSION['zalogowany']==1){

if ($_POST["zmien_dane_pok"]) {
		$blad = 0;
        $tabela = 'pokoj';
        $tytul = htmlspecialchars(addslashes(strip_tags(trim($_POST["tytul"]))), ENT_QUOTES);
        $cena = htmlspecialchars(addslashes(strip_tags(trim($_POST["cena"]))), ENT_QUOTES);
		$id = htmlspecialchars(addslashes(strip_tags(trim($_POST["id_u"]))), ENT_QUOTES);
		$opis = htmlspecialchars(addslashes(strip_tags(trim($_POST["opis"]))), ENT_QUOTES);
		$tv = isset(htmlspecialchars(addslashes(strip_tags(trim($_POST["tv"]))), ENT_QUOTES))?1:0;
		$lodowka = htmlspecialchars(addslashes(strip_tags(trim($_POST["lodowka"]))), ENT_QUOTES);
		$wc = htmlspecialchars(addslashes(strip_tags(trim($_POST["wc"]))), ENT_QUOTES);
		$prszynic = htmlspecialchars(addslashes(strip_tags(trim($_POST["prszynic"]))), ENT_QUOTES);
		$wanna = htmlspecialchars(addslashes(strip_tags(trim($_POST["wanna"]))), ENT_QUOTES);
		$jacuzzi = htmlspecialchars(addslashes(strip_tags(trim($_POST["jacuzzi"]))), ENT_QUOTES);
		$klimatyzacja = htmlspecialchars(addslashes(strip_tags(trim($_POST["klimatyzacja"]))), ENT_QUOTES);
		$internet = htmlspecialchars(addslashes(strip_tags(trim($_POST["internet"]))), ENT_QUOTES);
		

		
        if($blad == 0){
		$zapytaj = "UPDATE $tabela SET tytul='$tytul', cena='$cena', opis='$opis', tv='$tv', lodowka='$lodowka', wc='$wc', prszynic='$prszynic', wanna='$wanna', jacuzzi='$jacuzzi', klimatyzacja='$klimatyzacja', internet='$internet'  WHERE id_pok='$id'";
		if(mysql_query($zapytaj)){
		echo '<p>Zmiany zostały wprowadzone</p>';}
		else{
		echo 'błąd nr: '.$wc.' blad '.$blad.' id:'.$id.'';
		}

}else{header('Location: ../index.php ');}
}
}
?>