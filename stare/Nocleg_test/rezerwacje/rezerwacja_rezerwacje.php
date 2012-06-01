<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
session_start();
include '../db.php';
if(@$_SESSION['zalogowany']==1){
if(isset($_GET['id_pok']) && (isset($_GET['id_rez']))){
$id_pokoj=($_GET['id_pok']);
$id_rezerwacji=($_GET['id_rez']);
?>

<html lang="pl">
<head>
<title>Wyświetl zarezerwowane terminy dla pokoju</title>
<meta charset="utf-8">
</head>
<body>

<?php
echo '<br /><table style="width: 100%">
<td><a href="rezerwacja_zm.php?zmien='.$id_rezerwacji.'&id_pok='.$id_pokoj.'" style="text-align: left;  padding-left: 30px"><button>Wstecz</button></a></td>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br />
<center><strong><span style="color: black; font-size: 12pt">';
$daty=mysql_query("SELECT * FROM rezerwacje WHERE id_pokoj='$id_pokoj' ORDER BY data_od");
while($data=mysql_fetch_assoc($daty)){
echo ''.date('d.m.Y H:i' , $data['data_od']).' - '.date('d.m.Y H:i' , $data['data_do']).',  ';
}
echo '</center></strong></span>';
?>			
</body>
</html>
<?php
}
}else{header('Location: ../index.php');}
?>