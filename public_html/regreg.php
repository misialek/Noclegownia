<link rel="stylesheet" href="css/style2.css" type="text/css" media="all">
<center>
        	<b><h1>REJESTRACJA</h1></b><br /><br />
	<form action="reg.php" method="post">
            <table>
		<input type="hidden" name="wyslane" value="TRUE" />
		<tr><td>Imie:</td><td><input type="text" name="imie" /></td></tr>
		<tr><td>Nazwisko:</td><td><input type="text" name="nazwisko" /></td></tr>
		<tr><td>Login:</td><td><input type="text" name="login" /></td></tr>
		<tr><td>Hasło:</td><td><input type="password" name="haslo" /></td></tr>
		<tr><td>Powtórz hasło:</td><td><input type="password" name="haslo2" /></td></tr>
		<tr><td>Adres e-mail:</td><td><input type="text" name="email" /></td></tr>
		<tr><td>Powtórz adres e-mail:</td><td><input type="text" name="email2" /></td></tr>
	</table>
            <br /><input type="submit" value="wyślij" /></form>
</center>