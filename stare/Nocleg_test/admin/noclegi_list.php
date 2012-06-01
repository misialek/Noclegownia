<?php
if(isset($_GET['start'])){
	$start = $_GET['start'];}else{header('Location: noclegi.php?start=0');}
	$na_stronie = 10;
	$sql="SELECT * FROM noclegownia LIMIT ".($start).",".$na_stronie."";
	$wynik1=mysql_query($sql);
	
	echo '<table border="5" width="400">
		<tr align="center">
			<th>Nazwa</th>
			<th>Miejscowość</th>
			<th>Opcje</th>
			<th>Pokoje</th>
		</tr>';
		
if( mysql_num_rows( $wynik1 ) > 0){
		//$row = mysql_fetch_row($query))
	while($result=mysql_fetch_assoc($wynik1)){	
	

//while($linia=mysql_fetch_array($wynik1)){ 
echo '<tr align="center">
		<td>'.$result["nazwa"].'</td>
		<td>'.$result["miejscowosc"].'</td>
		<td><a class="zarz" href="adm_zarzadzanie/nocleg_zmien_da.php?id='.$result['id'].'">Edytuj</a></td>
		<td><a href="pokoje.php?id='.$result['id'].'">Pokoje</a></td>
	</tr>';	
												}
												}	echo '</table><br /><br /><hr>';
							$wykonaj=mysql_query("SELECT * FROM noclegownia");
							$znaleziono=mysql_num_rows($wykonaj);
							if($znaleziono>$na_stronie) {
							print '<center>  ';
							for($i=0; $i<ceil($znaleziono/$na_stronie); $i++)
							print '<a class="button" href="noclegi.php?start='.($i*$na_stronie).'"><b>'.($i+1).'</b></a>  ';
														}  
							print '</center>';

											
?>