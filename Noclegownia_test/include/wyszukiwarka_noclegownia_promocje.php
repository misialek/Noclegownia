<?php
			   echo '<table border="1"><tr><td>
					<figure class="left marg_right1"><img src="images/noclegownia.jpg" alt=""></figure></td>
					<td><p class="pad_bot2"><strong><span style="color: black; font-size: 18pt">'.$result['nazwa'].'</span><br /><br />
					<span style="color: black; font-size: 12pt">Cena pokoju: </span><span style="color: green; font-size: 12pt">'.$cena['cena'].'zł/24h!</span><br /><br />Typ miejsca: '.$result['typ'].'</strong></p>
					<p class="pad_bot2"><strong>Adres:</strong> ul. '.$result['ulica'].', '.$result['kod_pocztowy'].' '.$result['miejscowosc'].'</p>
                    <p class="pad_bot2"><strong>Opis:</strong> '.$result['opis'].'</p>
					<br /><a href="#" class="letsGo left pill button" id="'.$id_noclegownia.'"><span class="downarrow icon"></span>Pokaz/Ukryj pokoj</a>';
					?>
					<a onclick="window.open('<?php echo 'komentarze/komentarze.php?kom='.$id_noclegownia.'';  ?>', 'Komentarze', 'toolbar=no, scrollbars=yes, location=no, height=430,width=600');" class="right2 pill button"><span class="comment icon"></span>Sprawdz komentarze</a>
					<?php
					echo '</td></tr>
					</table>';
?>