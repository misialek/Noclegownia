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
//session_start();
if (isset($_SESSION['login']))
 { 
echo'<center>';
echo'<font size="40">';
echo'<font color="white"';
echo'<br><br><br><br><br><br><br>';
echo 'Jesteś już zalogowany';
echo'<br>';
echo'<a href="user.php">Przejdz do Panelu użytkownika</a>';
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
  <div class="logoBackground">
  	<div class="logo">spowiedz.xaa.pl</div>
    <div class="author">portal dla bezwstydnych grzeszników</div>
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
  </div>
  <!-- end #header -->
  <div class="allBody">
  	
	<div class="leftBody">
    	<p>
        	<b><img src="images/3.jpg" align="right" width="150" height="150"><font color="#C0C0C0" size="2">Ojcze niebieski!</b><br><br> 
			Oto ja,<br>
			grzeszne dziecko Twoje, <br>
			przystępuję do Ciebie <br>
			z całą pokorą serca, <br>
			aby uprosić Twoje przebaczenie. <br><br><br>
			Pragnę oczyścić moją duszę <br>
			z licznych grzechów, <br>
			którymi Cię obraziłem. Chcę odprawić dobrą spowiedź <br>
			świętą i z Twoją pomocą szczerze się poprawić. <br>
			Ześlij Ducha świętego do serca mego i wspomóż mnie swoją łaską. <br></font>
    </div>
    <div class="rightBody">
    	<center>
        	<b><h1>LOGOWANIE</h1></b><br /><br />
			
			<div id="tresc">
			
         <form action="log.php" method="post">
    <input type="hidden" name="wyslane" value="TRUE" />
 
    Login: <br><input type="text" name="login" /><br><br>
    Hasło: <br><input type="password" name="haslo" /><br><br>
 
    <input type="submit" value="zaloguj" /><br><br></form>
</center><br>
        </p>
        </div>
    </div>
    <br class="clearfloat" />
    <!-- begin #footer -->
    <div id="footer">
    <p>
        Terms of use | <a title="This page validates as XHTML 1.0 Strict" href="http://validator.w3.org/check/referer" class="footerLink"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a title="This page validates as CSS" href="http://jigsaw.w3.org/css-validator/check/referer" class="footerLink"><abbr title="Cascading Style Sheets">CSS</abbr></a><br />
        Copyright &copy; spowiedz.xaa.pl Designed by ks.Grzesznik>
    </p>
    </div>
    <!-- end #footer -->
  </div>
</div>
<!-- end #container -->
</body>
</html>