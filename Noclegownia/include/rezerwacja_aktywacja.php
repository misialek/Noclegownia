<?php
if(@$_SESSION['zalogowany']==1){
include 'include/mail_to.php';
if(isset($_GET['login']) && (isset($_GET['id']))){
$log=($_GET['login']);
$id=($_GET['id']);
if($login == $log){
$aktywowana=mysql_query("SELECT * FROM rezerwacje WHERE id_rez='$id' AND status != 1;");
if (mysql_num_rows($aktywowana) == 1){
if(mysql_query("UPDATE rezerwacje SET status='1' WHERE login = '$log' AND id_rez = '$id'")){
echo 'Rezerwacja została aktywowana.<br />Został wysłany do Ciebie email z danymi do wykonania przelewu.<br />
Jeżeli przelew będzie zaakceptowany wówczas rezerwacja otrzyma status zapłacony (MENU: Rezerwacje).<br /><br />
<strong>Uwaga! Rezerwacja która nie będzie opłacona 24h przed rozpoczęciem może zostać odrzucona.</strong>';
$mail=mysql_query("SELECT uzytkownik.email, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.ocena FROM uzytkownik JOIN rezerwacje ON(uzytkownik.login = rezerwacje.login)
											JOIN pokoj ON(rezerwacje.id_pokoj = pokoj.id_pok)
											JOIN noclegownia ON(pokoj.id_miejsce = noclegownia.id)
											WHERE uzytkownik.login='$log' AND rezerwacje.id_rez='$id';");
$email=mysql_fetch_assoc($mail);
$nazwa = $email['nazwa'];
$miejscowosc = $email['miejscowosc'];
$kod_poczowy = $email['kod_pocztowy'];
$ulica = $email['ulica'];
$ocena = $email['ocena'];
$list = "Witaj $login!
			
Dane do przelewu:

 Nr rezerwacji $id

$nazwa
Ul. $ulica, $kod_poczowy $miejscowosc
Nr rachunku: $ocena
Tytuł: Nr rezerwacji $id";
mail($email['email'], "Dane do przelewu.", $list, $mail_to);
}
								}else{echo 'Aktywacja już zostala wcześniej dokonana.';}
					}else{echo 'Błąd';}
												}
								}else{echo 'Proszę się zalogować i ponownie podjąć próbę aktywacji.';}
?>