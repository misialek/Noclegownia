					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<?php
if(@$_SESSION['zalogowany']==1){
?>
<li><a class="haslo" href="adm_zarzadzanie/admin_has.php">Zm. hasło</a></li>
<li><a href="../index.php?wylo=tak">Wyloguj</a></li>	
<?php
}
?>
							</ul>
						</nav>
					</div>	