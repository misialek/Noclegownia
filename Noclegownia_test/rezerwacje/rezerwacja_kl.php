<?php
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
	<input type="hidden" name="id_pok" value="'.$id_noc.'" />
	<tr><td><div class="wrapper">Data i godz. przybycia:</td><td><input type="text" style="width:140px;" name="rezerwacja_od" id="datepicker" class="input input2"></div></td>
	<td>
					<select name="hour_od">
					<option value="00">00</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12" selected>12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
				</select><b>:</b>
				<select name="minute_od">
					<option value="00" selected>00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
				</select></td></tr>
	<tr><td><div class="wrapper">Data i godz. wyjazdu:</td><td><input type="text" style="width:140px;" name="rezerwacja_do" id="datepicker1" class="input input2"></div></td>
		<td>
					<select name="hour_do">
					<option value="00">00</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12" selected>12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
				</select><b>:</b>
				<select name="minute_do">
					<option value="00" selected>00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
				</select></td></tr>
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