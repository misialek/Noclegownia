<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <?php if(isset($wiadomosc)):?>
      <h1><?php echo $wiadomosc ?></h1>
    <?php endif; ?>
    <form method="post">
    <input type="hidden" name="lista_rezerwacji" />
    <?php foreach($dostepneNoclegownie as $noclegownia): ?>
    <h2><?php echo $noclegownia->__get('nazwa') . " " . $noclegownia->__get('miejscowosc'); ?></h2>
     <?php $noclegowniaId = $noclegownia->__get('id'); ?>
     <?php if(!isset($aktywneRezerwacje[$noclegowniaId])): ?>
      <br/>Wybrane miejsce nie ma aktywnych rezerwacji
     <?php else: ?>
      <table>
        <tr>
          <th>
            Id
          </th>
          <th>
            Id pokoju
          </th>
          <th>
            Dane rezerwującego
          </th>
          <th>
            Od
          </th>
          <th>
            Do
          </th>
          <th>
            Suma
          </th>
          <th>
            <span style="color:green;">Akceptuj</span>
          </th>
          <th>
            <span style="color:red;">Odrzuc</span>
          </th>
        </tr>
        <?php foreach($aktywneRezerwacje[$noclegowniaId] as $rezerwacja): ?>
         <tr>
            <td>
             <input type="hidden" name="id_pokoj_<?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>" /><?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>
            </td>
            <td>
               <?php echo $rezerwacja["rezerwacja"]->__get('id_pokoj');?>
            </td>
            <td>
              <?php echo $rezerwacja["nazwa_klienta"];?>
            </td>
            <td>
              <?php echo $rezerwacja["rezerwacja"]->__get('data_od');?>
            </td>
            <td>
              <?php echo $rezerwacja["rezerwacja"]->__get('data_do');?>
            </td>
            <td>
              <?php echo $rezerwacja["rezerwacja"]->__get('wartosc');?>
            </td>
            <td>
              <input type="checkbox" name="akceptuj_<?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>"  />
            </td>
            <td>
              <input type="checkbox" name="odrzuc_<?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>"  />
            </td>
          </tr>
        <? endforeach;?>
      </table>
    <?php endif;?>
    <?php endforeach;?>
    <br/><input type="submit"/>
    </form>
  </body>
</html>
