<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
	<style type="text/css">
body {font:10px Arial, Helvetica, sans-serif; text-align: center; font-size:10px;}
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
    <form method="post">
    <input type="hidden" name="lista_pokoi" />
	<div style='text-align:left;'>
	<input type="button" value="Wstecz" onclick="location.href = '../zarzadzanie/uzytkownik.php';" />
	</div>
    <?php foreach($dostepneNoclegownie as $noclegownia): ?>
    <h2><?php echo $noclegownia->__get('nazwa') . " - ul. " . $noclegownia->__get('ulica') . ", " . $noclegownia->__get('kod_pocztowy') . " " . $noclegownia->__get('miejscowosc'); ?></h2>
     <?php $noclegowniaId = $noclegownia->__get('id'); ?>
     <?php if(!isset($dostepnePokoje[$noclegowniaId])): ?>
      <span style="font-size:12px;">Wybrane miejsce nie ma dostepnych pokoi. </span><input type="button" value="Dodaj pokój" onclick="location.href = 'index.php?akcja=dodajPokoj';" /><br /><br />
     <?php else: ?>
      <table align="center">
        <tr>
          <th>
            Id
          </th>
          <th>
            Tytul
          </th>
          <th>
            Tv
          </th>
          <th>
            Lodowka
          </th>
          <th>
            Wc
          </th>
          <th>
            Prysznic
          </th>
          <th>
            Wanna
          </th>
          <th>
            Jacuzzi
          </th>
          <th>
            Klimatyzacja
          </th>
          <th>
            Internet
          </th>
          <th>
            <span style="color:red;">Usuń</span>
          </th>
          <th>
          </th>
        </tr>
        <?php foreach($dostepnePokoje[$noclegowniaId] as $pokoj): ?>
         <tr>
            <td>
             <?php echo $pokoj->__get('id_pok');?>
            </td>
            <td>
              <input type="text" name="tytul_<?php echo $pokoj->__get('id_pok');?>" value="<?php echo ($pokoj->__get('tytul'));?>"/>
            </td>
            <td>
              <input type="checkbox" name="tv_<?php echo $pokoj->__get('id_pok');?>" <?php echo ($pokoj->__get('tv')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="lodowka_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('lodowka')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="wc_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('wc')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="prszynic_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('prszynic')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="wanna_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('wanna')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="jacuzzi_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('jacuzzi')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="klimatyzacja_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('klimatyzacja')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="internet_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('internet')?"checked":"");?>/>
            </td>
            <td>
              <input type="checkbox" name="delete_<?php echo $pokoj->__get('id_pok');?>"/>
            </td>
            <td>
            <input type="button" value="Podglad pokoju" onclick="location.href = 'index.php?akcja=listujPokoje&pokoj=<?php echo $pokoj->__get('id_pok')?>';" />
            </td>
          </tr>
        <?php endforeach;?>
      </table>
    <?php endif;?>
    <?php endforeach;?>
    <br/><input type="submit"/>
    </form>
  </body>
</html>
