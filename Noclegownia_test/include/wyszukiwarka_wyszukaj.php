 <script>

    $(function(){
        $('a.letsGo').click(function () {
            $('div.pok'+$(this).attr("id")).toggle();
            return false;
        });
    });

  </script>
<?php
include 'db.php';
if (isset($_POST["wyszukaj"]))
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
$day=$d[0]; 
$year=$d[2];
$pobyt_od = mktime(0, 0, 0, $month, $day, $year); 

$e=explode('/',$data_wyjazdu);
$month=$e[0];
$day=$e[0]; 
$year=$e[2];
$pobyt_do = mktime(0, 0, 0, $month, $day, $year);
}

if(($tv == '0') AND ($lodowka == '0') AND ($wc == '0') AND ($prysznic == '0') AND ($wanna == '0') AND ($jacuzzi == '0') AND ($klimatyzacja == '0') AND ($internet == '0')){

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) == 0) AND (strlen($pobyt_do) == 0) AND ($tv == '0') AND ($lodowka == '0') AND ($wc == '0') AND ($prysznic == '0') AND ($wanna == '0') AND ($jacuzzi == '0') AND ($klimatyzacja == '0') AND ($internet == '0')){
    $sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT * FROM pokoj WHERE id_miejsce='$id_noclegownia'";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) != 0) AND (strlen($pobyt_od) == 0) AND (strlen($pobyt_do) == 0) AND ($tv == '0') AND ($lodowka == '0') AND ($wc == '0') AND ($prysznic == '0') AND ($wanna == '0') AND ($jacuzzi == '0') AND ($klimatyzacja == '0') AND ($internet == '0')){
    $sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND miejscowosc='$miasto'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT * FROM pokoj WHERE id_miejsce=$id_noclegownia";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0) AND ($tv == '0') AND ($lodowka == '0') AND ($wc == '0') AND ($prysznic == '0') AND ($wanna == '0') AND ($jacuzzi == '0') AND ($klimatyzacja == '0') AND ($internet == '0')){

	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do'))) AND typ = '$typ_miejsca'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){
	echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce = $id_noclegownia AND id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
						((data_od <= '$pobyt_od'
						AND data_do <= '$pobyt_do'
						AND data_do >= '$pobyt_od') OR
						(data_od >= '$pobyt_od' 
						AND data_do >= '$pobyt_do' 
						AND data_od <= '$pobyt_do')))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }									
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) != 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0) AND ($tv == '0') AND ($lodowka == '0') AND ($wc == '0') AND ($prysznic == '0') AND ($wanna == '0') AND ($jacuzzi == '0') AND ($klimatyzacja == '0') AND ($internet == '0')){
	
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND miejscowosc='$miasto' AND id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do')))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND
						id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
						((data_od <= '$pobyt_od'
						AND data_do <= '$pobyt_do'
						AND data_do >= '$pobyt_od') OR
						(data_od >= '$pobyt_od' 
						AND data_do >= '$pobyt_do' 
						AND data_od <= '$pobyt_do')))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }								
}

if(strlen($miasto) != 0){$miejscowosc=(mysql_query("SELECT miejscowosc FROM noclegownia WHERE miejscowosc='$miasto'"));
if (mysql_num_rows($miejscowosc) == 0){echo 'Sprawdź nazwę miasta.';}}

}else{

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0)){

	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND
	tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet' AND
	id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do')))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND
						tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet' AND
						id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
						((data_od <= '$pobyt_od'
						AND data_do <= '$pobyt_do'
						AND data_do >= '$pobyt_od') OR
						(data_od >= '$pobyt_od' 
						AND data_do >= '$pobyt_do' 
						AND data_od <= '$pobyt_do')))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }								
}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) != 0) AND (strlen($pobyt_od) != 0) AND (strlen($pobyt_do) != 0)){
	
	$sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND miejscowosc='$miasto' AND
	tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet' AND
	id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
	((data_od <= '$pobyt_od'
	AND data_do <= '$pobyt_do'
	AND data_do >= '$pobyt_od') OR
	(data_od >= '$pobyt_od' 
	AND data_do >= '$pobyt_do' 
	AND data_od <= '$pobyt_do')))
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, pokoj.cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND
						tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet' AND
						id_pok NOT IN (SELECT id_pokoj FROM rezerwacje WHERE
						((data_od <= '$pobyt_od'
						AND data_do <= '$pobyt_do'
						AND data_do >= '$pobyt_od') OR
						(data_od >= '$pobyt_od' 
						AND data_do >= '$pobyt_do' 
						AND data_od <= '$pobyt_do')))
						GROUP BY id_pok";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }
}

if(strlen($miasto) != 0){$miejscowosc=(mysql_query("SELECT miejscowosc FROM noclegownia WHERE miejscowosc='$miasto'"));
if(mysql_num_rows($miejscowosc) == 0){echo 'Sprawdź nazwę miasta.';}}

if((strlen($typ_miejsca) != 0) AND (strlen($miasto) == 0) AND (strlen($pobyt_od) == 0) AND (strlen($pobyt_do) == 0)){
    $sql="SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie,
	count(pokoj.id_miejsce) AS ile
	FROM pokoj
	JOIN noclegownia ON (id_miejsce = id)
	WHERE typ='$typ_miejsca' AND
	tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet'
	GROUP BY id";
    $query=mysql_query($sql);
	if (mysql_num_rows($query) == 0){echo 'Przepraszamy! <br /> Pokoju o wybranych kryteriach nie posiadamy.<br />';}
    while($result=mysql_fetch_assoc($query)){
	$i=0;
	$id_noclegownia=$result['id'];
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_pokaz.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT * FROM pokoj WHERE id_miejsce=$id_noclegownia AND
						tv='$tv' AND lodowka='$lodowka' AND wc='$wc' AND prszynic='$prysznic' AND wanna='$wanna' AND jacuzzi='$jacuzzi' AND klimatyzacja='$klimatyzacja' AND internet='$internet'";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
                                            }
}

}
}else{echo 'Błąd wyszukiwania <br />Spróbuj ponownie.';}
?>