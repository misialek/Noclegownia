<?php
include 'db.php';
if(!$polaczenie) die; //nie wyswietla obrazka jezeli nie potrafi sie polaczyc
$pokoj_id = isset($_GET['id'])?$_GET['id']:"";

$query = sprintf("SELECT zdjecie FROM pokoj WHERE id_pok = '%s'",
                  mysql_real_escape_string($pokoj_id));

if (!($result = mysql_query ($query,$polaczenie))) die;

if(($row = mysql_fetch_assoc($result))){
  $zdjecie = $row['zdjecie'];
} else{
  die;
}
ob_clean();
header("Content-Type: image/png");
echo ($zdjecie);
?>