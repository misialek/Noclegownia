<?php

session_start();
?>
<?php
if (!isset($_SESSION['login']))
 { 
echo'<center>';
echo'<font size="40">';
echo'<font color="white"';
echo'<br><br><br><br><br><br><br>';
echo '$_SESSION[';
echo'<br>';
   exit;
}
?>