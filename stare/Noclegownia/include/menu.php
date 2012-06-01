					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<?php
if(@$_SESSION['zalogowany']==1){
?>
<li><a href="index.php?wylo=tak">Wyloguj</a></li>	
<li><a class='rez' href="rezerwacje/uzytkownik.php">Rezerwacje</a></li>
<li><a class='zarz' href="zarzadzanie/uzytkownik.php">Zarządzanie</a></li>
<?php
}else{
?>
<li><a class='reg' href="regreg.php"  >Rejestracja</a></li>
<li><a class='log' href="logowanie.php">Logowanie</a></li>
<?php
}
?>
							</ul>
						</nav>
					</div>	