<?php
if(@$_SESSION['zalogowany']==1){
$login = $_SESSION['login'];
$user = '';
$typ_konta=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=20"));
if (mysql_num_rows($typ_konta) == 1){
$user = '- Recepcjonista';}
$typ_konta=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=10"));
if (mysql_num_rows($typ_konta) == 1){
$user = '- Administrator';}
$inf=mysql_query("SELECT * FROM uzytkownik WHERE login='$login'");
$info=mysql_fetch_assoc($inf);
echo '<table border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed; 	text-align: center;  color: #FFFFFF; background:url(../images/overlay.png); width:100%;"> 
<td><strong>Zalogowany: '.$info['imie'].' '.$info['nazwisko'].' '.$user.'</strong></td></table>';
}
?> 