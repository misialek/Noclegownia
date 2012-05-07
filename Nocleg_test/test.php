<?php
session_start();
if(isset($_GET['wylo']) && $_GET['wylo']=='tak'){
	session_destroy();
	$_SESSION = array();
	$_SESSION['zalogowany']=0;
	header('Location: index.php ');}
include 'db.php';
?>

<?php

$inf=mysql_query("SELECT * FROM uzytkownik");
$info=mysql_fetch_assoc($inf);

while($row=mysql_fetch_array($inf)) {
echo 'Imie:'.$row['imie'].'<br/> Nazwisko:'.$row['nazwisko'].'<br/><br/>';

}

$sql="SELECT * FROM uzytkownik"; 
$wynik1=mysql_query($sql); /* Zapytanie sql do bazy i zapisanie wyniku w $wynik */ 
while($linia=mysql_fetch_array($wynik1)){ /* P�tla dop�ki istniej� dane */ 
echo 'Imię: '.$linia["imie"].' <br/>Nazwisko: '.$linia["nazwisko"].'<br/><br/>'; 

}
?>

if(typ==10){
echo '<tr><td><input type="radio" name="typ" value="30" />Użytkownik</td>
	<td><input type="radio" name="typ" value="20" />Recepcjonista</td>
	<td><input type="radio" name="typ" value="10" checked/>Administrator</td></tr>';
}elseif(typ==20){
echo '<tr><td><input type="radio" name="typ" value="30" />Użytkownik</td>
	<td><input type="radio" name="typ" value="20" checked/>Recepcjonista</td>
	<td><input type="radio" name="typ" value="10" />Administrator</td></tr>';
}else{
echo '<tr><td><input type="radio" name="typ" value="30" checked/>Użytkownik</td>
	<td><input type="radio" name="typ" value="20" />Recepcjonista</td>
	<td><input type="radio" name="typ" value="10" />Administrator</td></tr>';
}

if($typ_k==10){
echo '<tr><td><input type="radio" name="typ" value="30" />Użytkownik</td>
	<td><input type="radio" name="typ" value="20" />Recepcjonista</td>
	<td><input type="radio" name="typ" value="10" checked/>Administrator</td></tr>';
}elseif($typ_k==20){
echo '<tr><td><input type="radio" name="typ" value="30" />Użytkownik</td>
	<td><input type="radio" name="typ" value="20" checked/>Recepcjonista</td>
	<td><input type="radio" name="typ" value="10" />Administrator</td></tr>';
}else{
echo '<tr><td><input type="radio" name="typ" value="30" checked/>Użytkownik</td>
	<td><input type="radio" name="typ" value="20" />Recepcjonista</td>
