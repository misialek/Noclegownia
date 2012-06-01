<?php
if(isset($_GET['start'])){
	$start = $_GET['start'];}else{header('Location: uzytkownicy.php?start=0');}
	$na_stronie = 10;
	$sql="SELECT * FROM uzytkownik LIMIT ".($start).",".$na_stronie."";
	$wynik1=mysql_query($sql);
	
	echo '<table border="5" width="400">
		<tr align="center">
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Opcję</th>
		</tr>';
		
if( mysql_num_rows( $wynik1 ) > 0){
		//$row = mysql_fetch_row($query))
	while($result=mysql_fetch_assoc($wynik1)){	
	

//while($linia=mysql_fetch_array($wynik1)){ 
echo '<tr align="center">
		<td>'.$result["imie"].'</td>
		<td>'.$result["nazwisko"].'</td>
		<td><a class="zarz" href="adm_zarzadzanie/uzytkownik_zmien_da.php?id='.$result['id'].'">Edytuj</a></td>
	</tr>';	
												}
												}	echo '</table><br /><br /><hr>';
							$wykonaj=mysql_query("SELECT * FROM uzytkownik");
							$znaleziono=mysql_num_rows($wykonaj);
							if($znaleziono>$na_stronie) {
							print '<center>  ';
							for($i=0; $i<ceil($znaleziono/$na_stronie); $i++)
							print '<a class="button" href="uzytkownicy.php?start='.($i*$na_stronie).'"><b>'.($i+1).'</b></a>  ';
														}  
							print '</center>';

											
?>