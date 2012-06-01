

<?
    $sgl=mysql_connect("localhost", "projekt_2","123") ;
    mysql_select_db ("projekt_team");

    $zapytanie="SELECT * FROM Places_nocleg";
    $wykonaj=mysql_query($zapytanie);
    while($wiersz=mysql_fetch_array($wykonaj))
{
echo '<table border="1">';
echo '<tr><td width="250">';
echo $wiersz['place_name'];
echo '</td>';
echo '<td width="250">';
echo $wiersz['place_address'];
echo '</td>'; 
echo '<td>';
echo $wiersz['place_phone'];
echo '</td>';
echo '<td>';
echo $wiersz['nbr_of_rooms'];
echo '</td>';
echo '<td>';
if ($wiersz['stars'] == 2)
{
  echo '<img src="http://t1.gstatic.com/images?q=tbn:ANd9GcSx4QRltNb72w6Atc4do88IDy-Ou2b5VT4s7Ep6_bWty-f1fLtVcBbHA3xZ">';
  }else
  {
echo $wiersz['stars'];
}
echo '</td>';
echo '</tr>';
echo '</table>';
echo '<br>'; 


}



 
