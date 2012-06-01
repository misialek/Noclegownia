<!DOCTYPE html>

<html lang="pl">

<head>

<title>Administrator - Noclegi</title>

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

<?php
include '../include/colorbox_class.php';
?>
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
<?php
echo '<table border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed; 	text-align: center;  color: #FFFFFF;background-color: #313131; width:100%;"> 
<td><strong>Zalogowany: '.$_SESSION['login'].' </strong></td></table>';
?>
<div class="extra">

	<div class="main">

<!-- header -->

		<header>

			<div class="wrapper">
				<h1><a href="../index.php" id="logo">Tania baza noclegowa</a></h1>


							
				<div class="right">
					<div class="wrapper">
						<!--<form id="search">-->
							<div>
								<a class='right' href="admin/index.php">Administracja</a>
							</div>
						<!--</form>-->
					</div>
<?php
include '../include/menu_admin.php';
?>	
				</div>
			</div>	

			<nav>

<?php
include '../include/zakladki_admin.php';
?>

			</nav>

			

			

			

<!-- / header -->

<!-- content -->
<!-- szukaj,dodaj,edytuj -->
		<section id="content">

			<article class="col1">

				<h3>Nowosci</h3>

				<div class="pad">

					Dodano pokoj w hotelu:

				</div>

       		</article>
			
			<article class="col1">
				<div class="pad">
					<a href="dod_noc.php" class="button">Dodaj Noclegownie</a>
				</div>
			</article>
			
			<article class="col1">
				<div class="pad">
					<a href="szukaj_noc.php" class="button">Szukaj Noclegownie</a>
				</div>
			</article>						

		</section>

		

		

  

 



<!-- / content -->

	</div>

	<div class="block"></div>

</div>

<?php
include '../include/stopka.php';
?>

<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>
