﻿<?php
session_start();
/*  if(isset($_GET['wylo']) && $_GET['wylo']=='tak'){
	session_destroy();
	$_SESSION = array();
	$_SESSION['zalogowany']=0;
	header('Location: my.php ');} */
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title>O nas</title>
<meta charset="utf-8">
<link rel="stylesheet" href="button/stylesheets/css3buttons.css" type="text/css" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/colorbox.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.js" ></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/colorbox.js"></script> 
<script type="text/javascript" src="js/colorbox-min.js"></script> 
<script type="text/javascript" src="js/Myriad_Pro_600.font.js"></script>
<script type="text/javascript" src="js/datepicker.js"></script>
<link type="text/css" href="css/jquery-ui.css" rel="stylesheet">
<link type="text/css" href="css/datepicker.css" rel="stylesheet">

<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
<?php
include 'include/colorbox_class.php';
?>
</head>
<body id="page1">
<?php
include 'include/belka.php';
?>
<div class="extra">
	<div class="main">
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Tania baza noclegowa</a></h1>
				<div class="right">
					<div class="wrapper">
						<form id="search">
							<div>
							</div>
						</form>
					</div>
<?php
include 'include/menu.php';
?>
				</div>
			</div>	
			<nav>
<?php
include 'include/zakladki.php';
?>
			</nav>
<?php
include 'include/wyszukiwarka.php';
?>
			<article class="col2 pad_left1">
				<span style="font-size:32px;color:#323232;line-height:40px;padding:4px 0 15px 0;letter-spacing:-1px"><strong>O NAS</strong></span>
			<br /><br /><br />
			<table width="100%">
			<tr>
				<td width="45%">
				<span style="font-size:20px;padding:4px 0 18px 0;letter-spacing:-1px"><center>Stronę przygotowali</center></span><br /><br />
				<span style="font-size:16px">
				<li />Michał Tomaszczyk<br /><br />
				<li />Maciej<br /><br />
				<li />Łukasz Wachowiak<br /><br />
				<li />Bartosz Wyzuj
				</span>
				</td>
				<td>
				<br /><img src="images/wsnhid.gif"  height="" width="260" />
				</td>
			</tr>
			</table><br /><br /><br />
			<span style="font-size:12px">Strona powstała w celu zaliczenia przedmiotu "Projekt zespołowy".</span>
			</article>
        <section id="content"></section>
</div>
<?php
include 'include/stopka.php';
?>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>