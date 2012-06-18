<?php
session_start();
include '../../db.php';
$login = $_SESSION['login'];
$id = $_GET['id'];

$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
if (mysql_num_rows($uprawnienia) == 1){
if(@$_SESSION['zalogowany']==1)
{
	if(mysql_query("DELETE FROM noclegownia WHERE id='$id'")){
	mysql_query("DELETE FROM pokoj WHERE id_miejsce='$id'");
	header('Location: ../noclegi.php');}
}else{header('Location: ../../index.php ');}
}else{ ?>
<script language="javascript" type="text/javascript">
alert('Tylko administrator może usunąć noclegownie.');
window.location = '../noclegi.php';
</script>
<?php }
?>