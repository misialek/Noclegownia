					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<?php
if(@$_SESSION['zalogowany']==1){
$recepcjonista=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
if (mysql_num_rows($recepcjonista) == 1) {
echo '<li><a href="admin/index.php">Zarządzanie</a></li>';
?><li><a style="cursor:pointer;hand" onclick="window.open('<?php echo 'rezerwacje/uzytkownik.php';  ?>', 'Komentarze', 'toolbar=no, scrollbars=yes, location=no, height=600,width=1066');">Rezerwacje</a></li><?php
}else{
?><li><a class='zarz' href="zarzadzanie/uzytkownik.php">Zarządzanie</a></li>
<li><a class='rez' href="rezerwacje/uzytkownik.php">Rezerwacje</a></li><?php
	}
?>
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