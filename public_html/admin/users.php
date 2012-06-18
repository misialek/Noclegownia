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
	$sql="SELECT * FROM uzytkownik ORDER BY typ_konta LIMIT ".($start).",".$na_stronie."";
	$wynik1=mysql_query($sql);
	
	echo '<table class="table" width="600">
		<tr align="center">
			<th class="th">Login</th>
			<th class="th">Imię</th>
			<th class="th">Nazwisko</th>
			<th class="th">Email</th>
			<th class="th">Typ konta</th>
			<th class="th"></th>
			<th class="th"></th>
		</tr>';
		
if( mysql_num_rows( $wynik1 ) > 0){
            
while($result=mysql_fetch_assoc($wynik1)){	
if($result["typ_konta"] == 10){$user='Administrator';}
if($result["typ_konta"] == 20){$user='Recepcjonista';}
if($result["typ_konta"] == 30){$user='Klient';}

echo '<tr align="center">
		<td class="td">'.$result["login"].'</td>
		<td class="td">'.$result["imie"].'</td>
		<td class="td">'.$result["nazwisko"].'</td>
		<td class="td">'.$result["email"].'</td>
		<td class="td">'.$user.'</td>
		<td class="td2"><a class="user" href="adm_zarzadzanie/uzytkownik_zmien_da.php?id='.$result['id'].'"><button>Edytuj</button></a></td>
		<td class="td2"><a href="adm_zarzadzanie/uzytkownik_usun.php?id='.$result['id'].'"><button>Usuń</button></a></td>
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
