<?php
session_start();
include '../db.php';
if(@$_SESSION['zalogowany']==1){
if(isset($_GET['zmien']) && (isset($_GET['id_pok']))){
$id_rezerwacji=($_GET['zmien']);
$id_pokoj=($_GET['id_pok']);
?>

<html lang="pl">
<head>
<title>Przesuń termin rezerwacji</title>
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
echo '<table style="width: 100%">
<td><br /><a href="rezerwacja_rezerwacje.php?id_rez='.$id_rezerwacji.'&id_pok='.$id_pokoj.'" style="text-align: left;  padding-left: 30px"><button>Sprawdź zarezerwowane terminy</button></a></td>
</table>';
$daty=mysql_query("SELECT * FROM rezerwacje WHERE id_rez='$id_rezerwacji'");
$data=mysql_fetch_assoc($daty);
echo '<br /><br /><br /><br /><br /><center><b><h1>Przesuń termin rezerwacji<br /></h1></b><br /></br><br />
<table id="regi" style="color:#000;margin:0 0 0 30px" border="0">
    <form action="rezerwacja_zmien.php" method="post">
	<input type="hidden" name="zmien" value="TRUE" />
	<input type="hidden" name="id_rez" value="'.$id_rezerwacji.'" />
	<input type="hidden" name="id_pok" value="'.$id_pokoj.'" />
	<tr><td><div class="wrapper">Data przybycia:</td><td><input type="text" name="rezerwacja_od" value="'.date('m/d/Y' , $data['data_od']).'" id="datepicker" class="input input2"></div></td></tr>
	<tr><td><div class="wrapper">Data wyjazdu:</td><td><input type="text" name="rezerwacja_do" value="'.date('m/d/Y' , $data['data_do']).'" id="datepicker1" class="input input2"></div></td></tr>
    </table><br />
	<input type="submit" value="Przesuń" /><br>
</center>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<a href="uzytkownik.php" style="text-align: left;  padding-left: 30px"><button>Wstecz</button></a></td>';
?>	
							<br>
						</div>				
</body>
</html>
<?php
}
}else{header('Location: ../index.php ');}
?>