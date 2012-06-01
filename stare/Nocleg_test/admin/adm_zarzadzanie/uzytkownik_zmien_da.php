<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
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
		//$noclegi=mysql_fetch_assoc($nocleg);

echo '<center><b><h1>Edycja danych osobowych</h1></b><br /><br />
<table style="color:#000;margin:0 0 0 30px" border="0"><form action="uzytkownik_zmien_dane.php" method="post">
	<input type="hidden" name="zmien_dane" value="TRUE" />
		<tr class="reglbl"><td>Imie:</td><td><input type="text" name="imie" value="'.$pole['imie'].'" /></td></tr>
		<tr class="reglbl"><td>Nazwisko:</td><td><input type="text" name="nazwisko" value="'.$pole['nazwisko'].'" /></td></tr>
		<tr class="reglbl"><td>Aktualny typ konta:</td><td>'.$pole['typ_konta'].'</td></tr>
		<tr><td><input type="radio" name="typ" value="30" '; if($pole['typ_konta']==30){echo 'checked';} echo'/>Użytkownik - (30)</td>
			<td><input type="radio" name="typ" value="20" '; if($pole['typ_konta']==20){echo 'checked';} echo'/>Recepcjonista - (20)</td>
			<td><input type="radio" name="typ" value="10" '; if($pole['typ_konta']==10){echo 'checked';} echo'/>Administrator - (10)</td></tr>
			<tr><td>Zmień noclegownie:</td><td>
				<select '; if($pole['typ_konta']!=20){echo 'DISABLED';} echo ' name="nazwa_nocleg">
					<option value="0"></option>
					<optgroup label="Agroturystyka">';
					while($agr=mysql_fetch_array($agro)){
						echo'<option '; if($moja['nazwa']==''.$agr['nazwa'].''){echo 'selected';} echo' value="'.$agr['id'].'">'.$agr['nazwa'].'</option></optgroup>';
						}
					echo '<optgroup label="Hotel">';
					while($hot=mysql_fetch_array($hote)){
						echo'<option '; if($moja['nazwa']==''.$hot['nazwa'].''){echo 'selected';} echo' value="'.$hot['id'].'">'.$hot['nazwa'].'</option></optgroup>';
						}
					echo '<optgroup label="Motel">';
					while($mot=mysql_fetch_array($mote)){
						echo'<option '; if($moja['nazwa']==''.$mot['nazwa'].''){echo 'selected';} echo' value="'.$mot['id'].'">'.$mot['nazwa'].'</option></optgroup>';
						}
					echo'<optgroup label="Kwatera prywatna">';
					while($pri=mysql_fetch_array($priv)){
						echo'<option '; if($moja['nazwa']==''.$pri['nazwa'].''){echo 'selected';} echo' value="'.$pri['id'].'">'.$pri['nazwa'].'</option></optgroup>';
						}
					echo'<optgroup label="Schronisko">';
					while($sch=mysql_fetch_array($schr)){
						echo'<option '; if($moja['nazwa']==''.$sch['nazwa'].''){echo 'selected';} echo' value="'.$sch['id'].'">'.$sch['nazwa'].'</option></optgroup>';
						}
				echo'</select><br />
		<tr class="reglbl"><td>Nazwa obsługiwanej<br />noclegowni:</td><td>'.$moja['nazwa'].'</td></tr>
		<tr class="reglbl"><td><input type="hidden" name="id_u" value="'.$id.'" /></td></tr></table>
     <p><input type="submit" value="Zmień" /></p></form></center>
    </form>
</center>';

}else{header('Location: ../index.php ');}
?>