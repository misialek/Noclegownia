<?php
if(isset($_GET['pok'])){
$id=($_GET['pok']);
mysql_query("SET NAMES utf8");
    $sql="SELECT * FROM noclegownia WHERE id='$id'";
    $query=mysql_query($sql);
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
                include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $sql="SELECT * FROM pokoj WHERE id_miejsce='$id'";
                    	$query=mysql_query($sql);
                    	while($result2=mysql_fetch_assoc($query))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
							echo '<br /><br /><a class="button2" href="przegladaj.php?start='.$_GET['start'].'">Wstecz</a>';
}else{
if(isset($_GET['start'])){
	$start = $_GET['start'];}else{header('Location: przegladaj.php?start=0');}
	$na_stronie = 2;
		$sql = "SELECT * FROM noclegownia LIMIT ".($start).",".$na_stronie."";
		$query=mysql_query($sql);
		if( mysql_num_rows( $query ) > 0){
		//$row = mysql_fetch_row($query))
		while($result=mysql_fetch_assoc($query)){
		echo '<article class="col2">
				<div class="wrapper under">
				<table border="1"><tr><td>
					<figure class="left marg_right1"><img src="images/noclegownia.jpg" alt=""></figure></td>
					<td><p class="pad_bot2"><strong><span style="color: black; font-size: 18pt">'.$result['nazwa'].'</span><br /><br />Typ miejsca: '.$result['typ'].'</strong></p>
					<p class="pad_bot2">Adres: ul. '.$result['ulica'].', '.$result['kod_pocztowy'].' '.$result['miejscowosc'].'</p>
                    <br /><p class="pad_bot2">Opis: '.$result['opis'].'</p>
					<br /><a href="przegladaj.php?start='.$_GET['start'].'&pok='.$result['id'].'" class="marker_2"></a>
				</td></tr>
                </table>
			</article><hr>';
												}
							$wykonaj=mysql_query("SELECT * FROM noclegownia");
							$znaleziono=mysql_num_rows($wykonaj);
							if($znaleziono>$na_stronie) {
							print '<center>  ';
							for($i=0; $i<ceil($znaleziono/$na_stronie); $i++)
							print '<a class="button" href="przegladaj.php?start='.($i*$na_stronie).'"><b>'.($i+1).'</b></a>  ';
														}  
							print '</center>';
}
}
?>