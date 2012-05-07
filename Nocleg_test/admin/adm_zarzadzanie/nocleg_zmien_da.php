<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../../db.php';
$id =($_GET['id']);
if(@$_SESSION['zalogowany']==1)
{
		$noc=mysql_query("SELECT * FROM noclegownia WHERE id='$id'");
		$nocl=mysql_fetch_assoc($noc);
		$moj=mysql_query("SELECT noclegownia.nazwa FROM noclegownia JOIN uzytkownik ON (noclegownia.id = id_miejsce) WHERE uzytkownik.id='$id' LIMIT 1");
		$moja=mysql_fetch_array($moj);
		//$noclegi=mysql_fetch_assoc($nocleg);

echo '<center><b><h1>Edycja Noclegowni</h1></b><br /><br />
<table style="color:#000;margin:0 0 0 30px" border="0"><form action="nocleg_zmien_dane.php" method="post">
	<input type="hidden" name="zmien_dane_noc" value="TRUE" />
		<tr class="reglbl"><td>Nazwa:</td><td><input type="text" name="nazwa" value="'.$nocl['nazwa'].'" /></td></tr>
		<tr class="reglbl"><td>Miejscowość:</td><td><input type="text" name="miejscowosc" value="'.$nocl['miejscowosc'].'" /></td></tr>
		<tr class="reglbl"><td>Kod pocztowy:</td><td><input type="text" name="kod_pocztowy" value="'.$nocl['kod_pocztowy'].'" /></td></tr>
		<tr class="reglbl"><td>Rodzaj noclegowni:</td><td>'.$nocl['typ'].'</td></tr>
			<tr><td>Zmień typ noclegowni:</td><td>
				<select name="typ_nocleg">
					<option '; if($nocl['typ']=='Agroturystyka'){echo 'selected';} echo' value="Agroturystyka">Agroturystyka</option>
					<option '; if($nocl['typ']=='Hotel'){echo 'selected';} echo' value="Hotel">Hotel</option>
					<option '; if($nocl['typ']=='Motel'){echo 'selected';} echo' value="Motel">Motel</option>
					<option '; if($nocl['typ']=='Kwatera prywatna'){echo 'selected';} echo' value="Kwatera prywatna">Kwatera prywatna</option>
					<option '; if($nocl['typ']=='Schronisko'){echo 'selected';} echo' value="Schronisko">Schronisko</option>
					</select><br />
		<tr class="reglbl"><td>Opis:</td><td><input type="text" name="opis" value="'.$nocl['opis'].'" /></td></tr>
		<tr class="reglbl"><td>Ocena: (0 - 10)</td><td><input type="text" name="ocena" value="'.$nocl['ocena'].'" /></td></tr>
		<tr class="reglbl"><td><input type="hidden" name="id_u" value="'.$id.'" /></td></tr></table>
     <p><input type="submit" value="Zmień" /></p></form></center>
    </form>
</center>';
}else{header('Location: ../index.php ');}
?>