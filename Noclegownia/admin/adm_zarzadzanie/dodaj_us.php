<link rel="stylesheet" href="../../css/style2.css" type="text/css" media="all">
<center>
        	<b><h1>Dodaj użytkownika</h1></b><br /><br />
<table border="0"><form id="regist" action="dodaj_user.php" method="post">
	<input type="hidden" name="wyslane" value="TRUE" />
		<tr><td>Imie:</td><td><input type="text" name="imie" /></td></tr>
		<tr><td>Nazwisko:</td><td><input type="text" name="nazwisko" /></td></tr>
		<tr><td>Login:</td><td><input type="text" name="login" /></td></tr>
		<tr><td>Hasło:</td><td><input type="password" name="haslo" /></td></tr>
		<tr><td>Powtórz hasło:</td><td><input type="password" name="haslo2" /></td></tr>
		<tr><td>Adres e-mail:</td><td><input type="text" name="email" /></td></tr>
		<tr><td>Powtórz adres e-mail:</td><td><input type="text" name="email2" /></td></tr>
		<tr><td>Typ konta:</td><td>
				<select name="typ_konta">
					<option value="30">Klient</option>
					<option value="20">Recepcjonista</option>
					<option value="10">Administrator</option>
				</select></td></tr></table><br />
     <input type="submit" value="wyślij" /></form></center>