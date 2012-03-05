<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>spowiedz</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
		<script type="text/javascript" src="rejestracja.js" charset="UTF-8"></script>


				



<!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
#sidebar1 { padding-top: 30px; }
#mainContent { zoom: 1; padding-top: 15px; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]--></head>
<!--<script language="JavaScript">
<!--
var password = prompt("Dostęp do strony ograniczony! Podaj hasło.","hasło");
if (password == "dupa_dupa_dupa")
{
alert("Hasło poprawne! Witaj na moim blogu!");
} else {
alert("Błędne hasło! Spróbuj ponownie.");
javascript:history.back()
}
-->
</script>

<body>
<!-- begin #container -->
<div id="container"> 
  <!-- begin #header -->
  <div id="header">
  <div class="logoBackground">
  	<div class="logo">spowiedz.xaa.pl</div>
    <div class="author">Portal dla bezwstydnych grzeszników</div>
  </div>
  <div class="menu">
  	<ul>
    	<li id="active"><a href="index.php">Główna</a></li>
        <li id="active"><a href="logowanie.php">Logowanie</a></li>
        <li id="active"><a href="">Misja</a></li>
        <li id="active"><a href="">Blog</a></li>
        <li id="active"><a href="">Kontakt</a></li>        
    </ul>
  	</div>
  

  </div>
  
  <!-- end #header -->
  <div class="allBody">
  
  <div class="leftBody">
    	<p>
        	<b><img src="images/1.jpg" width="150" height="150" align="left"><font color="#C0C0C0">Witaj na strona, 
			która jest wiodącym przedmiotem ostatnich rozważań ojca Rodzynka nad sensem istnienia oraz sensem spowiedzi wirtualnej. 
			Okazuje się jednak, że warto...warto spowiadać się w takim miejscach jak to. Cisza, spokój nastraja do głębokich przemyśleń nad własnym postepowaniem,
			karygodnymi czynami oraz chęcią odpokutowania. Nie zwlekaj dłużej, nie wychowuj w sobie diabła.<br><br> WYSPOWIADAJ SIĘ SYNU! WYSPOWIADAJ SIĘ CÓRKO!</font>
        </p>
    </div>
  	
    <div class="rightBody">
	
    	<center>
        	<b><h1>REJESTRACJA</h1></b><br/><br/></center>
			
		<div id="tresc">

          <form id="rejestracja" action="reg.php"  method="post">
		 
  <input type="hidden" name="wyslane" value="TRUE" /><br><br><br>
	<label for="imie" class="bla">Imie:</label><br>
	<input type="text" name="imie" id="imie"  class="bla"/><br><br>
   <label for="nazwisko" class="bla">Nazwisko:</label><br> 
   <input type="text" name="nazwisko" id="nazwisko" class="bla"/><br><br>
    <label for="login" class="bla">Login*:</label><br> 
	<input type="text"  id="login" name="login"  class="bla"/><br><br>
    <label for="haslo" class="bla">Haslo*:</label><br> 
	<input type="password" name="haslo" id="haslo" class="bla"/><br><br>
    <label for="haslo2" class="bla">Powtórz haslo*:</label><br>
	<input type="password" name="haslo2" id="haslo2" class="bla"/><br><br>
  <label for="email" class="bla">Adres email*:</label><br> 
  <input type="text" id="email" name="email" class="bla" /><br><br>
   <label for="email2" class="bla">Powtórz email*:</label><br> 
   <input type="text" id="email2" name="email2" class="bla"><br><br>
   

<center><input type="submit" class="wyslij" value="wyślij" /></form></center>


      
		
        </div><br>
    </div>
    <br class="clearfloat" />
    <!-- begin #footer -->
    <div id="footer">
    <p>
        Terms of use | <a title="This page validates as XHTML 1.0 Strict" href="http://validator.w3.org/check/referer" class="footerLink"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a title="This page validates as CSS" href="http://jigsaw.w3.org/css-validator/check/referer" class="footerLink"><abbr title="Cascading Style Sheets">CSS</abbr></a><br />
        Copyright &copy; spowiedz.xaa.pl. Designed by ks.Grzesznik>
    </p>
    </div>
    <!-- end #footer -->
  </div>
</div>
<!-- end #container -->
</body>
</html>
