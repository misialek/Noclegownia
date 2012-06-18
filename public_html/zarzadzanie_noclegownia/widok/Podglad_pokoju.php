<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
<style type="text/css">
body {font:10px Arial, Helvetica, sans-serif; text-align: center; font-size:10px;}
.td1 {
padding: 9px 6px 6px 6px;}
th, td {
font-size:14px;
padding: 2px 6px 2px 6px;}
.th {
background: #FFF3C9; 
color: #414632
}
.td {
text-align: center; 
background: #F4FFE0
}
.table {
background: #D0C6A4 
}
</style>
  </head>
  <body>
	<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="lista_pokoi" />
	<div style='text-align:left;'>
	<input type="button" value="Wstecz" onclick="location.href = 'index.php?akcja=listujPokoje<?php if(isset($_GET['id'])){echo '&id='.$_GET['id'].'';} ?>';" /><br />
	</div>
      <h2>Pokój o numerze: <?php echo $pokoj->__get('id_pok');?><br/>
      Znajduje się w noclegowni: <?php echo $nocleg->__get('nazwa') . " - ul. " . $nocleg->__get('ulica') . ", " . $nocleg->__get('kod_pocztowy') . " " . $nocleg->__get('miejscowosc'); ?></h2>
	  <table align="center" width="528px" height="260px" class="table">
	  <tr>
		<td class="td td1" width="60%">
		<?php 
		$id_pokoj = $pokoj->__get('id_pok');
		$foto=(mysql_query("SELECT * FROM pokoj WHERE id_pok='$id_pokoj' AND zdjecie > '0'"));
		if (mysql_num_rows($foto) > 0)
		{echo '<img src="../pokoj_zdjecie.php?id='.$pokoj->__get('id_pok').'" width="246px"><br />';}
		else
		{echo 'Zdjęcie nie zostało dodane.<br />Zaznacz "Zmień" i wybierz odpowiedni plik ze zdjęciem.<br /><br />';}
		?>
	  <strong>Zdjęcie:</strong>
	  <table align="left" width="100%">
	  <tr>
		<td style="text-align:left;">Zmień<input type="checkbox" name="zmien_zdjecie_<?php echo $pokoj->__get('id_pok');?>"/>
		<input style="width:146px" type="file" size="6" name="zdjecie_<?php echo $pokoj->__get('id_pok');?>">
		</td>
		<td style="text-align:right;">
		<span style="color:red;">Usuń<input type="checkbox" name="usun_zdjecie_<?php echo $pokoj->__get('id_pok');?>"/></span>
		</td>
	  </tr>
	  </table>
		</td>
		<td class="td" style="text-align:left;">
		<span style="font-size:11px;"><strong>
		Tytul pokoju:<br /><input style="width:200px" name="tytul_<?php echo $pokoj->__get('id_pok');?>" value="<?php echo ($pokoj->__get('tytul'));?>"/><br /><br />
		Cena pokoju:<br /><input style="width:50px" name="cena_<?php echo $pokoj->__get('id_pok');?>" value="<?php echo ($pokoj->__get('cena'));?>"/> zł/24h<br/><br />
		Opis pokoju:<br /><textarea style="height:60px;width:200px" name="opis_<?php echo $pokoj->__get('id_pok');?>"><?php echo ($pokoj->__get('opis'));?></textarea>
		</strong></span>
		</td>
	  </tr>
	  </table>
	  <h2>Pokoj posiada:</h2>
	  <table align="center" class="table">
	  <tr>
		<th class="th">TV</th>
		<th class="th">Lodówke</th>
		<th class="th">WC</th>
		<th class="th">Prysznic</th>
		<th class="th">Wannę</th>
		<th class="th">Jacuzzi</th>
		<th class="th">Klimatyzacje</th>
		<th class="th">Internet</th>
		<th class="th"><span style="color:red;">Usunąć?</span></th>
	  </tr>
	  <tr>
		<td class="td">
		<input type="checkbox" name="tv_<?php echo $pokoj->__get('id_pok');?>" <?php echo ($pokoj->__get('tv')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="lodowka_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('lodowka')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="wc_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('wc')?"checked":"");?>/>
        </td>
		<td class="td">
		<input type="checkbox" name="prszynic_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('prszynic')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="wanna_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('wanna')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="jacuzzi_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('jacuzzi')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="klimatyzacja_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('klimatyzacja')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="internet_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('internet')?"checked":"");?>/>
		</td>
		<td class="td">
		<input type="checkbox" name="delete_<?php echo $pokoj->__get('id_pok');?>"/>
	  </td></tr></table><br/>
      <input type="submit"/>
    </form>
  </body>
</html>
