<link rel="stylesheet" href="../../css/style2.css" type="text/css" media="all">
<html>
	<body>
	<center><h2>Dodaj Noclegownie</h2></center>
		<table align="center">
			<form enctype="multipart/form-data" action="nocleg_dodanie.php" method="post" ENCTYPE="multipart/form-data">
					<div>
						<input type="hidden" name="dodanie_noc" value="TRUE" />
						<tr><td><div class="wrapper"><strong>Nazwa: </strong></td><td><input name="nazwa" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper"><strong>Miejscowość: </strong></td><td><input name="miejscowosc" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper"><strong>Kod pocztowy: </strong></td><td><input name="kod_pocztowy" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper"><strong>Ulica: </strong></td><td><input name="ulica" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper"><strong>Nr rachunku: </strong></td><td><input style="width: 230px;" name="nr_bank" type="text" class="input" ><br /><span style="font-size:10">np. 32 2130 0004 2001 0354 6652 0001</span><br /></div></td></tr>
						<tr><td><div class="wrapper"><strong>Opis: </strong></td><td><textarea name="opis" rows="2" style="height:70px;width:240px;"></textarea><br /></div></td></tr>
						<tr><td><strong>Wybierz typ noclegowni: </strong></td>
						<td><select name="typ_noclegu">
							<option>Agroturystyka</option>
							<option>Hotel</option>
							<option>Motel</option>
							<option>Kwatera prywatna</option>
							<option>Schronisko</option>
						</select></td>
						<tr><td><strong>Zdjęcie: </strong></td><td><input type="file" name="zdjecie"></td></tr>
						<table width="90%">
						<tr><td><center><p><input type="submit" value="Dodaj" /></p></center></td></tr>
						</table>
					</div>
				</form>
		</table>		
	</body>
</html>