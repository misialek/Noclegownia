<?php
include 'db.php';
if ($_POST["wyszukaj"]) 
{
$typ_miejsca = $_POST["typ_miejsca"];
$miasto = $_POST["miasto"];
$data_przybycia = $_POST["data_przybycia"];
$data_wyjazdu = $_POST["data_wyjazdu"];
$tv = $_POST["tv"];
$lodowka = $_POST["lodowka"];
$wc = $_POST["wc"];
$prysznic = $_POST["prysznic"];
$wanna = $_POST["wanna"];
$jacuzzi = $_POST["jacuzzi"];
$klimatyzacja = $_POST["klimatyzacja"];
$internet = $_POST["internet"];
$pobyt_od = '';
$pobyt_do = '';

if((strlen($data_przybycia) != 0) OR (strlen($data_wyjazdu) != 0)){
$d=explode('/',$data_przybycia);
$month=$d[0];
$day=$d[1]; 
$year=$d[2];
$pobyt_od = mktime(0, 0, 0, $month, $day, $year); 

$e=explode('/',$data_wyjazdu);
$month=$e[0];
$day=$e[1]; 
$year=$e[2];
$pobyt_do = mktime(0, 0, 0, $month, $day, $year);
}

if(($tv == 'Brak') AND ($lodowka == 'Brak') AND ($wc == 'Brak') AND ($prysznic == 'Brak') AND ($wanna == 'Brak') AND ($jacuzzi == 'Brak') AND ($klimatyzacja == 'Brak') AND ($internet == 'Brak')){

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) == 0) AND (strlen($pobyt_do) == 0) AND ($tv == 'Brak') AND ($lodowka == 'Brak') AND ($wc == 'Brak') AND ($prysznic == 'Brak') AND ($wanna == 'Brak') AND ($jacuzzi == 'Brak') AND ($klimatyzacja == 'Brak') AND ($internet == 'Brak')){
    $sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT * FROM pokoj WHERE id_miejsce='$id_noclegownia'";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) != 0) AND (strlen($pobyt_od) == 0) AND (strlen($pobyt_do) == 0) AND ($tv == 'Brak') AND ($lodowka == 'Brak') AND ($wc == 'Brak') AND ($prysznic == 'Brak') AND ($wanna == 'Brak') AND ($jacuzzi == 'Brak') AND ($klimatyzacja == 'Brak') AND ($internet == 'Brak')){
    $sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND miejscowosc='$miasto'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT * FROM pokoj WHERE id_miejsce=$id_noclegownia";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0) AND ($tv == 'Brak') AND ($lodowka == 'Brak') AND ($wc == 'Brak') AND ($prysznic == 'Brak') AND ($wanna == 'Brak') AND ($jacuzzi == 'Brak') AND ($klimatyzacja == 'Brak') AND ($internet == 'Brak')){

	$sprawdz="SELECT * FROM rezerwacje WHERE id_rez AND
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do'))";
	$pozycja=mysql_query($sprawdz);
	if((mysql_num_rows( $pozycja ) > 0)){
	echo 'Nie znaleziono dostępnych pokoi o podanych kryteriach wyszukiwania.';}
	else{
	
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	JOIN rezerwacje ON (id_pok = id_pokoj)
	WHERE typ='$typ_miejsca' AND
	((data_do > '$pobyt_od') OR
	(data_od < '$pobyt_do'))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie FROM pokoj
						JOIN rezerwacje ON (id_pok = id_pokoj)
						WHERE id_miejsce=$id_noclegownia AND
						((data_do > '$pobyt_od') OR
						(data_od < '$pobyt_do'))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
		}									
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) != 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0) AND ($tv == 'Brak') AND ($lodowka == 'Brak') AND ($wc == 'Brak') AND ($prysznic == 'Brak') AND ($wanna == 'Brak') AND ($jacuzzi == 'Brak') AND ($klimatyzacja == 'Brak') AND ($internet == 'Brak')){

	$sprawdz="SELECT * FROM rezerwacje WHERE id_rez AND 
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do'))";
	$pozycja=mysql_query($sprawdz);
	if((mysql_num_rows( $pozycja ) > 0)){
	echo 'Nie znaleziono dostępnych pokoi o podanych kryteriach wyszukiwania.';}
	else{
	
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	JOIN rezerwacje ON (id_pok = id_pokoj)
	WHERE typ='$typ_miejsca' AND miejscowosc='$miasto' AND
	((data_do > '$pobyt_od') OR
	(data_od < '$pobyt_do'))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie FROM pokoj
						JOIN rezerwacje ON (id_pok = id_pokoj)
						WHERE id_miejsce=$id_noclegownia AND
						((data_do > '$pobyt_od') OR
						(data_od < '$pobyt_do'))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
		}									
}
if(strlen($miasto) != 0){$miejscowosc=(mysql_query("SELECT miejscowosc FROM noclegownia WHERE miejscowosc='$miasto'"));
if (mysql_num_rows($miejscowosc) == 0){echo '<br />Sprawdź nazwę miasta.';}}

}else{

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0)){

	$sprawdz="SELECT * FROM rezerwacje WHERE id_rez AND
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do'))";
	$pozycja=mysql_query($sprawdz);
	if((mysql_num_rows( $pozycja ) > 0)){
	echo 'Nie znaleziono dostępnych pokoi o podanych kryteriach wyszukiwania.';}
	else{

	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	JOIN rezerwacje ON (id_pok = id_pokoj)
	WHERE typ='$typ_miejsca' AND
	tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet' AND
	((data_do > '$pobyt_od') OR
	(data_od < '$pobyt_do'))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie FROM pokoj
						JOIN rezerwacje ON (id_pok = id_pokoj)
						WHERE id_miejsce=$id_noclegownia AND
						((data_do > '$pobyt_od') OR
						(data_od < '$pobyt_do'))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
		}									
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) != 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0)){

	$sprawdz="SELECT * FROM rezerwacje WHERE id_rez AND
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do'))";
	$pozycja=mysql_query($sprawdz);
	if((mysql_num_rows( $pozycja ) > 0)){
	echo 'Nie znaleziono dostępnych pokoi o podanych kryteriach wyszukiwania.';}
	else{
	
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	JOIN rezerwacje ON (id_pok = id_pokoj)
	WHERE typ='$typ_miejsca' AND miejscowosc='$miasto' AND
	tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet' AND
	((data_do > '$pobyt_od') OR
	(data_od < '$pobyt_do'))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie FROM pokoj
						JOIN rezerwacje ON (id_pok = id_pokoj)
						WHERE id_miejsce=$id_noclegownia AND
						((data_do > '$pobyt_od') OR
						(data_od < '$pobyt_do'))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
		}									
}
if(strlen($miasto) != 0){$miejscowosc=(mysql_query("SELECT miejscowosc FROM noclegownia WHERE miejscowosc='$miasto'"));
if(mysql_num_rows($miejscowosc) == 0){echo '<br />Sprawdź nazwę miasta.';}}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) == 0) AND (strlen($pobyt_do) == 0)){
    $sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND
	tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.';}
    while($result=mysql_fetch_assoc($query)){
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia.php';
                echo '</div>
				</article>';
                        $id_noclegownia=$result['id'];
                        $sql2="SELECT * FROM pokoj WHERE id_miejsce=$id_noclegownia";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
                                            }
}

}
}else{echo 'Błąd wyszukiwania <br />Spróbuj ponownie.';}
?>