<?php
function Zapis($tekst) {
 $tekst = htmlspecialchars($tekst);
 $tekst = stripslashes($tekst);
 $tekst = trim($tekst);
 return $tekst;
}
?>
