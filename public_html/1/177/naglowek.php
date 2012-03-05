<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2" />
	<title>podstrona</title>
</head>
<body>
<?if(!$_SESSION["zalogowany"]){
$kom="";
if($_GET["err"]==1)$kom="Błędny login lub hasło";
logowanie_okno($kom);
require "stopka.php";
exit;
}
$ilew=mysql_num_rows(mysql_query("select wiad_id from wiadomosci where wiad_przeczytane=0 and wiad_do=".$_SESSION["zalogowany"]." and wiad_czyj=0"));
echo "<a href='odbiorcza.php'>Skrzynka odbiorcza($ilew nowych)</a> &bull; <a href='nadawcza.php'>Skrzynka nadawcza</a> &bull; <a href='newmsg.php'>Napisz nowš wiadomoć</a> &bull; <a href='sesje.php?ak=wyl'>Wyloguj</a>";


?>