 <?php  
			   echo '<table border="1" width="100%"><tr><td width="280px">
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
					?>
					<a onclick="window.open('<?php echo 'komentarze/komentarze.php?kom='.$id_noclegownia.'';  ?>', 'Komentarze', 'toolbar=no, scrollbars=yes, location=no, height=430,width=600');" class="pill button"><span class="comment icon"></span>Komentarze (<?php echo $result['status']; ?>)</a>
					<?php
                                                            echo '</td></tr>
                                    </table>';
?>