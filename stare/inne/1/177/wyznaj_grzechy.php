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
  <div class="logoBackground">
  	<div class="logo">e-spowiedz.com</div>
    <div class="author">portal dla bezwstydnych grzesznikow</div>
  </div>
  <div class="menu">
  	<ul>
    	<li id="active"><a href="index.php">Glowna</a></li>
        <li><a href="logowanie.php">Logowanie</a></li>
        <li><a href="">Misja</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Kontakt</a></li>
    </ul>
  </div>
  </div>
  <!-- end #header -->
  <div class="allContent">
  	<div class="leftContent">
    	<p>
        	<b>All website template is released under a Creative Commons Attribution 2.5 License</b><br /><br />
            We request you retain the full copyright notice below including the link to <a href="http://www.flash-templates-today.com">www.flash-templates-today.com</a>. This not only gives respect to the large amount of time given freely by the developers but also helps build interest, traffic and use of our free and paid designs. If you cannot (for good reason) retain the full copyright we request you at least leave in place the Website Templates line, with Website Templates linked to <a href="http://www.flash-templates-today.com">www.flash-templates-today.com</a>. If you refuse to include even this then support may be affected.<br /><br />
            <b>You are allowed to use this design only if you agree to the following conditions:</b><br />
            - You can not remove copyright notice from any our template without our permission.<br />
            - If you modify any our template it still should contain copyright because it is based on our work.<br />
            - You may copy, distribute, modify, etc. any our template as long as link to our website remains untouched.<br /><br />
            For support please visit <a href="http://www.flash-templates-today.com/contact.php">http://www.flash-templates-today.com/contact.php</a> 
        </p>
    </div>
    <div class="rightContent">
    	<center>
        	<b><h1>WYZNAJ GRZECHY</h1></b><br /><br />
        


<?PHP
  include('newmsg.php');
?>





		
        </p>
        
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
