<html>
	<body>
		<table>
			<form enctype="multipart/form-data" action="nocleg_dodanie.php" method="post">
					<div>
						<input type="hidden" name="dodanie_noc" value="TRUE" />
						<tr><td><div class="wrapper">Nazwa: </td><td><input name="nazwa" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper">Miejscowość: </td><td><input name="miejscowosc" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper">Kod pocztowy: </td><td><input name="kod_pocztowy" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper">Ulica: </td><td><input name="ulica" type="text" class="input" ><br /></div></td></tr>
						<tr><td><div class="wrapper">Opis: </td><td><textarea name="opis" cols="40" rows="2" style="height:140px;"></textarea><br /></div></td></tr>
						<tr><td>Wybierz typ noclegowni: </td>
						<td><select name="typ_noclegu">
							<option>Agroturystyka</option>
							<option>Hotel</option>
							<option>Motel</option>
							<option>Kwatera prywatna</option>
							<option>Schronisko</option>
						</select></td>
						<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
						<tr><td>Zdjęcie</td><td><input type="file" name="zdjecie"></td></tr>
						<tr><td><center><p><input type="submit" value="Dodaj" /></p></center></td><td></td></tr>
					</div>
				</form>
		</table>		
	</body>
</html>