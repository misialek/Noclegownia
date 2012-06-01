<!DOCTYPE html>

<html lang="en">

<head>

<title>Administrator - Noclegownie</title>

<meta charset="utf-8">

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">

<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">

<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">

<link rel="stylesheet" href="../css/colorbox.css" type="text/css" media="all" />

<script type="text/javascript" src="../js/jquery.js" ></script>



<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/cufon-yui.js"></script>

<script type="text/javascript" src="../js/cufon-replace.js"></script>  

<script type="text/javascript" src="../js/colorbox.js"></script> 

<script type="text/javascript" src="../js/colorbox-min.js"></script> 

<script type="text/javascript" src="../js/Myriad_Pro_600.font.js"></script>

<script type="text/javascript" src="../js/datepicker.js"></script>

<link type="text/css" href="../css/jquery-ui.css" rel="stylesheet">

<link type="text/css" href="../css/datepicker.css" rel="stylesheet">





<!--[if lt IE 9]>

	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>

	<script type="text/javascript" src="js/html5.js"></script>

<![endif]-->

<script type="text/javascript">

  $(document).ready(function(){
$(".reg").colorbox({iframe:true, width:"465px", height:"470px"});
$(".rez").colorbox({iframe:true, width:"1000", height:"600"});
$(".zarz").colorbox({iframe:true, width:"600px", height:"520px"});
$(".log").colorbox({iframe:true, width:"465px", height:"470px"});
});
	</script>
	
	
<?php

session_start();

if (!isset($_SESSION['login']))
 { 
echo'<center>';
echo'<font size="40">';
echo'<font color="black"';
echo'<br><br><br><br><br><br><br>';
echo 'Ta strona wymaga zalogowania';
echo'<br>';
echo'<a href="../logowanie.php">Zaloguj sie</a>';
  // header("Location: index.php");
   exit;
}
?>

</head>
<body id="page1">

<div class="extra">

	<div class="main">

<!-- header -->

		<header>

			<div class="wrapper">
				<h1><a href="../index.php" id="logo">Tania baza noclegowa</a></h1>
<?php
echo '<font size="2">Zalogowany: <b>' .$_SESSION['login']. '</b></font>';
?>

							
				<div class="right">
					<div class="wrapper">
						<!--<form id="search">-->
							<div>
								<a class='right' href="admin/index.php">Administracja</a>
							</div>
						<!--</form>-->
					</div>
					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<li><a href="../przegladaj.php?wylo=tak">Wyloguj</a></li>	
<li><a class='rez' href="../rezerwacje/uzytkownik.php">Rezerwacje</a></li>
<li><a class='zarz' href="../zarzadzanie/uzytkownik.php">Zarz¹dzanie</a></li>
							</ul>
						</nav>
					</div>	
				</div>
			</div>	

			<nav>

				<ul id="menu">

					<li><a href="index.php" class="nav2">Uzytkownicy</a></li>

					<li><a href="noclegi.php" class="nav2">Noclegi</a></li>

					<li><a href="pokoje.php" class="nav2">Pokoje</a></li>

					<li><a href="#" class="nav2">Standard</a></li>

					<li class="end"><a href="#" class="nav2">Finanse</a></li>

				</ul>

			</nav>

			

			

			

<!-- / header -->

<!-- content -->

		<section id="content">

			<article class="col1">

				<h3>cos tam cos tam</h3>

				<div class="pad">

					dfwfsdf

				</div>

       		</article>

			<article class="col2 pad_left1">

				<h2>Wyniki wyszukiwania</h2>

				<div class="wrapper under">

					11

				</div>

				<div class="wrapper">

					22

				</div>

       		</article>

		</section>

		

		

  

 



<!-- / content -->

	</div>

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