<?php
session_start();
include '../db.php';
$login = $_SESSION['login'];
    $uprawnienia=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta=10"));
    if (mysql_num_rows($uprawnienia) == 1) {
?>

<!DOCTYPE html>
<html lang="pl">

<head>

<title>Administrator - Home</title>

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


</head>
<body id="page1">
<?php
include '../include/belka_admin.php';
?>

<div class="extra">

	<div class="main">

<!-- header -->

		<header>

			<div class="wrapper">
				<h1><a href="../index.php" id="logo">Baza noclegowa</a></h1>
				<div class="right">
					<div class="wrapper">
						<form id="search">
							<div>
							</div>
						</form>
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

		<section id="content">

			<article class="col1">

				<h3>Informator</h3>

				<div class="pad">

					Recepcionista -   : Dodał pokój

				</div>

       		</article>

			<article class="col2 pad_left1">

				<h2>Panel administracyjny</h2>

				<div class="wrapper under">

					W panelu można znaleść ważne informacje na temat portalu jak i efektywnie zarządzań nim.

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
<?php
 }else {header('Location: denied.php ');}
 ?>