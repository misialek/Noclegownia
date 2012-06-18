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
<input type="button" value="Wstecz" onclick="location.href = 'rezerwacja_zm_recepcionista.php?zmien=<?php echo $id_rezerwacji ?>&id_pok=<?php echo $id_pokoj ?>';" />
<?php
echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<center><strong><span style="color: black; font-size: 12pt">';
$daty=mysql_query("SELECT * FROM rezerwacje WHERE (status = 1 OR status = 2) AND id_pokoj='$id_pokoj' ORDER BY data_od");
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