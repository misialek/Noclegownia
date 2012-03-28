<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <form name="nowy_pokoj" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nowy_pokoj" />
    <?php if($this->user->__get('typ_konta') == Uzytkownik::ADMIN): ?>
      <SELECT size="1" name="noclegownia">
      <?php foreach($dostepneNoclegownie as $noclegownia):?>
        <OPTION value="<?php echo $noclegownia->__get('id')?>"><?php echo $noclegownia->__get('nazwa')?> - <?php echo $noclegownia->__get('miejscowosc')?></OPTION>
      <?php endforeach;?>
   </SELECT> <br />
    <? else: ?>
      <input type="hidden" name="noclegownia" value="<?php echo $dostepneNoclegownie[0]->__get('id'); ?>"/>
    <? endif;?>
    <input type="file" name="zdjecie">Zdjecie <br />
    <input type="checkbox" name="tv" />tv <br />
    <input type="checkbox" name="lodowka" />lodowka <br />
    <input type="checkbox" name="wc" />wc <br />
    <input type="checkbox" name="prszynic" />prysznic <br />
    <input type="checkbox" name="wanna" />wanna <br />
    <input type="checkbox" name="jacuzzi" />jacuzzi <br />
    <input type="checkbox" name="klimatyzacja" />klimatyzacja <br />
    <input type="checkbox" name="internet" />internet <br />
    <?php /* <input type="checkbox" name="zdjecia" />zdjecia <br /> */?>
    <input type="submit" value="Wyslij"> <input type="reset">
    </form>
    <?php
    // put your code here
    ?>
  </body>
</html>
