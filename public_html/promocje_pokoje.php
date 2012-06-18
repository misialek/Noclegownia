 <script>
    $(function(){
        $('a.letsGo').click(function () {
            $('div.pok'+$(this).attr("id")).toggle();
            return false;
        });
    });
  </script>
  
<?php
$istnieje=(mysql_query("SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
FROM pokoj
JOIN noclegownia ON (id_miejsce = id)
WHERE typ='Hotel' AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Hotel')"));
	if (mysql_num_rows($istnieje) > 0){
	$result=mysql_fetch_assoc($istnieje);
	echo '<div style="padding-bottom:0px;border-bottom:1px solid #cccccc;margin-bottom:15px; margin-top:0px; margin-right:90%;"><strong>Hotel</strong></div>';
	$i=0;
	$id_noclegownia=$result['id'];
	$min_cena=(mysql_query("SELECT MIN(cena) AS cena FROM pokoj
	WHERE id_miejsce = $id_noclegownia"));
	$cena=mysql_fetch_assoc($min_cena);
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_promocje.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                                                                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, MIN(pokoj.cena) AS cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Hotel')";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj_promocje.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
}

$istnieje=(mysql_query("SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
FROM pokoj
JOIN noclegownia ON (id_miejsce = id)
WHERE typ='Agroturystyka' AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Agroturystyka')"));
	if (mysql_num_rows($istnieje) > 0){
	$result=mysql_fetch_assoc($istnieje);
	echo '<div style="padding-bottom:0px;border-bottom:1px solid #cccccc;margin-bottom:15px; margin-top:0px; margin-right:82%;"><strong>Agroturystyka</strong></div>';
	$i=0;
	$id_noclegownia=$result['id'];
	$min_cena=(mysql_query("SELECT MIN(cena) AS cena FROM pokoj
	WHERE id_miejsce = $id_noclegownia"));
	$cena=mysql_fetch_assoc($min_cena);
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_promocje.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, MIN(pokoj.cena) AS cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Agroturystyka')";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj_promocje.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
}

$istnieje=(mysql_query("SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
FROM pokoj
JOIN noclegownia ON (id_miejsce = id)
WHERE typ='Kwatera prywatna' AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Kwatera prywatna')"));
	if (mysql_num_rows($istnieje) > 0){
	$result=mysql_fetch_assoc($istnieje);
	echo '<div style="padding-bottom:0px;border-bottom:1px solid #cccccc;margin-bottom:15px; margin-top:0px; margin-right:77%;"><strong>Kwatera prywatna</strong></div>';
	$i=0;
	$id_noclegownia=$result['id'];
	$min_cena=(mysql_query("SELECT MIN(cena) AS cena FROM pokoj
	WHERE id_miejsce = $id_noclegownia"));
	$cena=mysql_fetch_assoc($min_cena);
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_promocje.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, MIN(pokoj.cena) AS cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Kwatera prywatna')";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj_promocje.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
}

$istnieje=(mysql_query("SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
FROM pokoj
JOIN noclegownia ON (id_miejsce = id)
WHERE typ='Schronisko' AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Schronisko')"));
	if (mysql_num_rows($istnieje) > 0){
	$result=mysql_fetch_assoc($istnieje);
	echo '<div style="padding-bottom:0px;border-bottom:1px solid #cccccc;margin-bottom:15px; margin-top:0px; margin-right:84%;"><strong>Schronisko</strong></div>';
	$i=0;
	$id_noclegownia=$result['id'];
	$min_cena=(mysql_query("SELECT MIN(cena) AS cena FROM pokoj
	WHERE id_miejsce = $id_noclegownia"));
	$cena=mysql_fetch_assoc($min_cena);
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_promocje.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, MIN(pokoj.cena) AS cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Schronisko')";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj_promocje.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
}

$istnieje=(mysql_query("SELECT noclegownia.id, noclegownia.nazwa, noclegownia.miejscowosc, noclegownia.kod_pocztowy, noclegownia.ulica, noclegownia.opis, noclegownia.ocena, noclegownia.typ, noclegownia.status, noclegownia.zdjecie
FROM pokoj
JOIN noclegownia ON (id_miejsce = id)
WHERE typ='Motel' AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Motel')"));
	if (mysql_num_rows($istnieje) > 0){
	$result=mysql_fetch_assoc($istnieje);
	echo '<div style="padding-bottom:0px;border-bottom:1px solid #cccccc;margin-bottom:15px; margin-top:0px; margin-right:90%;"><strong>Motel</strong></div>';
	$i=0;
	$id_noclegownia=$result['id'];
	$min_cena=(mysql_query("SELECT MIN(cena) AS cena FROM pokoj
	WHERE id_miejsce = $id_noclegownia"));
	$cena=mysql_fetch_assoc($min_cena);
			echo '<article class="col2">
				<div class="wrapper under">';
				include 'include/wyszukiwarka_noclegownia_promocje.php';
                echo '</div>
				</article>';
						echo '<div style="display: none" class="pok'.$id_noclegownia.'">';
                        $sql2="SELECT pokoj.id_pok, pokoj.id_miejsce, pokoj.tytul, pokoj.opis, MIN(pokoj.cena) AS cena, pokoj.tv, pokoj.lodowka, pokoj.wc, pokoj.prszynic, pokoj.wanna, pokoj.jacuzzi, pokoj.klimatyzacja, pokoj.internet, pokoj.zdjecie 
						FROM pokoj
						WHERE id_miejsce=$id_noclegownia AND cena IN (SELECT MIN(cena) FROM pokoj JOIN noclegownia ON (id_miejsce = id) WHERE typ='Motel')";
                    	$query2=mysql_query($sql2);
                    	while($result2=mysql_fetch_assoc($query2))
                	       {
	                        echo'<article class="col2"><div class="wrapper under">';
							include 'include/wyszukiwarka_pokoj_promocje.php';
	                               	echo '</div></article>';
	                       }
						echo '</div>';
}
?>