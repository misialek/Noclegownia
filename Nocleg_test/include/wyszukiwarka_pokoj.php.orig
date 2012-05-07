<?php							
							echo '<table border="1" width="100%"><tr><td width="20%">
							<figure class="left marg_right1"><img src="images/pok.jpg" alt=""></figure></td>
							<td><p class="pad_bot2"><strong><span style="color: black; font-size: 11pt">'.$result2['tytul'].' - '.$result2['cena'].'zł/24h</span></strong></p>
							<p class="pad_bot2"><strong>Pokój posiada: </strong><br /></p>';
							if($result2['tv'] == 'Dostępny'){echo ' TV<input type="checkbox" checked="checked" />';}else{echo ' TV<input type="checkbox" />';}
                            if($result2['lodowka'] == 'Dostępny'){echo ' Lodówka<input type="checkbox" checked="checked" />';}else{echo ' Lodówka<input type="checkbox" />';}
							if($result2['wc'] == 'Dostępny'){echo ' WC<input type="checkbox" checked="checked" />';}else{echo ' WC<input type="checkbox" />|';}
							if($result2['prszynic'] == 'Dostępny'){echo ' Prysznic<input type="checkbox" checked="checked" />';}else{echo ' Prysznic<input type="checkbox" />';}
							if($result2['wanna'] == 'Dostępny'){echo ' Wanna<input type="checkbox" checked="checked" />';}else{echo ' Wanna<input type="checkbox" />';}
							if($result2['jacuzzi'] == 'Dostępny'){echo ' Jacuzzi<input type="checkbox" checked="checked" />';}else{echo ' Jacuzzi<input type="checkbox" />';}
							if($result2['klimatyzacja'] == 'Dostępny'){echo ' Klimatyzacja<input type="checkbox" checked="checked" />';}else{echo ' Klimatyzacja<input type="checkbox" />';}
							if($result2['internet'] == 'Dostępny'){echo ' Internet<input type="checkbox" checked="checked" />';}else{echo ' Internet<input type="checkbox" />';}
							echo '<p class="pad_bot2"><br /><strong>Informacje dodatkowe: </strong><br />'.$result2['opis'].'</p>
								<br /><a class="big button zlec" href="rezerwacje/rezerwacja_kl.php?rez='.$result2['id_pok'].'">Rezerwuj</a></td></tr><table><tr><td><br /><strong>Obecne rezerwacje pokoju: </strong>';
	  	                            $pokoj=$result2['id_pok'];
                                    $sql3="SELECT * FROM rezerwacje WHERE id_pokoj=$pokoj GROUP BY data_od";
	                               	$rezerwacje=mysql_query($sql3);
                                    echo '<center><br />';
									if(mysql_num_rows($rezerwacje) == 0){echo 'Brak rezerwacji.';}else{
                                    while($rezerwacja=mysql_fetch_assoc($rezerwacje))
                                    {
                                        echo ''.date('d.m.Y H:i' , $rezerwacja['data_od']).'-'.date('d.m.Y H:i' , $rezerwacja['data_do']).', ';
                                    }
																									}
	                               	echo '</center></td></tr></table></table>';
?>