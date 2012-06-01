<?php
if(@$_SESSION['zalogowany']==1){
if(isset($_GET['login']) && (isset($_GET['id']))){
$log=($_GET['login']);
$id=($_GET['id']);
if($login == $log){
if(mysql_query("UPDATE rezerwacje SET status='1' WHERE login = '$log' AND id_rez = '$id'")){
echo 'Rezerwacja została aktywowana. <br />Prosimy uregulować płatność!';
}
					}
												}
								}else{echo 'Proszę się zalogować i ponownie podjąć próbę aktywacji.';}
?>