<?php
session_start();
if(isset($_GET['wylo']) && $_GET['wylo']=='tak'){
	session_destroy();
	$_SESSION = array();
	$_SESSION['zalogowany']=0;
	header('Location: przegladaj.php ');}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title>Przeglądaj pokoje</title>
<meta charset="utf-8">
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
$(".rez").colorbox({iframe:true, width:"1000", height:"600"});
$(".zarz").colorbox({iframe:true, width:"600px", height:"520px"});
$(".zlec").colorbox({iframe:true, width:"600px", height:"400px"});
$(".log").colorbox({iframe:true, width:"465px", height:"465px"});
$(".reg").colorbox({iframe:true, width:"465px", height:"470px"});
$(".rez").colorbox({iframe:true, width:"1000", height:"600"});
 });
	</script>
</head>
<body id="page1">
<?php
if(@$_SESSION['zalogowany']==1){
$login = $_SESSION['login'];
$inf=mysql_query("SELECT * FROM uzytkownik WHERE login='$login'");
$info=mysql_fetch_assoc($inf);
echo '<table border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed; 	text-align: center;  color: #FFFFFF;background-color: #313131; width:100%;"> 
<td><strong>Zalogowany: '.$info['imie'].' '.$info['nazwisko'].'</strong></td></table>';}
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
					<div class="wrapper">
						<nav>
						<ul id="top_nav">
<?php
if(@$_SESSION['zalogowany']==1){
?>
<li><a href="przegladaj.php?wylo=tak">Wyloguj</a></li>	
<li><a class='rez' href="rezerwacje/uzytkownik.php">Rezerwacje</a></li>
<li><a class='zarz' href="zarzadzanie/uzytkownik.php">Zarządzanie</a></li>
<?php
}else{
?>
<li><a class='reg' href="regreg.php"  >Rejestracja</a></li>
<li><a class='log' href="logowanie.php">Logowanie</a></li>
<?php
}
?>
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
			<article class="col2 pad_left1">
			<h2>Przegladaj</h2>
<?php

if(isset($_GET['pok'])){
$id=($_GET['pok']);
mysql_query("SET NAMES utf8");
$sql="SELECT * FROM noclegownia WHERE id='$id'";
  $query=mysql_query($sql);
  while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">
					<figure class="left marg_right1"><img src="images/page1_img4.jpg" alt=""></figure>
					<p class="pad_bot2"><strong>'.$result['nazwa'].', <b>'.$result['typ'].'</b></strong></p>
					<p class="pad_bot2">'.$result['opis'].'</p>
					<p class="pad_bot2">'.$result['miejscowosc'].', '.$result['kod_pocztowy'].', '.$result['kod_pocztowy'].'</p>
				</div>
				</article>';
// pobieram pokoje
	mysql_query("SET NAMES utf8");
	$sql="SELECT * FROM pokoj WHERE id_miejsce='$id'";
	$query=mysql_query($sql);
	while($result=mysql_fetch_assoc($query))
	{
	  echo'<article class="col2"><div class="wrapper under"><p>'.$result['wc'].'</p>';
	  echo'<a align="right" class="zlec" class="button" href="rezerwacje/rezerwacja_kl.php?rez='.$result['id_pok'].'"><button>Rezerwuj</button></a><br /><br />Obecne rezerwacje pokoju: ';
	  	$miejsce=$result['id_miejsce'];
		$sql="SELECT * FROM rezerwacje WHERE id_pokoj=$miejsce GROUP BY data_od";
		$rezerwacje=mysql_query($sql);
		while($rezerwacja=mysql_fetch_assoc($rezerwacje))
		{echo ''.date('d.m.Y' , $rezerwacja['data_od']).' - '.date('d.m.Y' , $rezerwacja['data_do']).',&nbsp;&nbsp;';}
		echo '</div></article>';
	}
 }
echo '<br /><br /><a class="button" href="przegladaj.php?start='.$_GET['start'].'">Wstecz</a>';
}else{
if(isset($_GET['start'])){
$start = $_GET['start'];}else{header('Location: przegladaj.php?start=0');}
$na_stronie = 2;

mysql_query("SET NAMES utf8");
$sql = "SELECT * FROM noclegownia LIMIT ".($start).",".$na_stronie."";

$query=mysql_query($sql);
if( mysql_num_rows( $query ) > 0)
{
//$row = mysql_fetch_row($query))
  while($result=mysql_fetch_assoc($query))
  {
  	echo '<article class="col2">
				<div class="wrapper under">
					<figure class="left marg_right1"><img src="images/page1_img4.jpg" alt=""></figure>
					<p class="pad_bot2"><strong>'.$result['nazwa'].', <b>'.$result['typ'].'</b></strong></p>
					<p class="pad_bot2">'.$result['opis'].'</p>
					<p class="pad_bot2">'.$result['miejscowosc'].', '.$result['kod_pocztowy'].', '.$result['ulica'].'</p><br>
					<a href="przegladaj.php?start='.$_GET['start'].'&pok='.$result['id'].'" class="marker_2"></a>
				</div>
				</article>';
	echo '<hr>';
 }
$wykonaj=mysql_query("SELECT * FROM noclegownia");
$znaleziono=mysql_num_rows($wykonaj);
if($znaleziono>$na_stronie) {
print '<center>Strona | ';
for($i=0; $i<ceil($znaleziono/$na_stronie); $i++)
print '<a href="przegladaj.php?start='.($i*$na_stronie).'"><b>'.($i+1).'</b></a> | ';
}  
print '</center>';

}
}
?>
			</article>
        <section id="content"></section>
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