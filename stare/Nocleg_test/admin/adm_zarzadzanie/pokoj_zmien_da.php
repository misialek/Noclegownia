<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../../db.php';
$id =($_GET['id']);
if(@$_SESSION['zalogowany']==1)
{
		$pok=mysql_query("SELECT * FROM pokoj WHERE id_pok='$id'");
		$poku=mysql_fetch_assoc($pok);
		

echo '<center><b><h1>Edycja Pokoju</h1></b><br /><br />
<table style="color:#000;margin:0 0 0 30px" border="0"><form action="pokoj_zmien_dane.php" method="post">
	<input type="hidden" name="zmien_dane_pok" value="TRUE" />
		<tr class="reglbl"><td>Tytuł:</td><td><input type="text" name="tytul" value="'.$poku['tytul'].'" /></td></tr>
		<tr class="reglbl"><td>Cena:</td><td><input type="number" name="cena" value="'.$poku['cena'].'" /></td></tr>
		<tr class="reglbl"><td>Opis:</td><td><input type="text" name="opis" value="'.$poku['opis'].'" /></td></tr>
			  <tr><td> '; if($poku['tv'] == 'on'){echo ' TV<input name="tv" type="checkbox" checked="checked" value="" />';}else{echo ' TV<input name="tv" type="checkbox" value="" /> </td>';} 
        echo '<td> '; if($poku['lodowka'] == 'on'){echo ' Lodówka<input name="lodowka" type="checkbox" checked="checked" value="" />';}else{echo ' Lodówka<input name="lodowka" type="checkbox" value="" /></td></tr>';}
		echo '<tr><td> '; if($poku['wc'] == 'on'){echo ' WC<input name="wc" type="checkbox" checked="checked" value="" />';}else{echo ' WC<input name="wc" type="checkbox" value="" /></td>';}
		echo '<td> '; if($poku['prszynic'] == 'on'){echo ' Prysznic<input  name="prszynic" type="checkbox" checked="checked" value="" />';}else{echo ' Prysznic<input name="prszynic" type="checkbox" value="" /></td></tr>';}
		echo '<tr><td> '; if($poku['wanna'] == 'on'){echo ' Wanna<input name="wanna" type="checkbox" checked="checked" value="" />';}else{echo ' Wanna<input name="wanna" type="checkbox" value="" /></td>';}
		echo '<td> '; if($poku['jacuzzi'] == 'on'){echo ' Jacuzzi<input name="jacuzzi" type="checkbox" checked="checked" value="" />';}else{echo ' Jacuzzi<input name="jacuzzi" type="checkbox" value="" /></td></tr>';}
		echo '<tr><td> '; if($poku['klimatyzacja'] == 'on'){echo ' Klimatyzacja<input name="klimatyzacja" type="checkbox" checked="checked" value="" />';}else{echo ' Klimatyzacja<input name="klimatyzacja" type="checkbox" value="" /></td>';}
		echo '<td> '; if($poku['internet'] == 'on'){echo ' Internet<input name="internet" type="checkbox" checked="checked" value="" />';}else{echo ' Internet<input name="internet" type="checkbox" value="" /></td></tr>';}
	
		echo '<tr class="reglbl"><td><input type="hidden" name="id_u" value="'.$id.'" /></td></tr></table>
     <p><input type="submit" value="Zmień" /></p></form></center>
    </form>
</center>';
}else{header('Location: ../index.php ');}
?>