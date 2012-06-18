<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=30"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: uzytkownik.php ');
	exit;}
	$uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=20"));
    if (mysql_num_rows($uprawnienia) == 1) {header('Location: recepcionista.php ');
	exit;}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rezerwację</title>
</head>
<body>
<?php header('Location: ../zarzadzanie_noclegownia/index.php?akcja=listujRezerwacje'); ?>
</body>
</html>	
<?php
}else{header('Location: ../index.php ');}
?>