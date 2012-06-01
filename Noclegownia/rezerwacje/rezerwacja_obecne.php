<link rel="stylesheet" href="../css/style2.css" type="text/css" media="all">
<?php
include '../db.php';
if(isset($_GET['obecne'])){
$pokoj=$_GET['obecne'];
?>

<html lang="pl">
<head>
<title>Obecne rezerwacje pokoju</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo '<table width="100%"><tr><td><span style="color: black; font-size: 12pt"><strong>Obecne rezerwacje pokoju: </strong>';
			$sql3="SELECT * FROM rezerwacje WHERE status = 1 AND id_pokoj=$pokoj GROUP BY data_od";
			$rezerwacje=mysql_query($sql3);
				echo '<center><br />';
				if(mysql_num_rows($rezerwacje) == 0){echo '<br /><br /><br /><br /><br />Brak rezerwacji!';}else{
                while($rezerwacja=mysql_fetch_assoc($rezerwacje))
                        {
                            echo ''.date('d.m.Y, H:i' , $rezerwacja['data_od']).' - '.date('d.m.Y, H:i' , $rezerwacja['data_do']).' ';
                        }
																									}
echo '</center></span></td></tr></table>';
?>			
</body>
</html>
<?php
}
?>