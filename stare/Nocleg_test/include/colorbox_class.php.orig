<?php
if(@$_SESSION['zalogowany']==1){
$login = $_SESSION['login'];
/* rozmiar colorbox dla administratora */
$colorbox_rozmiar=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
if (mysql_num_rows($colorbox_rozmiar) == 1){ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".rez").colorbox({iframe:true, width:"700px", height:"450px"});
$(".zarz").colorbox({iframe:true, width:"620px", height:"450px"});
 });
</script>
<?php }
/* rozmiar colorbox dla recepcjonisty */
$colorbox_rozmiar=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 20"));
if (mysql_num_rows($colorbox_rozmiar) == 1){ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".rez").colorbox({iframe:true, width:"700px", height:"450px"});
$(".zarz").colorbox({iframe:true, width:"620px", height:"450px"});
 });
</script>
<?php }
/* rozmiar colorbox dla klienta */
$colorbox_rozmiar=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 30"));
if (mysql_num_rows($colorbox_rozmiar) == 1){ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".rez").colorbox({iframe:true, width:"1200", height:"610"});
$(".zarz").colorbox({iframe:true, width:"600px", height:"520px"});
 });
</script>
<?php }}
/*colorbox dla wszystkich użytkowników */ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".zlec").colorbox({iframe:true, width:"600px", height:"400px"});
$(".log").colorbox({iframe:true, width:"465px", height:"465px"});
$(".reg").colorbox({iframe:true, width:"465px", height:"470px"});
 });
</script>