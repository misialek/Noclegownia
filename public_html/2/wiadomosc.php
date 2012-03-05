<?php
 
session_start(); // rozpoczêcie sesji
 
if (!isset($_SESSION['login'])) { // dostêp dla niezalogowanego u¿ytkownika
 
    include 'db.php'; // po³±czenie siê z baz± danych
    $tabela = 'wiadomosci'; // zdefiniowanie tabeli MySQL
  
  echo "<form action='wiadomosc.php' method=post>";
echo "<br>Temat: <input name='temat' size=30>";
echo "<br><br>Do kogo: <select name='do'>";
$wynik=mysql_query("select user_login, user_id from users where user_login!='ksiadz' order by user_login");
while($rekord=mysql_fetch_array($wynik)){
echo "<option value=".$rekord["user_id"].">".$rekord["user_login"];
}
echo "</select><br><br>";
echo "Tresc: <br><textarea name='tresc' rows=8 cols=30></textarea>";
echo "<br><input type=submit value='wyslij wiadomosc' name='submit'>";
 
    if ($_POST["wyslane"]) { // je¿eli formularz zosta³ wys³any, to wykonuje siê poni¿szy skrypt
 
        // filtrowanie tre¶ci wprowadzonych przez u¿ytkownika
        $temat = htmlspecialchars(stripslashes(strip_tags(trim($_POST["temat"]))), ENT_QUOTES);
		  $do = htmlspecialchars(stripslashes(strip_tags(trim($_POST["do"]))), ENT_QUOTES);
		  $tresc = htmlspecialchars(stripslashes(strip_tags(trim($_POST["tresc"]))), ENT_QUOTES);
        
       
 
        // je¿eli nie ma ¿adnego b³edu, u¿ytkownik zostaje zarejestronwany i wys³any do niego e-mail z linkiem aktywacyjnym
        if ($blad == 0) {
 
           
 
            $wynik = mysql_query("INSERT INTO $tabela VALUES('', '$tresc', '$do','$temat', NOW(), '')");
           
                mysql_close($polaczenie);
                exit;
            }
        }
        mysql_close($polaczenie);
    }

 
  
 

 
?>