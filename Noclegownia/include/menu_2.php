					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<?php
if(@$_SESSION['zalogowany']==1){
$recepcjonista=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
if (mysql_num_rows($recepcjonista) == 1) {
echo '<li><a href="admin/index.php">Zarządzanie</a></li>';
}else{
?><li><a class='zarz' href="zarzadzanie/uzytkownik.php">Zarządzanie</a></li><?php
	}
?>
<li><a class='rez' href="rezerwacje/uzytkownik.php">Rezerwacje</a></li>
<li><a href="index.php?wylo=tak">Wyloguj</a></li>
<?php
}else{
?>
<li><a class='reg' href="regreg.php">Rejestracja</a></li>
<li><a class='log' href="logowanie.php">Logowanie</a></li>
<?php
}
?>
							</ul>
						</nav>
					</div>	