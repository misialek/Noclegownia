<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <form method="post">
    <input type="hidden" name="lista_pokoi" />
    <?php foreach($dostepneNoclegownie as $noclegownia): ?>
    <h2><?php echo $noclegownia->__get('nazwa') . ", " . $noclegownia->__get('miejscowosc'); ?></h2>
     <?php $noclegowniaId = $noclegownia->__get('id'); ?>
     <?php if(!isset($dostepnePokoje[$noclegowniaId])): ?>
      <br/>Wybrane miejsce nie ma dostepnych pokoi, <a href="index.php?akcja=dodajPokoj">dodaj jeden</a>
     <?php else: ?>
      <table>
        <tr>
          <th>
            Id
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
            <span style="color:red;">Delete</span>
          </th>
          <th>
            Podglad pokoju
          </th>
        </tr>
        <?php foreach($dostepnePokoje[$noclegowniaId] as $pokoj): ?>
         <tr>
            <td>
             <?php echo $pokoj->__get('id_pok');?>
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
              <a href="index.php?akcja=listujPokoje&pokoj=<?php echo $pokoj->__get('id_pok')?>">Podglad pokoju</a>
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
