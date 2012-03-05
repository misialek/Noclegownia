<?php

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Free Css Template 177</title>
<link href="styles.css" rel="stylesheet" type="text/css" />

<?php



if (!isset($_SESSION['login']))
 { 
echo'<center>';
echo'<font size="40">';
echo'<font color="white"';
echo'<br><br><br><br><br><br><br>';
echo 'Ta strona wymaga zalogowania';
echo'<br>';
echo'<a href="logowanie.php">Zaloguj sie</a>';
  // header("Location: index.php");
   exit;
}
?>
<!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
#sidebar1 { padding-top: 30px; }
#mainContent { zoom: 1; padding-top: 15px; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]--></head>

<body>
<!-- begin #container -->
<div id="container"> 
  <!-- begin #header -->
  <div id="header">
  	<div class="login">
  <log><li> Zalogowany jako:<a href="user.php"> <? echo $_SESSION["login"]; ?></a></li></log>
  </div>
  <div class="logoBackground">
  	<div class="logo">spowiedz.xaa.pl</div>
    <div class="author">portal dla bezwstydnych grzesznikow</div>
  </div>
  <div class="menu">
  	<ul>
    	<li id="active"><a href="index.php">Główna</a></li>
        <li><a href="logowanie.php">Logowanie</a></li>
        <li><a href="">Misja</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Kontakt</a></li>
    </ul>
  </div>
   <div class="menumini">
  	<ul>
  		<li id="active"><a href="wyznaj_grzechy.php">Wyznaj grzechy</a></li>
        <li id="active"><a href="odbierz_pokute.php">Odbierz pokutę</a></li>
        <li id="active"><a href="logout.php">Wyloguj</a></li>
  	 </ul>
  	</div>
  </div>
  <!-- end #header -->
  <div class="allContent">
  	
    <div class="rightContent">
    	<center>
        	<b><h1>ODBIERZ POKUTĘ</h1></b><br /><br />
        
<div id="tresc">

<?PHP
  include('odbierz.php');
?>
<br><br>


</center>
        </p>
        </div>


		
        
        
    </div>
    <br class="clearfloat" />
    <!-- begin #footer -->
    <div id="footer">
    <p>
        Terms of use | <a title="This page validates as XHTML 1.0 Strict" href="http://validator.w3.org/check/referer" class="footerLink"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a title="This page validates as CSS" href="http://jigsaw.w3.org/css-validator/check/referer" class="footerLink"><abbr title="Cascading Style Sheets">CSS</abbr></a><br />
        Copyright &copy; Old Cars. Designed by <a href="http://www.flash-templates-today.com" title="Free Flash Templates">Free Flash Templates</a>
    </p>
    </div>
    <!-- end #footer -->
  </div>
</div>
<!-- end #container -->
</body>
</html>
