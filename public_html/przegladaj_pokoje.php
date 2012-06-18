<?php
if(isset($_GET['pok'])){
$id=($_GET['pok']);
    $sql="SELECT * FROM noclegownia WHERE id='$id'";
    $query=mysql_query($sql);
    while($result=mysql_fetch_assoc($query)){
	$id_noclegownia=$result['id'];
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
							if(isset($_GET['start'])){
							echo '<br /><br /><a class="pill button" href="przegladaj.php?start='.$_GET['start'].'"><span class="leftarrow icon"></span>Wstecz</a>';}else{echo '<br /><br /><a class="pill button" href="przegladaj.php"><span class="leftarrow icon"></span>Wstecz</a>';}
}else{
if(isset($_GET['start'])){
	$start = $_GET['start'];}else{$start = 0;}
	$na_stronie = 5;
		$sql = "SELECT * FROM pokoj
		JOIN noclegownia ON (id_miejsce = id)
		GROUP BY id
		ORDER BY typ LIMIT ".($start).",".$na_stronie."";
		$query=mysql_query($sql);
		if( mysql_num_rows( $query ) > 0){
		//$row = mysql_fetch_row($query))
		while($result=mysql_fetch_assoc($query)){
		$id_noclegownia=$result['id'];
		$zapytanie=(mysql_query("SELECT count(pokoj.id_miejsce) AS ile FROM pokoj
		JOIN noclegownia ON (id_miejsce = id)
		WHERE id = $id_noclegownia"));
		$ile=mysql_fetch_assoc($zapytanie);
		echo '<article class="col2">
				<div class="wrapper under">
				<table border="1" width="100%"><tr><td width="280px">
					<figure class="left marg_right1">';
					$id = $result['id'];
					$foto=(mysql_query("SELECT * FROM noclegownia WHERE id='$id' AND zdjecie > '0'"));
					if (mysql_num_rows($foto) > 0)
					{echo '<img src="noclegownia_zdjecie.php?id='.$result['id'].'" alt="" height="" width="260px">';}
					else
					{echo '<br /><br /><br /><br /><center>Nie dodano zdjęcia dla noclegowni.</center>';}
					echo '</figure></td>
					<td><p class="pad_bot2"><strong><span style="color: black; font-size: 18pt">'.$result['nazwa'].'</span><br /><br />Typ miejsca: '.$result['typ'].'</strong></p>
					<p class="pad_bot2"><strong>Adres:</strong> ul. '.$result['ulica'].', '.$result['kod_pocztowy'].' '.$result['miejscowosc'].'</p>
                                                            <p class="pad_bot2"><strong>Opis:</strong> '.$result['opis'].'</p>
					<br /><br /><br />';
					if(isset($_GET['start'])){
					echo '<a href="przegladaj.php?start='.$_GET['start'].'&pok='.$result['id'].'" class="pill left button"><span class="rightarrow icon"></span>Pokaz ('.$ile['ile'].')</a>';}else{echo '<a href="przegladaj.php?pok='.$result['id'].'" class="pill left button"><span class="rightarrow icon"></span>Pokaz ('.$ile['ile'].')</a>';} ?>
					<a onclick="window.open('<?php echo 'komentarze/komentarze.php?kom='.$id_noclegownia.'';  ?>', 'Komentarze', 'toolbar=no, scrollbars=yes, location=no, height=430,width=600');" class="pill right2 button"><span class="comment icon"></span>Komentarze (<?php echo $result['status']; ?>)</a>
					<?php
			echo '</td></tr>
                </table>
			</article><hr>';
												}
							$wykonaj=mysql_query("SELECT * FROM pokoj
							JOIN noclegownia ON (id_miejsce = id)
							GROUP BY id");
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
