<?php
session_start();
include '../../db.php';
$login = $_SESSION['login'];
$id = $_GET['id'];

$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
if (mysql_num_rows($uprawnienia) == 1){
$kto=(mysql_query("SELECT * FROM uzytkownik WHERE id='$id' AND typ_konta != 10"));
if (mysql_num_rows($kto) == 1){
if(@$_SESSION['zalogowany']==1)
{
	if(mysql_query("DELETE FROM uzytkownik WHERE id='$id'")){  
	header('Location: ../uzytkownicy.php');}
}else{header('Location: ../../index.php ');}
}else{ ?>
<script language="javascript" type="text/javascript">
alert('Nie miżna usunąć konta administratora.');
window.location = '../uzytkownicy.php';
</script>
<?php }
}else{echo 'Dostęp tylko dla administratora.';}
?>