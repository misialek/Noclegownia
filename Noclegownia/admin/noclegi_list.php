<style type="text/css">
.th {
background: #FFF3C9; 
color: #414632;
font-size:14px;
padding: 2px 6px 2px 6px;
}
.td {
text-align: center; 
background: #F4FFE0;
font-size:14px;
padding: 8px 0px 0px 0px;
}
.td2 {
text-align: center; 
background: #F4FFE0;
font-size:14px;
}
.table {
background: #D0C6A4 
}
</style>
<?php
if(isset($_GET['start'])){
	$start = $_GET['start'];}else{$start = 0;}
	$na_stronie = 10;
	$sql="SELECT * FROM noclegownia ORDER BY typ LIMIT ".($start).",".$na_stronie."";
	$wynik1=mysql_query($sql);
	
	echo '<table border="5" width="640">
		<tr align="center">
			<th class="th">Typ</th>
			<th class="th">Nazwa</th>
			<th class="th">Miejscowość</th>
			<th class="th"></th>
			<th class="th"></th>
			<th class="th"></th>
		</tr>';
		
if( mysql_num_rows( $wynik1 ) > 0){
		//$row = mysql_fetch_row($query))
	while($result=mysql_fetch_assoc($wynik1)){	
	

//while($linia=mysql_fetch_array($wynik1)){ 
echo '<tr align="center">
		<td class="td">'.$result["typ"].'</td>
		<td class="td">'.$result["nazwa"].'</td>
		<td class="td">ul. '.$result["ulica"].', '.$result["kod_pocztowy"].' '.$result["miejscowosc"].'</td>
		<td class="td2"><a class="zarz" href="adm_zarzadzanie/nocleg_zmien_da.php?id='.$result['id'].'"><button>Edytuj</button></a></td>
		<td class="td2"><a class="pokoje" href="../zarzadzanie_noclegownia_administrator/index.php?akcja=listujPokoje&id='.$result['id'].'"><button>Pokoje</button></a></td>
		<td class="td2"><a href="adm_zarzadzanie/noclegownia_usun.php?id='.$result['id'].'"><button>Usuń</button></a></td>
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
