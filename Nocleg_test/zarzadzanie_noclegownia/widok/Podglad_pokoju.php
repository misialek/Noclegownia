<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="lista_pokoi" />
      Pokój o numerze: <?php echo $pokoj->__get('id_pok');?><br/>
      Znajdujący się w noclegowni: <?php echo $nocleg->__get('nazwa') . ", " . $nocleg->__get('miejscowosc'); ?><br/>
      Tytul pokoju: <input name="tytul_<?php echo $pokoj->__get('id_pok');?>" value="<?php echo ($pokoj->__get('tytul'));?>"/><br/>
      Cena pokoju: <input name="cena_<?php echo $pokoj->__get('id_pok');?>" value="<?php echo ($pokoj->__get('cena'));?>"/><br/>
      Opis pokoju: <textarea name="opis_<?php echo $pokoj->__get('id_pok');?>"><?php echo ($pokoj->__get('opis'));?></textarea><br/>
      Pokoj posiada tv: <input type="checkbox" name="tv_<?php echo $pokoj->__get('id_pok');?>" <?php echo ($pokoj->__get('tv')?"checked":"");?>/><br/>
      Pokoj posiada lodowkę: <input type="checkbox" name="lodowka_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('lodowka')?"checked":"");?>/><br/>
      Pokoj posiada wc: <input type="checkbox" name="wc_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('wc')?"checked":"");?>/><br/>
      Pokoj posiada prysznic: <input type="checkbox" name="prszynic_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('prszynic')?"checked":"");?>/><br/>
      Pokoj posiada wannę: <input type="checkbox" name="wanna_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('wanna')?"checked":"");?>/><br/>
      Pokoj posiada jacuzzi: <input type="checkbox" name="jacuzzi_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('jacuzzi')?"checked":"");?>/><br/>
      Pokoj posiada klimatyzację: <input type="checkbox" name="klimatyzacja_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('klimatyzacja')?"checked":"");?>/><br/>
      Pokoj posiada internet: <input type="checkbox" name="internet_<?php echo $pokoj->__get('id_pok');?>"  <?php echo ($pokoj->__get('internet')?"checked":"");?>/><br/>
      Usun zdjecie: <input type="checkbox" name="usun_zdjecie_<?php echo $pokoj->__get('id_pok');?>"/><br/>
      Zmien zdjecie: <input type="checkbox" name="zmien_zdjecie_<?php echo $pokoj->__get('id_pok');?>"/><br/>
      Nowe zdjecie: <input type="file" name="zdjecie_<?php echo $pokoj->__get('id_pok');?>"><br />
      <span style="color:red;">Usunąć? <input type="checkbox" name="delete_<?php echo $pokoj->__get('id_pok');?>"/></span><br/>
      <input type="submit"/>
    </form>
    <img src="../pokoj_zdjecie.php?id=<?php echo $pokoj->__get('id_pok')?>">
  </body>
</html>
