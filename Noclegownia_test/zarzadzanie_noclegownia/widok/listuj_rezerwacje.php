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
    <?php if(isset($wiadomosc)):?>
      <h1><?php echo $wiadomosc ?></h1>
    <?php endif; ?>
    <form method="post">
    <input type="hidden" name="lista_rezerwacji" />
    <?php foreach($dostepneNoclegownie as $noclegownia): ?>
    <h2><?php echo $noclegownia->__get('nazwa') . " - ul. " . $noclegownia->__get('ulica') . ", " . $noclegownia->__get('kod_pocztowy') . " " . $noclegownia->__get('miejscowosc'); ?></h2>
     <?php $noclegowniaId = $noclegownia->__get('id'); ?>
     <?php if(!isset($aktywneRezerwacje[$noclegowniaId])): ?>
      <span style="font-size:12px;">Wybrane miejsce nie ma aktywnych rezerwacji.</span><br /><br />
     <?php else: ?>
      <table align="center">
        <tr>
          <th>
            Id
          </th>
          <th>
            Id pokoju
          </th>
          <th>
            Nazwa pokoju
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
            Cena
          </th>
          <th>
            Zmień
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
               <?php echo $rezerwacja["pokoj"];?>
            </td>
            <td>
              <?php echo $rezerwacja["nazwa_klienta"];?>
            </td>
            <td>
              <?php echo date("d.m.Y, G:i", $rezerwacja["rezerwacja"]->__get('data_od'));?>
            </td>
            <td>
              <?php echo date("d.m.Y, G:i", $rezerwacja["rezerwacja"]->__get('data_do'));?>
            </td>
		  <?php 
				$id_rez = $rezerwacja["rezerwacja"]->__get('id_rez');
				$query=mysql_query($sql="SELECT rezerwacje.data_od, rezerwacje.data_do,
				pokoj.cena
				FROM pokoj
				JOIN rezerwacje ON ( id_pok = id_pokoj )
				WHERE id_rez='$id_rez'");
				$result=mysql_fetch_assoc($query);
				$dni = $result['data_do'] - $result['data_od'] - 86400;
				$godz = date('G', $dni);
				$min = date('i', $dni);
				$cena = date('j', $dni) * $result['cena'] + ($godz/24) * $result['cena'] + ($min/1440) * $result['cena']; ?>
            <td>
              <?php echo round($cena, 0);?>zł
            </td>
            <td>
              <input type="button" value="Przesuń" onclick="location.href = '../rezerwacje/rezerwacja_zm_recepcionista.php?zmien=<?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>&id_pok=<?php echo $rezerwacja["rezerwacja"]->__get('id_pokoj');?>';"  />
            </td>
            <td>
              <input type="checkbox" name="akceptuj_<?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>"  />
            </td>
            <td>
              <input type="checkbox" name="odrzuc_<?php echo $rezerwacja["rezerwacja"]->__get('id_rez');?>"  />
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
