<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<style type="text/css">
body {font:10px Arial, Helvetica, sans-serif; text-align: center; font-size:10px;}
th, td {
font-size:14px;
padding: 5px 6px 5px 6px;}
th {
background: #FFF3C9; 
color: #414632
}
td {
text-align: left; 
background: #F4FFE0
}
table {
background: #D0C6A4 
}
</style>
<?php
session_start();
include '../../db.php';
$id =($_GET['id']);
$login = $_SESSION['login'];
if(@$_SESSION['zalogowany']==1)
{
		$noc=mysql_query("SELECT * FROM noclegownia WHERE id='$id'");
		$nocl=mysql_fetch_assoc($noc);
		$moj=mysql_query("SELECT noclegownia.nazwa FROM noclegownia JOIN uzytkownik ON (noclegownia.id = id_miejsce) WHERE uzytkownik.id='$id' LIMIT 1");
		$moja=mysql_fetch_array($moj);
		
		$wstecz=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=20"));
		if (mysql_num_rows($wstecz) == 1) {echo '<p style="text-align:left;"><a href="../../zarzadzanie/recepcionista.php"><button>Wstecz</button></a></p>';}
echo '<center><h1>Edycja Noclegowni</h1>
<table width="556px">
<form action="nocleg_zmien_dane.php" method="post" ENCTYPE="multipart/form-data">
	<input type="hidden" name="zmien_dane_noc" value="TRUE" />
		<tr>
		<td width="50%">';
		$id = $nocl['id'];
		$foto=(mysql_query("SELECT * FROM noclegownia WHERE id='$id' AND zdjecie > '0'"));
		if (mysql_num_rows($foto) > 0)
		{echo '<center><img src="../../noclegownia_zdjecie.php?id='.$nocl['id'].'" alt="" height="" width="270px"></center>';}
		else
		{echo '<br /><br /><br /><br /><br /><center>Nie dodano zdjęcia dla noclegowni.<br />Zaznacz "Zmień" i wybierz odpowiedni plik ze zdjęciem.</center><br /><br /><br /><br />';}
		echo '<center><br /><strong>Zmień zdjęcie:</strong><br />
		<input type="hidden" name="zmien_zdj" value="0" />
		Zmień:<input type="checkbox" name="zmien_zdj" value="1">
		<input style="width:146px" type="file" size="6" name="zdjecie"></center>
		</td>
		<td><strong>Nazwa:</strong><br /><input type="text" name="nazwa" value="'.$nocl['nazwa'].'" /><br />
		<strong>Miejscowość:</strong><br /><input type="text" name="miejscowosc" value="'.$nocl['miejscowosc'].'" /><br />
		<strong>Ulica:</strong><br /><input type="text" name="ulica" value="'.$nocl['ulica'].'" /><br />
		<strong>Kod pocztowy:</strong><br /><input type="text" name="kod_pocztowy" value="'.$nocl['kod_pocztowy'].'" /><br />
		<strong>Nr rachunku: </strong><br /><input style="width: 230px;" name="nr_bank" type="text" class="input" ><br /><span style="font-size:10">np. 32 2130 0004 2001 0354 6652 0001</span><br />
		<strong>Opis:</strong><br /><textarea name="opis" rows="2" style="height:60px; width:200px;">'.$nocl['opis'].'</textarea><br />
		<strong>Rodzaj noclegowni:</strong> '.$nocl['typ'].'<br />
			<strong>Zmień rodzaj noclegowni:</strong><br />
				<select name="typ_nocleg">
					<option '; if($nocl['typ']=='Agroturystyka'){echo 'selected';} echo' value="Agroturystyka">Agroturystyka</option>
					<option '; if($nocl['typ']=='Hotel'){echo 'selected';} echo' value="Hotel">Hotel</option>
					<option '; if($nocl['typ']=='Motel'){echo 'selected';} echo' value="Motel">Motel</option>
					<option '; if($nocl['typ']=='Kwatera prywatna'){echo 'selected';} echo' value="Kwatera prywatna">Kwatera prywatna</option>
					<option '; if($nocl['typ']=='Schronisko'){echo 'selected';} echo' value="Schronisko">Schronisko</option>
					</select><br />
		<input type="hidden" name="id_u" value="'.$id.'" /></td></tr></table>
     <p><input type="submit" value="Zmień" /></p></form></center>
    </form>
</center>';
}else{header('Location: ../../index.php ');}
?>