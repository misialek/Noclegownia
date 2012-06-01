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