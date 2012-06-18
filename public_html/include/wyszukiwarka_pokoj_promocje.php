<?php
                                                            echo '<table border="1" width="100%"><tr><td width="40%">
							<figure class="left marg_right1">';
							$id_pokoj = $result2['id_pok'];
							$foto=(mysql_query("SELECT * FROM pokoj WHERE id_pok='$id_pokoj' AND zdjecie > '0'"));
							if (mysql_num_rows($foto) > 0)
							{echo '<img src="pokoj_zdjecie.php?id='.$result2['id_pok'].'" alt="" height="" width="246px">';}
							else
							{echo '<br /><br /><br /><br /><center>Nie dodano zdjęcia dla tego pokoju.</center>';}
							echo '</figure></td>
							<td><p class="pad_bot2"><strong><span style="color: black; font-size: 11pt">'.$result2['tytul'].' - '.$result2['cena'].'zł/24h</strong></p>
							<p class="pad_bot2"><strong>Pokój posiada: </strong><br /></p>';
							if($result2['tv'] == '1'){echo ' TV<input type="checkbox" checked="checked" />';}else{echo ' TV<input type="checkbox" />';}
                                                                                    if($result2['lodowka'] == '1'){echo ' Lodówka<input type="checkbox" checked="checked" />';}else{echo ' Lodówka<input type="checkbox" />';}
							if($result2['wc'] == '1'){echo ' WC<input type="checkbox" checked="checked" />';}else{echo ' WC<input type="checkbox" />';}
							if($result2['prszynic'] == '1'){echo ' Prysznic<input type="checkbox" checked="checked" />';}else{echo ' Prysznic<input type="checkbox" />';}
							if($result2['wanna'] == '1'){echo ' Wanna<input type="checkbox" checked="checked" />';}else{echo ' Wanna<input type="checkbox" />';}
							if($result2['jacuzzi'] == '1'){echo ' Jacuzzi<input type="checkbox" checked="checked" />';}else{echo ' Jacuzzi<input type="checkbox" />';}
							if($result2['klimatyzacja'] == '1'){echo ' Klimatyzacja<input type="checkbox" checked="checked" />';}else{echo ' Klimatyzacja<input type="checkbox" />';}
							if($result2['internet'] == '1'){echo ' Internet<input type="checkbox" checked="checked" />';}else{echo ' Internet<input type="checkbox" />';}
							echo '<p class="pad_bot2"><br /><strong>Informacje dodatkowe: </strong><br />'.$result2['opis'].'</p>
                                                                                    <br /><a class="left button zlec" href="rezerwacje/rezerwacja_kl.php?rez='.$result2['id_pok'].'"><span class="plus icon"></span>Rezerwuj</a>
                                                                                    <a class="right2 button spr" href="rezerwacje/rezerwacja_obecne.php?obecne='.$result2['id_pok'].'"><span class="magnifier icon"></span>Sprawdz obecne rezerwacje</a>
                                                                                    </td></tr>
                                                                        </table>';
?>