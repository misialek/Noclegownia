<?php
if (isset($_POST["przeczytana"])) { //je�li istnieje zmienna cos, czyli punkt b zostal zrealizowany to dalej
if ($_POST[przeczytana] == 'tak') // je�l zmienna cos jest rowna 1, czyli konkretnemu checkboxowi, wykonuje zapytanie
       {
          $q="Insert into `maile` SET stan='tak'";
            $r=mysql_query($q);         
       }
       else{ 
	   echo'lipa';//a tutaj w innym wypadku nic sie nie wykona
}
}
?>