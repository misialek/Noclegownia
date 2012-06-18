<style type="text/css">
body {font:10px Arial, Helvetica, sans-serif; text-align: center; font-size:10px;}
</style>
<?php
session_start();
include '../../db.php';
$id =($_GET['id']);
if(@$_SESSION['zalogowany']==1)
{
		$pola=mysql_query("SELECT * FROM uzytkownik WHERE id='$id'");
		$pole=mysql_fetch_assoc($pola);
		$agro=mysql_query("SELECT * FROM noclegownia WHERE typ='Agroturystyka'");
		$hote=mysql_query("SELECT * FROM noclegownia WHERE typ='Hotel'");
		$mote=mysql_query("SELECT * FROM noclegownia WHERE typ='Motel'");
		$priv=mysql_query("SELECT * FROM noclegownia WHERE typ='Kwatera prywatna'");
		$schr=mysql_query("SELECT * FROM noclegownia WHERE typ='Schronisko'");
		$moj=mysql_query("SELECT noclegownia.nazwa FROM noclegownia JOIN uzytkownik ON (noclegownia.id = id_miejsce) WHERE uzytkownik.id='$id' LIMIT 1");
		$moja=mysql_fetch_array($moj);

echo '<h1>Edycja danych osobowych</h1></b><br /><br /><br />
<form action="uzytkownik_zmien_dane.php" method="post">
<input type="hidden" name="zmien_dane" value="TRUE" />
<table width="100%" align="center">
		<tr><td><strong>Imie:</strong></td><td><input type="text" name="imie" value="'.$pole['imie'].'" /></td></tr>
		<tr><td><strong>Nazwisko:</strong></td><td><input type="text" name="nazwisko" value="'.$pole['nazwisko'].'" /></td></tr>
		<tr><td><strong>E-mail:</strong></td><td><input type="text" name="email" value="'.$pole['email'].'" /></td></tr>';
		if($pole["typ_konta"] == 10){$user='Administrator';}
		if($pole["typ_konta"] == 20){$user='Recepcjonista';}
		if($pole["typ_konta"] == 30){$user='Klient';}
		echo '<tr><td width="33%"><strong>Aktualny typ konta:</strong></td><td>'.$user.'</td></tr>
		<tr><td><input type="radio" name="typ" value="30" '; if($pole['typ_konta']==30){echo 'checked';} echo'/>Klient</td>
			<td><input type="radio" name="typ" value="20" '; if($pole['typ_konta']==20){echo 'checked';} echo'/>Recepcjonista</td>
			<td><input type="radio" name="typ" value="10" '; if($pole['typ_konta']==10){echo 'checked';} echo'/>Administrator</td></tr>
			<tr><td><strong>Zmień noclegownie:</strong></td><td>
				<select '; if($pole['typ_konta']!=20){echo 'DISABLED';} echo ' name="nazwa_nocleg">
					<option value="0"></option>
					<optgroup label="Agroturystyka">';
					while($agr=mysql_fetch_array($agro)){
						echo'<option '; if($moja['nazwa']==''.$agr['nazwa'].''){echo 'selected';} echo' value="'.$agr['id'].'">'.$agr['nazwa'].'</option>';
						}
					echo '</optgroup>';
					echo '<optgroup label="Hotel">';
					while($hot=mysql_fetch_array($hote)){
						echo'<option '; if($moja['nazwa']==''.$hot['nazwa'].''){echo 'selected';} echo' value="'.$hot['id'].'">'.$hot['nazwa'].'</option>';
						}
					echo '</optgroup>';
					echo '<optgroup label="Motel">';
					while($mot=mysql_fetch_array($mote)){
						echo'<option '; if($moja['nazwa']==''.$mot['nazwa'].''){echo 'selected';} echo' value="'.$mot['id'].'">'.$mot['nazwa'].'</option>';
						}
					echo '</optgroup>';
					echo'<optgroup label="Kwatera prywatna">';
					while($pri=mysql_fetch_array($priv)){
						echo'<option '; if($moja['nazwa']==''.$pri['nazwa'].''){echo 'selected';} echo' value="'.$pri['id'].'">'.$pri['nazwa'].'</option>';
						}
					echo '</optgroup>';
					echo'<optgroup label="Schronisko">';
					while($sch=mysql_fetch_array($schr)){
						echo'<option '; if($moja['nazwa']==''.$sch['nazwa'].''){echo 'selected';} echo' value="'.$sch['id'].'">'.$sch['nazwa'].'</option>';
						}
					echo '</optgroup>';
				echo'</select><br />
		<input type="hidden" name="id_u" value="'.$id.'" />
</table>
<br /><table><tr><td><strong>Nazwa obsługiwanej noclegowni:<Strong></td><td>'.$moja['nazwa'].'</td></tr></table>
<br /><br /><input type="submit" value="Zmień" />
</form>';
}else{header('Location: ../index.php ');}
?>