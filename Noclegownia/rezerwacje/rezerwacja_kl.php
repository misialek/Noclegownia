﻿<?php
session_start();
include '../db.php';
if(@$_SESSION['zalogowany']==1){
if(isset($_GET['rez'])){
$id_noc=($_GET['rez']);
?>

<html lang="pl">
<head>
<title>Rezerwacja</title>
<meta charset="utf-8">

<script type="text/javascript" src="../js/jquery.js" ></script>
<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>
<link type="text/css" href="../css/jquery-ui.css" rel="stylesheet">
<link type="text/css" href="../css/datepicker.css" rel="stylesheet">

<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body>
							<div class="wrapper">
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
			$( "#datepicker1" ).datepicker();
	});
	
	
	</script>
<?php
echo '<br /><br /><br /><center><b><h1>Rezerwuj pokój<br /></h1></b><br /></br>
<table id="regi" style="color:#000;margin:0 0 0 30px" border="0">
    <form action="rezerwacja_klient.php" method="post">
	<input type="hidden" name="wolna_data" value="TRUE" />
	<input type="hidden" name="id_pok" value="'.($_GET['rez']).'" />
	<tr><td><div class="wrapper">Data przybycia:</td><td><input type="text" name="rezerwacja_od" id="datepicker" class="input input2"></div></td></tr>
	<tr><td><div class="wrapper">Data wyjazdu:</td><td><input type="text" name="rezerwacja_do" id="datepicker1" class="input input2"></div></td></tr>
    </table><br />
	<input type="submit" value="Dodaj" /><br>
</center>';
?>	
							<br>
						</div>				
</body>
</html>
<?php
}
}else{echo 'Zaloguj się!!!';}
?>