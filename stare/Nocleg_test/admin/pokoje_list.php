<?php
if(isset($_GET['start'])){
	$start = $_GET['start'];}else{header('Location: pokoje.php?start=0');}
	$na_stronie = 10;
	$sql="SELECT * FROM pokoj LIMIT ".($start).",".$na_stronie."";
	$wynik1=mysql_query($sql);
	
	
	echo '<table border="5" width="400">
		<tr align="center">
			<th>Z noclegowni</th>
			<th>Tytuł</th>
			<th>Opcje</th>
		</tr>';
		
if( mysql_num_rows( $wynik1 ) > 0){
		//$row = mysql_fetch_row($query))
	while($result=mysql_fetch_assoc($wynik1)){
		$id=$result['id_miejsce'];
		$pok_sql="SELECT noclegownia.nazwa FROM noclegownia JOIN pokoj ON (noclegownia.id = id_miejsce) WHERE pokoj.id_pok='$id'";
		$wynik2=mysql_query($pok_sql);
			while($result2=mysql_fetch_assoc($wynik2)){
	

//while($linia=mysql_fetch_array($wynik1)){ 
echo '<tr align="center">
		<td>'.$result2['nazwa'].'</td>
		<td>'.$result['tytul'].'</td>
		<td><a class="zarz" href="adm_zarzadzanie/pokoj_zmien_da.php?id='.$result['id_pok'].'">Edytuj</a></td>
	</tr>';	
												}
												}
												} echo '</table><br /><br /><hr>';
							$wykonaj=mysql_query("SELECT * FROM pokoj");
							$znaleziono=mysql_num_rows($wykonaj);
							if($znaleziono>$na_stronie) {
							print '<center>  ';
							for($i=0; $i<ceil($znaleziono/$na_stronie); $i++)
							print '<a class="button" href="pokoje.php?start='.($i*$na_stronie).'"><b>'.($i+1).'</b></a>  ';
														}  
							print '</center>';

											
?>