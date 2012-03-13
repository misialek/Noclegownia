<?php
session_start();
if(@$_SESSION['zalogowany']==1)
{
    header('Location: przegladaj.php ');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<script type="text/javascript">
</script>
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
<script type="text/javascript">
  $(document).ready(function(){
  parent.$.fn.colorbox.close();


$(".reg").colorbox({iframe:true, width:"465px", height:"470px"});
$(".rez").colorbox({iframe:true, width:"1000", height:"600"});
$(".log").colorbox({width:"465px", height:"465px", iframe:true, 
        onClosed:function(){ location.reload(true); } });
		});
	</script>
</head>
<body id="page1">
<div class="extra">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Tania baza noclegowa</a></h1>
				<div class="right">
					<div class="wrapper">
						<form id="search">
							<div>
							</div>
						</form>
					</div>
					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<li><a class='reg' href="regreg.php"  >Rejestracja</a></li>
<li><a class='log' href="logowanie.php">Logowanie</a></li>
							</ul>
						</nav>
					</div>	
				</div>
			</div>	
			<nav>
				<ul id="menu">
					<li><a href="index.php" class="nav1">Strona glowna</a></li>
					<li><a href="my.php" class="nav2">O nas</a></li>
                    <li><a href="przegladaj.php" class="nav3">Przeglądaj miejsca</a></li>
					<li><a href="promocje.php" class="nav4">Promocje</a></li>
					<li class="end"><a href="kontakt.php" class="nav5">Kontakt</a></li>
				</ul>
			</nav>
			<article class="col1">
				<ul class="tabs">
					<li><a class="active">Znajdz miejsce</a></li>
				</ul>
				<div class="tabs_cont">
					<form id="form_1" action="" method="post">
						<div class="bg">
							<div class="wrapper">
								<div> Typ miejsca:
								<select name="nazwa" class="input input2">
		<option>Hotel</option>
		<option>Agroturystyka</option>
		<option>Kwatera prywatna</option>
		<option>Schronisko</option>
		<option>Motel</option>		
	</select>
	</div>
				
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
			$( "#datepicker1" ).datepicker();
	});
	
	
	</script>


<div class="wrapper">Miasto:<input type="text" class="input input2"></div>
<div class="wrapper">Data przybycia:<input type="text" id="datepicker" class="input input2"></div>
<div class="wrapper">Data wyjazdu:<input type="text" id="datepicker1" class="input input2"></div>
</div><!-- End demo -->				
							
							<div class="wrapper">
								<div class="radio"><input type="checkbox" name="tv">TV</div>
                                <div class="radio"><input type="checkbox" name="logowka">Lodówka</div>
                                <div class="radio"><input type="checkbox" name="wc">WC</div>
                            	<div class="radio"><input type="checkbox" name="prysznic">Prysznic</div>
                                <div class="radio"><input type="checkbox" name="wanna">Wanna</div>
                                <div class="radio"><input type="checkbox" name="jacuzzi">Jacuzzi&nbsp;&nbsp;</div>
                                <div class="radio end"><input type="checkbox" name="klimatyzacja">Klimatyzacja</div>
								<div class="radio end"><input type="checkbox" name="internet">Internet</div>
							</div>
							<a href="#" class="button" onclick="document.getElementById('form_1').submit()">Szukaj</a>
							<br>
						</div>							
					</form>
				</div>
			</article>
			<article class="col1 pad_left1">
				<div class="text">
					<h2>Przeglądaj</h2>
				</div>
			</article>
		</header>
        
	<div class="block"></div>
</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			Baza noclegowa<br/>
			Copyright 2012
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>