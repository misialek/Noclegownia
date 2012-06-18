<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
<style type="text/css">
body {font:10px Arial, Helvetica, sans-serif; text-align: center; font-size:10px;}
.td1 {
padding: 10px 10px 10px 10px;}
th, td {
font-size:14px;
padding: 2px 6px 2px 6px;}
th {
background: #FFF3C9; 
color: #414632
}
td {
text-align: center; 
background: #F4FFE0
}
table {
background: #D0C6A4 
}
</style>
  </head>
  <body>
    <form name="nowy_pokoj" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nowy_pokoj" />
	<div style='text-align:left;'>
	<?php
	$login = $_SESSION['login'];
	$wstecz=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
            if (mysql_num_rows($wstecz) != 1) { ?>
	<input type="button" value="Wstecz" onclick="location.href = '../zarzadzanie/uzytkownik.php';" /><br />
	<?php }else{
            if(!isset($_GET['n'])){ ?>
	<input type="button" value="Wstecz" onclick="location.href = 'index.php?akcja=listujPokoje<?php if(isset($_GET['id'])){echo '&id='.$_GET['id'].'';} ?>';" /><br />
	<?php }} ?>
	</div>
	<h1>Dodaj pokój</h1>
    <?php if($this->user->__get('typ_konta') == Uzytkownik::ADMIN): ?>
      <SELECT size="1" name="noclegownia">
      <?php foreach($dostepneNoclegownie as $noclegownia):?>
        <OPTION value="<?php echo $noclegownia->__get('id')?>"><?php echo $noclegownia->__get('nazwa')?> - ul. <?php echo $noclegownia->__get('ulica') . ", " . $noclegownia->__get('kod_pocztowy') . " " . $noclegownia->__get('miejscowosc'); ?></OPTION>
      <?php endforeach;?>
   </SELECT> <br />
    <?php  else: ?>
      <input type="hidden" name="noclegownia" value="<?php echo $dostepneNoclegownie[0]->__get('id'); ?>"/>
    <?php endif;?>
	<br />
	<table align="center">
	<tr>
		<td><strong>
		Dodaj zdjęcie:<br /><input style="width:200px" type="file" size="14" name="zdjecie"><br />
		</strong></td>
		<td class="td1" style="text-align:left;">
		<span style="font-size:11px;"><strong>
		Tytuł pokoju:<br /><input style="width:200px" name="tytul"/><br/><br />
		Cena pokoju:<br /><input style="width:60px" type="number" name="cena"/> zł/24h<br/><br/>
		Opis pokoju:<br /><textarea style="height:60px;width:200px" rows="2" cols="20" name="opis"></textarea>
		</strong></span>
		</td>
	</tr>
	</table>
	<h2>Pokój posiada:</h2>
	<table align="center">
	<tr>
		<th>TV</th>
		<th>Lodówke</th>
		<th>WC</th>
		<th>Prysznic</th>
		<th>Wannę</th>
		<th>Jacuzzi</th>
		<th>Klimatyzacje</th>
		<th>Internet</th>
	</tr>
	<tr>
		<td><input type="checkbox" name="tv" /></td>
		<td><input type="checkbox" name="lodowka" /></td>
		<td><input type="checkbox" name="wc" /></td>
		<td><input type="checkbox" name="prszynic" /></td>
		<td><input type="checkbox" name="wanna" /></td>
		<td><input type="checkbox" name="jacuzzi" /></td>
		<td><input type="checkbox" name="klimatyzacja" /></td>
		<td><input type="checkbox" name="internet" /></td>
	</tr>
	</table>
	<br />
    <input type="submit" value="Wyslij"> <input type="reset">
    </form>
  </body>
</html>
